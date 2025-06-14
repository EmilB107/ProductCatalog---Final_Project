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
        $adminRole = Role::where('name', 'admin')->first();
        $customerRole = Role::where('name', 'customer')->first();

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Hash the password!
            'role_id' => $adminRole ? $adminRole->id : null,
            'email_verified_at' => now(), // Optional: Mark as verified
        ]);

        User::create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role_id' => $customerRole ? $customerRole->id : null,
            'email_verified_at' => now(),
        ]);
    }
}