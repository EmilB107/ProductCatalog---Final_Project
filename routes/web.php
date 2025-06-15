<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    return view('auth.signup');
})->name('auth.signup');

Route::post('/signup', function () {
    // Handle signup form submission here
    return redirect()->route('dashboard'); // redirect to dashboard agad
    // You can replace this with actual signup logic later
})->name('signup.submit');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');


Route::post('/signup', [AuthController::class, 'register'])->name('signup.submit');

// Route to display all products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');