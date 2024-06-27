<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo các vai trò trước
        $roles = [
            'super_admin' => Role::firstOrCreate(['name' => 'super_admin', 'description' => 'Super Administrator']),
            'sub_admin' => Role::firstOrCreate(['name' => 'sub_admin', 'description' => 'Sub Administrator']),
            'writer' => Role::firstOrCreate(['name' => 'writer', 'description' => 'Writer']),
            'reader' => Role::firstOrCreate(['name' => 'reader', 'description' => 'Reader']),
        ];

        // Tạo người dùng và gán vai trò tương ứng
        $users = [
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'password' => Hash::make('111111'),
                'gender' => 1,
                'profile_image' => 'download (3).jpg',
                'role' => 'reader', // Vai trò của người dùng này
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bob@example.com',
                'password' => Hash::make('111111'),
                'gender' => 0,
                'profile_image' => 'download (3).jpg',
                'role' => 'writer', // Vai trò của người dùng này
            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'charlie@example.com',
                'password' => Hash::make('111111'),
                'gender' => 1,
                'profile_image' => 'download (3).jpg',
                'role' => 'sub_admin', // Vai trò của người dùng này
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
                'gender' => $userData['gender'],
                'profile_image' => $userData['profile_image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Gán vai trò cho người dùng
            $user->roles()->attach($roles[$userData['role']]);
        }
    }
}
