<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;      // Import Product model
use App\Models\Category;     // Import Category model
use App\Models\SubCategory;  // Import SubCategory model

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dogFoodCat = Category::where('name', 'Dogs')->first();
        $dogFoodSubCat = SubCategory::where('name', 'Dog Food')->first();
        $catToysCat = Category::where('name', 'Cats')->first();
        $catToysSubCat = SubCategory::where('name', 'Cat Toys')->first();

        if ($dogFoodCat && $dogFoodSubCat) {
            Product::create([
                'name' => 'Premium Adult Dog Food',
                'description' => 'Nutrient-rich food for adult dogs.',
                'price' => 45.99,
                'category_id' => $dogFoodCat->id,
                'sub_category_id' => $dogFoodSubCat->id,
            ]);
            Product::create([
                'name' => 'Grain-Free Puppy Kibble',
                'description' => 'Healthy start for growing puppies.',
                'price' => 32.50,
                'category_id' => $dogFoodCat->id,
                'sub_category_id' => $dogFoodSubCat->id,
            ]);
        }

        if ($catToysCat && $catToysSubCat) {
            Product::create([
                'name' => 'Feather Teaser Wand',
                'description' => 'Interactive toy for playful cats.',
                'price' => 9.99,
                'category_id' => $catToysCat->id,
                'sub_category_id' => $catToysSubCat->id,
            ]);
            Product::create([
                'name' => 'Catnip Stuffed Mouse',
                'description' => 'Classic cat toy with natural catnip.',
                'price' => 5.25,
                'category_id' => $catToysCat->id,
                'sub_category_id' => $catToysSubCat->id,
            ]);
        }
    }
}