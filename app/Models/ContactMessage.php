<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
        'replied_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'replied_at' => 'datetime',
    ];

    public function getIsRepliedAttribute(): bool
    {
        return !is_null($this->replied_at);
    }

    public function getStatusLabelAttribute(): string
    {
        if ($this->is_replied) {
            return 'تم الرد';
        } elseif ($this->is_read) {
            return 'تم القراءة';
        } else {
            return 'جديد';
        }
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    public function scopeReplied($query)
    {
        return $query->whereNotNull('replied_at');
    }

    public function scopePending($query)
    {
        return $query->whereNull('replied_at');
    }

    public function markAsRead()
    {
        if (!$this->is_read) {
            $this->update(['is_read' => true]);
        }
    }

    public function markAsReplied()
    {
        $this->update([
            'is_read' => true,
            'replied_at' => now(),
        ]);
    }
}
