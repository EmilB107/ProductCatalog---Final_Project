<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role; // Don't forget to import the Role model

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);
        Role::create(['name' => 'editor']); // Optional: if you need another role

        // You can also use insert for multiple records:
        // Role::insert([
        //     ['name' => 'admin'],
        //     ['name' => 'customer'],
        //     ['name' => 'editor'],
        // ]);
    }
}