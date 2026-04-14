<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'user_agent',
        'url',
        'referer',
        'date',
        'visits',
        'country',
        'city',
        'device',
        'browser',
        'platform',
    ];

    protected $casts = [
        'date' => 'date',
        'visits' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($visitor) {
            if (empty($visitor->date)) {
                $visitor->date = now()->toDateString();
            }
        });
    }

    /**
     * Scope to get visitors by date range
     */
    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    /**
     * Scope to get visitors by country
     */
    public function scopeByCountry($query, $country)
    {
        return $query->where('country', $country);
    }

    /**
     * Scope to get visitors by device type
     */
    public function scopeByDevice($query, $device)
    {
        return $query->where('device', $device);
    }

    /**
     * Scope to get today's visitors
     */
    public function scopeToday($query)
    {
        return $query->whereDate('date', now()->toDateString());
    }

    /**
     * Scope to get this week's visitors
     */
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('date', [
            now()->startOfWeek()->toDateString(),
            now()->endOfWeek()->toDateString()
        ]);
    }

    /**
     * Scope to get this month's visitors
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('date', now()->month)
                    ->whereYear('date', now()->year);
    }

    /**
     * Get unique visitors count
     */
    public function scopeUnique($query)
    {
        return $query->distinct('ip_address');
    }

    /**
     * Get popular pages
     */
    public static function getPopularPages($limit = 10)
    {
        return self::select('url', \DB::raw('count(*) as visits'))
            ->groupBy('url')
            ->orderBy('visits', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get visitor statistics
     */
    public static function getStatistics()
    {
        return [
            'today' => self::today()->count(),
            'this_week' => self::thisWeek()->count(),
            'this_month' => self::thisMonth()->count(),
            'total' => self::count(),
            'unique_today' => self::today()->unique()->count(),
            'popular_pages' => self::getPopularPages(5),
        ];
    }

    /**
     * Parse user agent and extract device info
     */
    public function parseUserAgent()
    {
        $userAgent = $this->user_agent;
        
        // Simple device detection
        if (preg_match('/Mobile|Android|iPhone|iPad/i', $userAgent)) {
            $this->device = 'mobile';
        } else {
            $this->device = 'desktop';
        }

        // Simple browser detection
        if (preg_match('/Chrome/i', $userAgent)) {
            $this->browser = 'Chrome';
        } elseif (preg_match('/Firefox/i', $userAgent)) {
            $this->browser = 'Firefox';
        } elseif (preg_match('/Safari/i', $userAgent)) {
            $this->browser = 'Safari';
        } elseif (preg_match('/Edge/i', $userAgent)) {
            $this->browser = 'Edge';
        } else {
            $this->browser = 'Other';
        }

        // Simple platform detection
        if (preg_match('/Windows/i', $userAgent)) {
            $this->platform = 'Windows';
        } elseif (preg_match('/Mac/i', $userAgent)) {
            $this->platform = 'macOS';
        } elseif (preg_match('/Linux/i', $userAgent)) {
            $this->platform = 'Linux';
        } elseif (preg_match('/Android/i', $userAgent)) {
            $this->platform = 'Android';
        } elseif (preg_match('/iOS/i', $userAgent)) {
            $this->platform = 'iOS';
        } else {
            $this->platform = 'Other';
        }

        $this->save();
    }

    /**
     * Get location from IP (simplified)
     */
    public function getLocationFromIp()
    {
        // This is a simplified version. In production, you might want to use
        // a proper IP geolocation service like GeoIP2 or IP-API
        $ip = $this->ip_address;
        
        // For local development, set default values
        if (in_array($ip, ['127.0.0.1', '::1', 'localhost']) || str_starts_with($ip, '192.168.') || str_starts_with($ip, '10.')) {
            $this->country = 'Saudi Arabia';
            $this->city = 'Riyadh';
        } else {
            // In production, integrate with a real geolocation service
            $this->country = 'Saudi Arabia';
            $this->city = 'Unknown';
        }
        
        $this->save();
    }
}
