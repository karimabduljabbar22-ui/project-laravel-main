<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GalleryAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover_image',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($album) {
            if (empty($album->slug)) {
                $album->slug = Str::slug($album->title) . '-' . Str::random(4);
            }
        });
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'album_id');
    }

    public function getCoverImageUrlAttribute(): string
    {
        if ($this->cover_image && file_exists(public_path('storage/' . $this->cover_image))) {
            return asset('storage/' . $this->cover_image);
        }
        if ($this->cover_image && str_starts_with($this->cover_image, 'http')) {
            return $this->cover_image;
        }
        // Fallback to first photo in album
        $firstPhoto = $this->galleries()->first();
        if ($firstPhoto) {
            return $firstPhoto->file_url;
        }
        return 'https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=800&auto=format&fit=crop';
    }
}
