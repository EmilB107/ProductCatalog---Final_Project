<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model

class DashboardController extends Controller
{
    public function index()
    {
        // Get all products from the database
        $products = Product::all();
        $totalProducts = Product::count();

        // Calculate total items by summing the 'stock_status' column.
        // We explicitly cast 'stock_status' to an UNSIGNED integer to ensure correct summation,
        // as it's defined as a string in the ProductController validation and model fillable.
        $totalItemsResult = Product::selectRaw('SUM(CAST(stock_status AS UNSIGNED)) as total_stock')->first();
        $totalItems = $totalItemsResult ? (int) $totalItemsResult->total_stock : 0;

        return view('dashboard.index', compact('products', 'totalProducts', 'totalItems'));
    }
}