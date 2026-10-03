<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'file_path',
        'file_size',
        'download_count',
    ];

    public function getFileUrlAttribute(): string
    {
        if ($this->file_path && file_exists(public_path('storage/' . $this->file_path))) {
            return asset('storage/' . $this->file_path);
        }
        if ($this->file_path && str_starts_with($this->file_path, 'http')) {
            return $this->file_path;
        }
        return '#';
    }
}
