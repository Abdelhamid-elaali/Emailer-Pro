<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmailCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'message',
        'recipients',
        'attachments',
        'status',
    ];

    protected $casts = [
        'recipients' => 'array',
        'attachments' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $attributes = [
        'status' => self::STATUS_PENDING,
        'attachments' => '[]',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_SENDING = 'sending';
    const STATUS_SENT = 'sent';
    const STATUS_FAILED = 'failed';
    const STATUS_PARTIALLY_SENT = 'partially_sent';

    public function setRecipientsAttribute($value)
    {
        if (is_string($value)) {
            $value = array_map('trim', explode(',', $value));
        }
        $this->attributes['recipients'] = json_encode($value);
    }

    public function getRecipientsAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }

    public function setAttachmentsAttribute($value)
    {
        if (!is_string($value)) {
            $value = json_encode($value);
        }
        $this->attributes['attachments'] = $value;
    }

    public function getAttachmentsAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }
}
