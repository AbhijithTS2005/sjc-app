<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'date',
        'description',
        'content',
        'image',
        'type',
        'status',
        'department',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Scope: Get only approved events
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope: Get events by type
     */
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope: Get upcoming events (future events)
     */
    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', Carbon::today())
                    ->orderBy('date', 'asc');
    }

    /**
     * Scope: Get past events
     */
    public function scopePast($query)
    {
        return $query->where('date', '<', Carbon::today())
                    ->orderBy('date', 'desc');
    }

    /**
     * Scope: Get events from the past N years
     */
    public function scopeLastNYears($query, $years = 3)
    {
        $fromDate = Carbon::now()->subYears($years);
        return $query->where('date', '>=', $fromDate);
    }

    /**
     * Check if event is in the past
     */
    public function getIsPastAttribute()
    {
        return $this->date < Carbon::today();
    }

    /**
     * Get formatted date
     */
    public function getFormattedDateAttribute()
    {
        return $this->date->format('F d, Y');
    }

    /**
     * Get year for grouping
     */
    public function getYearAttribute()
    {
        return $this->date->year;
    }

    /**
     * Get month number for grouping
     */
    public function getMonthAttribute()
    {
        return $this->date->month;
    }

    /**
     * Get month name
     */
    public function getMonthNameAttribute()
    {
        return $this->date->format('F');
    }
}
