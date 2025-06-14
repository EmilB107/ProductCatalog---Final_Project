<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Don't forget to import the Product model

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        // Fetch all products from the database
        // We'll also eager load the category and subCategory relationships
        // to avoid N+1 query problem.
        $products = Product::with(['category', 'subCategory'])->get();

        // Pass the products to a view
        return view('products.index', compact('products'));
    }

    // You can add other methods like show, create, store, edit, update, destroy later
}