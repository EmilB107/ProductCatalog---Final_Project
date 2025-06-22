<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model

class DashboardController extends Controller
{
    public function index()
    {
        // Get all products from the database
        $products = Product::all(); //
        $totalProducts = Product::count(); //

        return view('dashboard.index', compact('products', 'totalProducts')); //
    }
}