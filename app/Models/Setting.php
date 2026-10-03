<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever("setting_{$key}", function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    public static function set(string $key, mixed $value, string $group = 'general', string $type = 'text'): self
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'group' => $group,
                'type' => $type,
            ]
        );

        Cache::forget("setting_{$key}");
        Cache::forget("all_settings_assoc");

        return $setting;
    }

    public static function getAllGrouped(): array
    {
        return static::all()->groupBy('group')->toArray();
    }

    public static function getAllAssoc(): array
    {
        return Cache::rememberForever('all_settings_assoc', function () {
            return static::pluck('value', 'key')->toArray();
        });
    }
}
