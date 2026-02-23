<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'System Admin',
            'email' => 'bhonemyat1076@gmail.com', // Change this to your email
            'password' => Hash::make('Apple@098'), // Change this to a secure password
            'is_admin' => true,
        ]);
    }
}