<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;    // Import Category model
use App\Models\SubCategory; // Import SubCategory model

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the IDs of the categories created by CategorySeeder
        $dogsCategory = Category::where('name', 'Dog Supplies')->first();
        $catsCategory = Category::where('name', 'Cat Supplies')->first();

        if ($dogsCategory) {
            SubCategory::create([
                'category_id' => $dogsCategory->id,
                'name' => 'Dog Dry Food'
            ]);
            SubCategory::create([
                'category_id' => $dogsCategory->id,
                'name' => 'Dog Wet Food'
            ]);
            SubCategory::create([
                'category_id' => $dogsCategory->id,
                'name' => 'Dog Toy'
            ]);
            SubCategory::create([
                'category_id' => $dogsCategory->id,
                'name' => 'Dog Vitamins'
            ]);
        }

        if ($catsCategory) {
            SubCategory::create([
                'category_id' => $catsCategory->id,
                'name' => 'Cat Dry Food'
            ]);
            SubCategory::create([
                'category_id' => $catsCategory->id,
                'name' => 'Cat Wet Food'
            ]);
            SubCategory::create([
                'category_id' => $catsCategory->id,
                'name' => 'Cat Toy'
            ]);
            SubCategory::create([
                'category_id' => $catsCategory->id,
                'name' => 'Cat Litter'
            ]);
        }
    }
}
