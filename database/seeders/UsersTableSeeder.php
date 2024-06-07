<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create multiple users using a loop or an array
        User::insert([
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'password' => Hash::make('111111'),
                'gender' => 1,
                'profile_image' => 'download (3).jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bob@example.com',
                'password' => Hash::make('111111'),
                'gender' => 0,
                'profile_image' => 'download (3).jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'charlie@example.com',
                'password' => Hash::make('111111'),
                'gender' => 1,
                'profile_image' => 'download (3).jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
