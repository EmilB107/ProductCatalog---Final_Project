<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Dummy data
        $products = [
            [
                'name' => 'Dog Food Premium',
                'image' => 'images/img-placeholder.png',
                'sku' => 'DF-1001',
                'category' => 'Dog Supplies',
                'price' => 1200,
                'stock' => 'In Stock',
            ],
            [
                'name' => 'Cat Toy Mouse',
                'image' => 'images/img-placeholder.png',
                'sku' => 'CT-2002',
                'category' => 'Cat Supplies',
                'price' => 350,
                'stock' => 'Low Stock',
            ],
            [
                'name' => 'Pet Shampoo',
                'image' => 'images/img-placeholder.png',
                'sku' => 'PS-3003',
                'category' => 'Grooming',
                'price' => 250,
                'stock' => 'In Stock',
            ],
            [
                'name' => 'Dog Leash',
                'image' => 'images/img-placeholder.png',
                'sku' => 'DL-4004',
                'category' => 'Dog Supplies',
                'price' => 500,
                'stock' => 'Out of Stock',
            ],
            [
                'name' => 'Cat Scratcher',
                'image' => 'images/img-placeholder.png',
                'sku' => 'CS-5005',
                'category' => 'Cat Supplies',
                'price' => 800,
                'stock' => 'In Stock',
            ],
        ];

        return view('dashboard.index', compact('products'));
    }
}