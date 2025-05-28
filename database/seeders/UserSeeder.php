<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Example',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'), // Mật khẩu đã hash
                'remember_token' => Str::random(10),
                'phone' => '0123456789',
                'address' => 'Hanoi, Vietnam',
                'google_id' => null,
                'token' => null,
                'avatar' => null,
                'role_id' => 1, // admin
                'is_active' => 1,
                'fb_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Example',
                'email' => 'user@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('user123'), // Mật khẩu đã hash
                'remember_token' => Str::random(10),
                'phone' => '0987654321',
                'address' => 'Ho Chi Minh City, Vietnam',
                'google_id' => null,
                'token' => null,
                'avatar' => null,
                'role_id' => 2, // user
                'is_active' => 1,
                'fb_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
