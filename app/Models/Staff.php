<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $fillable = [
        'name',
        'nip',
        'position',
        'subject',
        'photo',
        'bio',
        'order',
    ];

    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo && file_exists(public_path('storage/' . $this->photo))) {
            return asset('storage/' . $this->photo);
        }
        if ($this->photo && str_starts_with($this->photo, 'http')) {
            return $this->photo;
        }
        return 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=400&auto=format&fit=crop';
    }
}