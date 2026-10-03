<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'model_type',
        'model_id',
        'description',
        'ip_address',
        'user_agent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function log(string $action, string $description, ?Model $model = null): self
    {
        return static::create([
            'user_id' => Auth::id(),
            'action' => strtoupper($action),
            'model_type' => $model ? get_class($model) : null,
            'model_id' => $model ? $model->getKey() : null,
            'description' => $description,
            'ip_address' => Request::ip(),
            'user_agent' => substr((string) Request::userAgent(), 0, 500),
        ]);
    }
}
