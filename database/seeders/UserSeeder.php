<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء مسؤول (Admin)
        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' =>  'Password!321',
            'username' => 'admin',
            'is_admin' => true,
            'birthday' => '1990-01-01',
            'profile_photo' => null, 
            'about_me' => 'I am the admin of this platform.',
        ]);

        // إنشاء مستخدم عادي
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('UserPassword123'),
            'username' => 'user',
            'is_admin' => false,
            'birthday' => '2000-01-01',
            'profile_photo' => null, 
            'about_me' => 'I am a regular user of this platform.',
        ]);

        
    }
}