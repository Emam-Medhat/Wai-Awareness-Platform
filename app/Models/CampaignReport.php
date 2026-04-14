<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'title',
        'report_data',
        'reach',
        'engagement',
        'conversions',
        'period_start',
        'period_end',
        'created_by',
    ];

    protected $casts = [
        'report_data' => 'array',
        'period_start' => 'date',
        'period_end' => 'date',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getFormattedReachAttribute(): string
    {
        return number_format($this->reach);
    }

    public function getFormattedEngagementAttribute(): string
    {
        return number_format($this->engagement);
    }

    public function getFormattedConversionsAttribute(): string
    {
        return number_format($this->conversions);
    }

    public function getEngagementRateAttribute(): float
    {
        return $this->reach > 0 ? round(($this->engagement / $this->reach) * 100, 2) : 0;
    }

    public function getConversionRateAttribute(): float
    {
        return $this->engagement > 0 ? round(($this->conversions / $this->engagement) * 100, 2) : 0;
    }

    public function getPeriodAttribute(): string
    {
        return $this->period_start->format('Y-m-d') . ' إلى ' . $this->period_end->format('Y-m-d');
    }

    public function scopeByCampaign($query, $campaignId)
    {
        return $query->where('campaign_id', $campaignId);
    }

    public function scopeByPeriod($query, $startDate, $endDate)
    {
        return $query->where('period_start', '>=', $startDate)
                    ->where('period_end', '<=', $endDate);
    }
}
