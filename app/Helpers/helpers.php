<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting(string $key, mixed $default = null): mixed
    {
        return Setting::get($key, $default);
    }
}

if (!function_exists('format_id_date')) {
    function format_id_date($date, $format = 'd F Y'): string
    {
        if (!$date) return '-';
        return \Carbon\Carbon::parse($date)->translatedFormat($format);
    }
}
