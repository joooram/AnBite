<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'role',        // 'admin' or 'cho_staff'
        'email',
        'password',
        'otp',
        'otp_expires_at',
        'is_verified',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Check if this user is an Admin
     * Usage: $user->isAdmin()
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if this user is CHO Staff
     * Usage: $user->isChoStaff()
     */
    public function isChoStaff(): bool
    {
        return $this->role === 'cho_staff';
    }
}