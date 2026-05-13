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
        // Gagawa tayo ng Admin account
        User::updateOrCreate(
            ['username' => 'admin'], // Ito ang hahanapin ng system para hindi mag-duplicate
            [
                'first_name' => 'System',
                'last_name'  => 'Admin',
                'email'      => 'admin@anbite.com',
                'password'   => Hash::make('admin123'), // Naka-encrypt para secure
                'role'       => 'admin',
            ]
        );
        
        // Maaari kang magdagdag pa ng ibang users dito kung gusto mo sa hinaharap
    }
}