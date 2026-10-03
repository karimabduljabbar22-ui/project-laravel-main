<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbWave extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'quota',
        'is_active',
        'announcement_date',
        'is_announced',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'announcement_date' => 'date',
        'is_active' => 'boolean',
        'is_announced' => 'boolean',
        'quota' => 'integer',
    ];

    public function applicants()
    {
        return $this->hasMany(PpdbApplicant::class, 'wave_id');
    }

    public function isOpen(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        $today = now()->startOfDay();
        return $today->gte($this->start_date) && $today->lte($this->end_date);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
