<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
        'avatar',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    public function isOperatorPpdb(): bool
    {
        return $this->role === 'operator_ppdb' || $this->role === 'super_admin';
    }

    public function isEditorKonten(): bool
    {
        return $this->role === 'editor_konten' || $this->role === 'super_admin';
    }

    public function hasRole(string|array $roles): bool
    {
        if ($this->role === 'super_admin') {
            return true;
        }

        if (is_array($roles)) {
            return in_array($this->role, $roles);
        }

        return $this->role === $roles;
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}
