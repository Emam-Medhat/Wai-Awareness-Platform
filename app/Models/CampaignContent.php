<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'title',
        'type',
        'file_path',
        'description',
        'platform',
        'published_at',
        'created_by',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getFileUrlAttribute(): string
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : '#';
    }

    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            'image' => 'صورة',
            'video' => 'فيديو',
            'document' => 'مستند',
            'text' => 'نص',
            default => 'غير معروف',
        };
    }

    public function getPlatformLabelAttribute(): string
    {
        return match($this->platform) {
            'social' => 'وسائل التواصل الاجتماعي',
            'radio' => 'الراديو',
            'tv' => 'التلفزيون',
            'print' => 'الطباعة',
            'digital' => 'الرقمية',
            default => 'غير معروف',
        };
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByPlatform($query, $platform)
    {
        return $query->where('platform', $platform);
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull('published_at');
    }
}
