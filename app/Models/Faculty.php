<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department',
        'designation',
        'is_hod',
        'qualification',
        'area_of_interest',
        'teaching_experience',
        'industrial_experience',
        'vidwan_id',
        'orcid_id',
        'scopus_id',
        'google_scholar_id',
        'photo_path',
    ];

    // helper accessor for photo URL
    public function getPhotoUrlAttribute()
    {
        return $this->photo_path ? url('/storage/'.ltrim($this->photo_path, '/')) : null;
    }

    // compute total experience (years) from numeric field or parsed teaching/industrial text fields
    public function getTotalExperienceAttribute()
    {
        // prefer explicit numeric column if present
        if (!empty($this->experience_years) && is_numeric($this->experience_years)) {
            return (float) $this->experience_years;
        }

        $teaching = $this->parseYears($this->teaching_experience ?? '');
        $industrial = $this->parseYears($this->industrial_experience ?? '');

        $total = $teaching + $industrial;

        return $total > 0 ? round($total, 1) : null;
    }

    protected function parseYears($value): float
    {
        if (empty($value)) {
            return 0.0;
        }

        // if it's numeric like '3' or '2.5'
        if (is_numeric($value)) {
            return (float) $value;
        }

        // extract first number (integer or decimal)
        if (preg_match('/(\d+(\.\d+)?)/', $value, $m)) {
            return (float) $m[1];
        }

        return 0.0;
    }
}