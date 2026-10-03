<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'slug',
        'description',
        'career_prospects',
        'icon',
        'image',
        'order',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($major) {
            if (empty($major->slug)) {
                $major->slug = Str::slug($major->name);
            }
        });
    }

    public function ppdbApplicants()
    {
        return $this->hasMany(PpdbApplicant::class, 'major_id');
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image && file_exists(public_path('storage/' . $this->image))) {
            return asset('storage/' . $this->image);
        }
        if ($this->image && str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        return 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=800&auto=format&fit=crop';
    }
}
