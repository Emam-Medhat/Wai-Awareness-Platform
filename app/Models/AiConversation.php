<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiConversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
        'messages',
    ];

    protected $casts = [
        'messages' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getLastMessageAttribute(): ?array
    {
        $messages = $this->messages ?? [];
        return !empty($messages) ? end($messages) : null;
    }

    public function getMessageCountAttribute(): int
    {
        return count($this->messages ?? []);
    }

    public function addMessage(array $message): void
    {
        $messages = $this->messages ?? [];
        $messages[] = $message;
        $this->update(['messages' => $messages]);
    }

    public function scopeBySession($query, $sessionId)
    {
        return $query->where('session_id', $sessionId);
    }

    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeRecent($query, $limit = 10)
    {
        return $query->latest()->limit($limit);
    }
}
