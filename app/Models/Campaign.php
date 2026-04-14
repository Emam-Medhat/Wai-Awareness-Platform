<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'start_date',
        'end_date',
        'status',
        'target_audience',
        'platforms',
        'goals',
        'budget',
        'created_by',
        'manager_id',
        'views',
        'engagement_count',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'platforms' => 'array',
        'budget' => 'decimal:2',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function contents()
    {
        return $this->hasMany(CampaignContent::class);
    }

    public function reports()
    {
        return $this->hasMany(CampaignReport::class);
    }

    public function getCoverImageUrlAttribute(): string
    {
        return $this->cover_image ? asset('storage/' . $this->cover_image) : asset('images/default-campaign.jpg');
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'draft' => 'مسودة',
            'active' => 'نشطة',
            'paused' => 'مؤجلة',
            'completed' => 'مكتملة',
            default => 'غير معروف',
        };
    }

    public function getDurationAttribute(): string
    {
        return $this->start_date->format('Y-m-d') . ' إلى ' . $this->end_date->format('Y-m-d');
    }

    public function getIsActiveAttribute(): bool
    {
        return $this->status === 'active' && 
               $this->start_date <= now() && 
               $this->end_date >= now();
    }

    public function getIsUpcomingAttribute(): bool
    {
        return $this->status === 'active' && $this->start_date > now();
    }

    public function getIsPastAttribute(): bool
    {
        return $this->end_date < now();
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeByManager($query, $managerId)
    {
        return $query->where('manager_id', $managerId);
    }

    public function scopeCurrent($query)
    {
        return $query->where('start_date', '<=', now())
                    ->where('end_date', '>=', now());
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>', now());
    }

    public function scopePast($query)
    {
        return $query->where('end_date', '<', now());
    }

    public function incrementViews()
    {
        $this->increment('views');
    }

    public function incrementEngagement()
    {
        $this->increment('engagement_count');
    }

    public function activate()
    {
        $this->update(['status' => 'active']);
    }

    public function pause()
    {
        $this->update(['status' => 'paused']);
    }

    public function complete()
    {
        $this->update(['status' => 'completed']);
    }
}
