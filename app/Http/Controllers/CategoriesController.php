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
        $categories = Categories::with(['subCategories', 'products'])->get();


        return view('categories.index', compact('categories'));
    }
}