<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    // Dummy data for demonstration
    private $prices = [
        1 => ['id' => 1, 'name' => 'iPhone 14', 'price' => 999],
        2 => ['id' => 2, 'name' => 'Samsung Galaxy S23', 'price' => 899],
        3 => ['id' => 3, 'name' => 'Google Pixel 8', 'price' => 799],
    ];

    public function index()
    {
        $prices = array_values($this->prices);
        return view('prices.index', compact('prices'));
    }

    public function edit($id)
    {
        $price = $this->prices[$id] ?? $this->prices[1];
        return view('prices.edit', compact('price'));
    }
}
