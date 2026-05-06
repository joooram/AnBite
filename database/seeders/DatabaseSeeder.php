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
        // Gagawa ito ng admin account na gagamitin natin sa login
        User::updateOrCreate(
            ['username' => 'admin'], // Hahanapin kung may 'admin' na
            [
                'first_name' => 'System',
                'last_name'  => 'Admin',
                'email'      => 'admin@anbite.com',
                'password'   => Hash::make('admin123'), // Ito ang password na 'admin123'
            ]
        );
    }
}