<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Article extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'excerpt',
        'image',
        'slug',
        'author_id',
        'author_type',
        'size',
        'category',
        'tags',
        'is_published',
        'is_featured',
        'views',
        'reading_time',
        'published_at',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
            if (empty($article->excerpt)) {
                $article->excerpt = Str::limit(strip_tags($article->body), 200);
            }
            if (empty($article->reading_time)) {
                $article->reading_time = ceil(str_word_count(strip_tags($article->body)) / 200);
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('title') && empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getFormattedReadingTimeAttribute(): string
    {
        return $this->reading_time . ' دقيقة';
    }

    public function getFormattedViewsAttribute(): string
    {
        return number_format($this->views);
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/default-article.jpg');
    }

    public function getRelatedArticlesAttribute()
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

    public function scopeBySize($query, $size)
    {
        return $query->where('size', $size);
    }

    public function scopeByAuthorType($query, $authorType)
    {
        return $query->where('author_type', $authorType);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('title', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('body', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('excerpt', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (isset($filters['size'])) {
            $query->where('size', $filters['size']);
        }

        if (isset($filters['author_type'])) {
            $query->where('author_type', $filters['author_type']);
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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->approved();
    }

    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();
    }
}
