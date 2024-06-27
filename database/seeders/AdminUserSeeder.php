<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create super_admin role if not already created
        $superAdminRole = Role::where('name', 'super_admin')->first();
        if (!$superAdminRole) {
            $superAdminRole = Role::create(['name' => 'super_admin', 'description' => 'Super Administrator']);
        }

        // Create super admin user
        User::create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'gender' => true,
            'profile_image' => null,
        ])->roles()->attach($superAdminRole->id);
    }
}
