<?php

namespace App\Http\Controllers;

use App\Models\EmailCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Exception;

class EmailCampaignController extends Controller
{
    public function index()
    {
        try {
            $campaigns = EmailCampaign::orderBy('created_at', 'desc')->get();
            return view('email-campaigns.index', compact('campaigns'));
        } catch (Exception $e) {
            Log::error('Failed to fetch campaigns', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to load campaigns. Please try again.');
        }
    }

    public function create()
    {
        return view('email-campaigns.create');
    }

    public function store(Request $request)
    {
        Log::info('Starting email campaign creation');

        try {
            // 1. Validate input
            $validated = $request->validate([
                'subject' => 'required|string|max:255',
                'recipients' => 'required|string',
                'message' => 'required|string',
                'attachments.*' => 'nullable|file|mimes:jpeg,png,pdf,txt,doc,docx|max:10240'
            ]);

            // 2. Process recipients
            $recipients = array_filter(array_map('trim', explode(',', $request->recipients)));
            if (empty($recipients)) {
                throw new Exception('No valid recipients specified');
            }

            // 3. Create campaign first
            $campaign = new EmailCampaign();
            $campaign->subject = $request->subject;
            $campaign->message = $request->message;
            $campaign->recipients = $recipients;
            $campaign->status = EmailCampaign::STATUS_PENDING;
            $campaign->save();

            Log::info('Campaign created', ['id' => $campaign->id]);

            // 4. Handle attachments
            $attachmentUrls = [];
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    try {
                        $path = $file->store('attachments', 'public');
                        $attachmentUrls[] = [
                            'name' => $file->getClientOriginalName(),
                            'content' => base64_encode(Storage::disk('public')->get($path))
                        ];
                    } catch (Exception $e) {
                        Log::error('Failed to process attachment', [
                            'filename' => $file->getClientOriginalName(),
                            'error' => $e->getMessage()
                        ]);
                        // Continue with other attachments
                    }
                }
            }

            // 5. Verify API configuration
            $apiKey = config('services.brevo.key');
            $fromEmail = config('mail.from.address');
            $fromName = config('mail.from.name', 'Demande Stage');

            // Debug logging for API key
            Log::info('Brevo Configuration Debug', [
                'api_key_set' => !empty($apiKey),
                'api_key_length' => strlen($apiKey ?? ''),
                'api_key_preview' => $apiKey ? substr($apiKey, 0, 10) . '...' : 'NOT SET',
                'from_email' => $fromEmail,
                'from_name' => $fromName,
            ]);

            if (empty($apiKey)) {
                throw new Exception('Brevo API key is not configured. Please set BREVO_API_KEY in your .env file.');
            }
            if (empty($fromEmail) || $fromEmail === 'hello@example.com') {
                throw new Exception('Sender email address is not configured. Please set MAIL_FROM_ADDRESS in your .env file.');
            }

            // 6. Send emails
            $client = new Client();
            $successCount = 0;
            $failedRecipients = [];

            $campaign->status = EmailCampaign::STATUS_SENDING;
            $campaign->save();

            foreach ($recipients as $recipient) {
                try {
                    $emailData = [
                        'sender' => [
                            'name' => $fromName,
                            'email' => $fromEmail
                        ],
                        'to' => [
                            [
                                'email' => $recipient,
                                'name' => $recipient
                            ]
                        ],
                        'subject' => $request->subject,
                        'htmlContent' => view('emails.template', [
                            'subject' => $request->subject,
                            'message' => nl2br(e($request->message)),
                            'senderName' => $fromName,
                        ])->render()
                    ];

                    if (!empty($attachmentUrls)) {
                        $emailData['attachment'] = $attachmentUrls;
                    }

                    $response = $client->post('https://api.brevo.com/v3/smtp/email', [
                        'headers' => [
                            'accept' => 'application/json',
                            'api-key' => $apiKey,
                            'content-type' => 'application/json',
                        ],
                        'json' => $emailData,
                        'verify' => false // Disable SSL verification for Windows dev environment
                    ]);

                    if ($response->getStatusCode() === 201) {
                        $successCount++;
                    } else {
                        $failedRecipients[] = $recipient;
                    }

                } catch (RequestException $e) {
                    Log::error('Failed to send email', [
                        'recipient' => $recipient,
                        'error' => $e->getMessage(),
                        'response' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : null
                    ]);
                    $failedRecipients[] = $recipient;
                }
            }

            // 7. Update campaign status
            if ($successCount === count($recipients)) {
                $campaign->status = EmailCampaign::STATUS_SENT;
                $message = 'Email campaign sent successfully!';
            } elseif ($successCount > 0) {
                $campaign->status = EmailCampaign::STATUS_PARTIALLY_SENT;
                $message = "Email campaign partially sent. {$successCount} out of " . count($recipients) . " emails sent successfully.";
            } else {
                $campaign->status = EmailCampaign::STATUS_FAILED;
                $message = 'Failed to send any emails.';
            }
            $campaign->save();

            // 8. Return response
            if ($campaign->status === EmailCampaign::STATUS_SENT) {
                return redirect()->route('email-campaigns.index')->with('success', $message);
            } else {
                return redirect()->back()->with('error', $message)->withInput();
            }

        } catch (Exception $e) {
            Log::error('Campaign failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to send email campaign: ' . $e->getMessage());
        }
    }
}
