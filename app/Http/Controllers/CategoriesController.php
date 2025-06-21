<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    // Dummy data for demonstration
    private $dummyCategory = [
        'id' => 1,
        'name' => 'Electronics',
        'sub_category' => 'Mobile Phones',
        'products_count' => 42,
    ];
public function index()
{
    // Dummy categories array
    $categories = [
        [
            'id' => 1,
            'name' => 'Electronics',
            'sub_category' => 'Mobile Phones',
            'products_count' => 42,
        ],
        [
            'id' => 2,
            'name' => 'Home Appliances',
            'sub_category' => 'Kitchen',
            'products_count' => 15,
        ],
        [
            'id' => 3,
            'name' => 'Toys',
            'sub_category' => 'Educational',
            'products_count' => 27,
        ],
    ];
    return view('categories.index', compact('categories'));
}

    public function show($id)
    {
        $category = $this->dummyCategory;
        // Dummy products for this category
        $products = [
            ['name' => 'iPhone 14', 'category' => 'Electronics', 'sub_category' => 'Mobile Phones'],
            ['name' => 'Samsung Galaxy S23', 'category' => 'Electronics', 'sub_category' => 'Mobile Phones'],
            ['name' => 'Google Pixel 8', 'category' => 'Electronics', 'sub_category' => 'Mobile Phones'],
        ];
        return view('categories.show', compact('category', 'products'));
    }

    public function edit($id)
    {
        $category = $this->dummyCategory;
        return view('categories.edit', compact('category'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function destroy($id)
    {
        // Just redirect back for dummy
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');

    }
}