<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import the Product model
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the prices (products).
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Search by product name or price
            $products = Product::where('name', 'like', '%' . $query . '%')
                           ->orWhere('price', 'like', '%' . $query . '%')
                           ->get();
        } else {
            $products = Product::all(); // Get all products
        }

        // Pass 'products' to the view, not 'prices'
        return view('prices.index', ['prices' => $products]);
    }

    /**
     * Show the form for editing the specified product's price.
     */
    public function edit(Product $product) // Use route model binding for Product
    {
        // The $product variable is automatically resolved by Laravel based on the route parameter
        // We'll pass it as 'price' to maintain consistency with your current blade file variable name
        return view('prices.edit', ['price' => $product]);
    }

    /**
     * Update the specified product's price in storage.
     */
    public function update(Request $request, Product $product) // Use route model binding
    {
        $request->validate([
            'price' => 'required|numeric|min:0', // Validate the price input
        ]);

        $product->price = $request->input('price'); // Update the price attribute
        $product->save(); // Save changes to the database

        return redirect()->route('prices.index')->with('success', 'Price updated successfully!');
    }
}