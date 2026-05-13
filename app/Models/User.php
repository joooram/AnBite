<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
    'first_name',
    'last_name',
    'username', // Siguraduhing nandito ito
    'email',
    'password',
    'role',     // At ito rin
];

    protected $hidden = [
        'password',
    ];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isChoStaff(): bool
    {
        return $this->role === 'cho_staff';
    }
}