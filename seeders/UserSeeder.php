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
        $AdminRole = Role::where('name', 'Admin')->first();
        $PMRole = Role::where('name', 'Project Manager')->first();

        User::create([
            'username' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Hash the password!
            'role_id' => $AdminRole ? $AdminRole->id : null,
            'email_verified_at' => now(), // Optional: Mark as verified
        ]);

        User::create([
            'username' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role_id' => $PMRole ? $PMRole->id : null,
            'email_verified_at' => now(),
        ]);
    }
}