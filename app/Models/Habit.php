<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'author_name',
        'author_city',
        'author_age',
        'author_avatar',
        'content',
        'is_approved',
        'approved_at',
        'approved_by',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
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
        
        return "https://ui-avatars.com/api/?name={$this->author_name}&background=2D5E3A&color=fff&size=200";
    }

    public function getAgeWithLabelAttribute(): string
    {
        return $this->author_age ? $this->author_age . ' سنة' : 'غير محدد';
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopePending($query)
    {
        return $query->where('is_approved', false);
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
        ]);
    }
}
