<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Brian Salomo Rempas',
            'email' => 'brianrempas@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'remember_token' => null
        ]);

        User::create([
            'name' => 'Aditya Supraja',
            'email' => 'adit@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'role' => 'staff',
            'remember_token' => null
        ]);

        User::create([
            'name' => 'Puspita Sari',
            'email' => 'pusat@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'role' => 'user',
            'remember_token' => null
        ]);
    }
}
