<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'instructor',
        'schedule',
        'location',
        'icon',
        'photo',
        'achievements',
    ];

    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo && file_exists(public_path('storage/' . $this->photo))) {
            return asset('storage/' . $this->photo);
        }
        if ($this->photo && str_starts_with($this->photo, 'http')) {
            return $this->photo;
        }
        return 'https://images.unsplash.com/photo-1526676037777-05a232554f77?q=80&w=800&auto=format&fit=crop';
    }
}