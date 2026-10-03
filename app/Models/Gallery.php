<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id',
        'title',
        'category',
        'type',
        'file_path',
        'caption',
    ];

    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class, 'album_id');
    }

    public function getFileUrlAttribute(): string
    {
        if ($this->file_path && file_exists(public_path('storage/' . $this->file_path))) {
            return asset('storage/' . $this->file_path);
        }
        if ($this->file_path && str_starts_with($this->file_path, 'http')) {
            return $this->file_path;
        }
        return 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=800&auto=format&fit=crop';
    }
}
