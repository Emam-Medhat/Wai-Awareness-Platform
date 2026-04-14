<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'author_name',
        'author_city',
        'author_avatar',
        'content',
        'is_approved',
        'is_anonymous',
        'admin_note',
        'approved_at',
        'approved_by',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'is_anonymous' => 'boolean',
        'approved_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function getAuthorAvatarUrlAttribute(): string
    {
        if ($this->author_avatar) {
            return asset('storage/' . $this->author_avatar);
        }
        
        return "https://ui-avatars.com/api/?name={$this->author_name}&background=C4A882&color=fff&size=200";
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->is_anonymous ? 'مجهول' : $this->author_name;
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopePending($query)
    {
        return $query->where('is_approved', false);
    }

    public function scopeAnonymous($query)
    {
        return $query->where('is_anonymous', true);
    }

    public function scopePublic($query)
    {
        return $query->where('is_anonymous', false);
    }

    public function approve($approvedById)
    {
        $this->update([
            'is_approved' => true,
            'approved_at' => now(),
            'approved_by' => $approvedById,
        ]);
    }

    public function reject($adminNote = null)
    {
        $this->update([
            'is_approved' => false,
            'admin_note' => $adminNote,
        ]);
    }
}
