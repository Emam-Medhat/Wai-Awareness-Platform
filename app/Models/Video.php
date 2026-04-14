<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Video extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'video_url',
        'embed_url',
        'thumbnail',
        'slug',
        'duration',
        'duration_type',
        'category',
        'presenter_id',
        'presenter_type',
        'is_published',
        'is_featured',
        'views',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($video) {
            if (empty($video->slug)) {
                $video->slug = Str::slug($video->title);
            }
            if (empty($video->embed_url)) {
                $video->embed_url = $video->generateEmbedUrl();
            }
            if (empty($video->duration_type)) {
                $video->duration_type = $video->determineDurationType();
            }
        });

        static::updating(function ($video) {
            if ($video->isDirty('title') && empty($video->slug)) {
                $video->slug = Str::slug($video->title);
            }
            if ($video->isDirty('video_url')) {
                $video->embed_url = $video->generateEmbedUrl();
            }
            if ($video->isDirty('duration')) {
                $video->duration_type = $video->determineDurationType();
            }
        });
    }

    public function presenter()
    {
        return $this->belongsTo(User::class, 'presenter_id');
    }

    public function generateEmbedUrl(): ?string
    {
        if (empty($this->video_url)) {
            return null;
        }

        // YouTube
        if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $this->video_url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $this->video_url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        return $this->video_url;
    }

    public function determineDurationType(): string
    {
        if ($this->duration < 300) { // Less than 5 minutes
            return 'short';
        } elseif ($this->duration < 1200) { // Less than 20 minutes
            return 'medium';
        } else {
            return 'long';
        }
    }

    public function getFormattedDurationAttribute(): string
    {
        $minutes = floor($this->duration / 60);
        $seconds = $this->duration % 60;
        return sprintf('%d:%02d', $minutes, $seconds);
    }

    public function getFormattedViewsAttribute(): string
    {
        return number_format($this->views);
    }

    public function getThumbnailUrlAttribute(): string
    {
        return $this->thumbnail ? asset('storage/' . $this->thumbnail) : asset('images/default-video.jpg');
    }

    public function getRelatedVideosAttribute()
    {
        return self::published()
            ->where('category', $this->category)
            ->where('id', '!=', $this->id)
            ->limit(3)
            ->get();
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeByDurationType($query, $durationType)
    {
        return $query->where('duration_type', $durationType);
    }

    public function scopeByPresenterType($query, $presenterType)
    {
        return $query->where('presenter_type', $presenterType);
    }

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('title', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('description', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (isset($filters['duration_type'])) {
            $query->where('duration_type', $filters['duration_type']);
        }

        if (isset($filters['presenter_type'])) {
            $query->where('presenter_type', $filters['presenter_type']);
        }

        if (isset($filters['featured'])) {
            $query->where('is_featured', $filters['featured']);
        }

        return $query;
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
