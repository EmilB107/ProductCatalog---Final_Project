<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Dummy data as a class property
    protected $products = [
        1 => [
            'id' => 1,
            'name' => 'Cat Food',
            'description' => 'Nutritious dry food for cats',
            'image' => 'images/img-placeholder.png',
            'sku' => 'CF-001',
            'category' => 'Food',
            'subcategory' => 'Dry Food',
            'price' => '₱500',
            'stock' => 25,
        ],
        2 => [
            'id' => 2,
            'name' => 'Dog Leash',
            'description' => 'Durable nylon leash for dogs',
            'image' => 'images/img-placeholder.png',
            'sku' => 'DL-002',
            'category' => 'Accessories',
            'subcategory' => 'Leash',
            'price' => '₱250',
            'stock' => 40,
        ],
        3 => [
            'id' => 3,
            'name' => 'Cat Litter',
            'description' => 'Clumping litter for odor control',
            'image' => 'images/img-placeholder.png',
            'sku' => 'CL-003',
            'category' => 'Supplies',
            'subcategory' => 'Litter',
            'price' => '₱180',
            'stock' => 60,
        ],
    ];

    /**
     * Display a listing of the products.
     */
    public function index()
    {
        // Pass all products as a numerically indexed array
        $products = array_values($this->products);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function show($id)
    {
        $product = $this->products[$id] ?? $this->products[1];
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->products[$id] ?? $this->products[1];
        return view('products.edit', compact('product'));
    }

    public function destroy($id)
    {
        // Dummy destroy, just redirect
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}