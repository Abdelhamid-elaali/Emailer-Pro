<?php

namespace App\Services;

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use Brevo\Client\Model\SendSmtpEmailAttachment;
use App\Models\EmailCampaign;

class BrevoEmailService
{
    private $apiInstance;

    public function __construct()
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', env('BREVO_API_KEY'));
        $this->apiInstance = new TransactionalEmailsApi(null, $config);
    }

    public function sendBulkEmail(EmailCampaign $campaign)
    {
        $sendEmail = new SendSmtpEmail();
        $sendEmail->setSubject($campaign->subject);
        $sendEmail->setHtmlContent($campaign->message);
        $sendEmail->setSender(['email' => env('MAIL_FROM_ADDRESS'), 'name' => env('MAIL_FROM_NAME')]);

        // Add attachments if any
        if (!empty($campaign->attachments)) {
            $attachments = [];
            foreach ($campaign->attachments as $attachment) {
                $fileAttachment = new SendSmtpEmailAttachment();
                $fileAttachment->setContent(base64_encode(file_get_contents(storage_path('app/public/' . $attachment['path']))));
                $fileAttachment->setName($attachment['name']);
                $attachments[] = $fileAttachment;
            }
            $sendEmail->setAttachment($attachments);
        }

        // Send to each recipient
        foreach ($campaign->recipients as $recipient) {
            try {
                $sendEmail->setTo([['email' => $recipient]]);
                $this->apiInstance->sendTransacEmail($sendEmail);
            } catch (\Exception $e) {
                \Log::error('Failed to send email to ' . $recipient . ': ' . $e->getMessage());
            }
        }
    }
}
