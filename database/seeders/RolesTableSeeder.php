<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'super_admin', 'description' => 'Super Administrator']);
        Role::create(['name' => 'sub_admin', 'description' => 'Sub Administrator']);
        Role::create(['name' => 'writer', 'description' => 'Writer']);
        Role::create(['name' => 'reader', 'description' => 'Reader']);
    }
}
