<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'author_name',
        'isbn',
        'publisher',
        'pages',
        'language',
        'publication_date',
        'cover_image',
        'pdf_file',
        'category',
        'category_id',
        'size',
        'published_year',
        'file_size',
        'is_featured',
        'is_published',
        'featured',
        'published',
        'views',
        'download_count',
        'rating',
        'rating_count',
        'tags',
        'user_id',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'featured' => 'boolean',
        'is_published' => 'boolean',
        'published' => 'boolean',
        'publication_date' => 'date',
        'pages' => 'integer',
        'rating' => 'float',
        'rating_count' => 'integer',
        'views' => 'integer',
        'download_count' => 'integer',
        'published_year' => 'integer',
        'file_size' => 'integer',
    ];

    protected $appends = [
        'cover_image_url',
        'file_url',
        'formatted_views',
        'formatted_downloads',
        'language_label',
        'rating_stars',
        'excerpt',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($book) {
            if (empty($book->slug)) {
                $book->slug = static::generateUniqueSlug($book->title);
            }
        });

        static::updating(function ($book) {
            if ($book->isDirty('title') && empty($book->slug)) {
                $book->slug = static::generateUniqueSlug($book->title);
            }
        });

        static::deleted(function ($book) {
            $book->deleteFiles();
        });
    }

    /**
     * Relationships
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Accessors
     */
    public function getCoverImageUrlAttribute(): string
    {
        if ($this->cover_image) {
            return asset('storage/' . $this->cover_image);
        }
        
        return "https://ui-avatars.com/api/?name=" . urlencode($this->title) . "&background=2D5E3A&color=fff&size=400&bold=true&format=png";
    }

    public function getFileUrlAttribute(): string
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : '#';
    }

    public function getFormattedViewsAttribute(): string
    {
        return number_format($this->views);
    }

    public function getFormattedDownloadsAttribute(): string
    {
        return number_format($this->downloads);
    }

    public function getLanguageLabelAttribute(): string
    {
        return $this->language === 'ar' ? 'العربية' : 'English';
    }

    public function getRatingStarsAttribute(): string
    {
        $stars = '';
        $fullStars = floor($this->rating);
        $hasHalfStar = $this->rating - $fullStars >= 0.5;
        
        for ($i = 0; $i < $fullStars; $i++) {
            $stars .= '★';
        }
        
        if ($hasHalfStar && $fullStars < 5) {
            $stars .= '☆';
        }
        
        $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
        for ($i = 0; $i < $emptyStars; $i++) {
            $stars .= '☆';
        }
        
        return $stars;
    }

    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->description), 150);
    }

    public function getCategoryLabelAttribute(): string
    {
        $categoryLabels = [
            'psychology' => 'علم النفس',
            'addiction' => 'الإدمان',
            'relationships' => 'العلاقات',
            'self_development' => 'التطوير الذاتي',
            'family' => 'الأسرة والطفل',
            'تطوير الذات' => 'التطوير الذاتي',
            'علم النفس' => 'علم النفس',
            'الصحة النفسية' => 'الصحة النفسية',
            'العلاقات الأسرية' => 'العلاقات الأسرية',
        ];

        return $categoryLabels[$this->category] ?? $this->category;
    }

    /**
     * Scopes
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('featured', true);
    }

    public function scopeByCategory(Builder $query, string $categorySlug): Builder
    {
        return $query->where('category', $categorySlug);
    }

    public function scopeByLanguage(Builder $query, string $language): Builder
    {
        return $query->where('language', $language);
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('author_name', 'like', "%{$search}%")
              ->orWhere('isbn', 'like', "%{$search}%");
        });
    }

    public function scopePopular(Builder $query): Builder
    {
        return $query->orderByDesc('views')->orderByDesc('downloads');
    }

    public function scopeHighestRated(Builder $query): Builder
    {
        return $query->orderByDesc('rating')->orderByDesc('rating_count');
    }

    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderByDesc('created_at');
    }

    /**
     * Methods
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function incrementViews(): void
    {
        $this->increment('views');
    }

    public function incrementDownloads(): void
    {
        $this->increment('downloads');
    }

    public function updateRating(float $newRating): void
    {
        $currentTotal = $this->rating * $this->rating_count;
        $newTotal = $currentTotal + $newRating;
        $newCount = $this->rating_count + 1;
        
        $this->update([
            'rating' => $newTotal / $newCount,
            'rating_count' => $newCount,
        ]);
    }

    public function deleteFiles(): void
    {
        if ($this->cover_image && Storage::disk('public')->exists($this->cover_image)) {
            Storage::disk('public')->delete($this->cover_image);
        }
        
        if ($this->file_path && Storage::disk('public')->exists($this->file_path)) {
            Storage::disk('public')->delete($this->file_path);
        }
    }

    public function isDownloadable(): bool
    {
        return !empty($this->file_path) && Storage::disk('public')->exists($this->file_path);
    }

    /**
     * Static Methods
     */
    public static function generateUniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;
        
        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        return $slug;
    }

    public static function getPopularBooks(int $limit = 5): \Illuminate\Database\Eloquent\Collection
    {
        return static::published()->popular()->limit($limit)->get();
    }

    public static function getFeaturedBooks(int $limit = 3): \Illuminate\Database\Eloquent\Collection
    {
        return static::published()->featured()->latest()->limit($limit)->get();
    }
}
