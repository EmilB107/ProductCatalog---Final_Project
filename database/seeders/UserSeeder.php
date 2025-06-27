<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Import User model
use App\Models\Role; // Import Role model
use Illuminate\Support\Facades\Hash; // For password hashing

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SuperAdminRole = Role::where('name', 'Super Admin')->first();
        $AdminRole = Role::where('name', 'Admin')->first();
        $PMRole = Role::where('name', 'Project Manager')->first();

        User::create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@example.com',
            'email_verified_at' => now(), 
            'password' => Hash::make('password'), 
            'role_id' => $SuperAdminRole->id,
        ]);
        
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), 
            'role_id' => $AdminRole->id,
        ]);

        User::create([
            'name' => 'PM User',
            'email' => 'PM@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => $PMRole->id,
        ]);
    }
}
