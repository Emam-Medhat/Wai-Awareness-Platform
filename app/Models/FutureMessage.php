<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FutureMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'remind_at',
        'is_sent',
        'sent_at',
        'email_sent',
        'sms_sent',
    ];

    protected $casts = [
        'remind_at' => 'date',
        'is_sent' => 'boolean',
        'sent_at' => 'datetime',
        'email_sent' => 'boolean',
        'sms_sent' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedRemindAtAttribute(): string
    {
        return $this->remind_at->format('Y-m-d');
    }

    public function getIsOverdueAttribute(): bool
    {
        return $this->remind_at < now() && !$this->is_sent;
    }

    public function scopePending($query)
    {
        return $query->where('is_sent', false);
    }

    public function scopeSent($query)
    {
        return $query->where('is_sent', true);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('remind_at', today());
    }

    public function scopeOverdue($query)
    {
        return $query->where('remind_at', '<', now())
                    ->where('is_sent', false);
    }

    public function markAsSent()
    {
        $this->update([
            'is_sent' => true,
            'sent_at' => now(),
            'email_sent' => true,
        ]);
    }

    public function markEmailSent()
    {
        $this->update(['email_sent' => true]);
    }

    public function markSmsSent()
    {
        $this->update(['sms_sent' => true]);
    }
}
