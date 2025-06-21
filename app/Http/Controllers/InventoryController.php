<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Dummy inventory data
    private $inventory = [
        [
            'name' => 'iPhone 14',
            'image' => 'images/img-placeholder.png',
            'sku' => 'SKU-001',
            'quantity' => 10,
            'stock' => 'In Stock',
        ],
        [
            'name' => 'Samsung Galaxy S23',
            'image' => 'images/img-placeholder.png',
            'sku' => 'SKU-002',
            'quantity' => 3,
            'stock' => 'Low Stock',
        ],
        [
            'name' => 'Google Pixel 8',
            'image' => 'images/img-placeholder.png',
            'sku' => 'SKU-003',
            'quantity' => 0,
            'stock' => 'Out of Stock',
        ],
    ];

    public function index()
    {
        $inventory = $this->inventory;
        return view('inventory.index', compact('inventory'));
    }

    public function update()
    {
        $inventory = $this->inventory;
        return view('inventory.update', compact('inventory'));
    }
}