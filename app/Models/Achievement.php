<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'level',
        'year',
        'organizer',
        'student_name',
        'photo',
        'description',
    ];

    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo && file_exists(public_path('storage/' . $this->photo))) {
            return asset('storage/' . $this->photo);
        }
        if ($this->photo && str_starts_with($this->photo, 'http')) {
            return $this->photo;
        }
        return 'https://images.unsplash.com/photo-1578269174936-2709b6aeb913?q=80&w=800&auto=format&fit=crop';
    }
}
