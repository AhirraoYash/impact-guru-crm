<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@impactguru.com',
            'password' => Hash::make('password'), // Password is "password"
            'role' => 'admin',
        ]);

        // 2. Create Staff
        User::create([
            'name' => 'Staff Member',
            'email' => 'staff@impactguru.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);
    }
}