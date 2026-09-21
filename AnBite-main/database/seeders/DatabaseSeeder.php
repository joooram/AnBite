<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin Account
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'first_name' => 'System',
                'last_name'  => 'Admin',
                'email'      => 'admin@anbite.com',
                'password'   => Hash::make('admin123'),
                'role'       => 'admin',
            ]
        );

        // 2. CHO Staff 1 Account
        User::updateOrCreate(
            ['username' => 'chostaff1'], // Username para mag-login
            [
                'first_name' => 'CHO',
                'last_name'  => 'Staff 1',
                'email'      => 'chostaff1@anbite.com',
                'password'   => Hash::make('staff123'), // Password
                'role'       => 'staff', // Palitan kung 'cho_staff' o iba pa ang nakatala sa role system ninyo
            ]
        );
    }
}