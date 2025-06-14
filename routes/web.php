<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // Import your controller

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::post('/signup', function () {
    // Handle signup form submission here
})->name('signup.submit');

// Route to display all products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');