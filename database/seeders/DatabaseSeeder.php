<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'first_name' => 'System',
                'last_name'  => 'Admin',
                'email'      => 'admin@anbite.com',
                'password'   => Hash::make('admin123'), // Kailangan natin ito!
                'role'       => 'admin', // Idinagdag natin ito
            ]
        );
    }
}