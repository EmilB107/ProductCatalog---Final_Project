<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        // Fetch all categories from the database
        // We'll also eager load the category and subCategory relationships
        // to avoid N+1 query problem.
        $categories = Categories::with(['subCategories', 'products'])->get();

        // Pass the categories to a view
        return view('categories.index', compact('categories'));
    }

    // You can add other methods like show, create, store, edit, update, destroy later
}