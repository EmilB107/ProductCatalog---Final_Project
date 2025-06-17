<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\InventoryController;
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

Route::get('/prices', function () {
    return view('prices.index');
})->name('prices');


Route::post('/signup', [AuthController::class, 'register'])->name('signup.submit');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index'); // baguin nlng if wala nmn CRUD functionalities dito
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');

// Products Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Temporary routes for products until CRUD is implemented
Route::get('/products/{id}', function ($id) {
    return view('products.show', ['id' => $id]);
})->name('products.show');

Route::get('/products/{id}/edit', function ($id) {
    return view('products.edit', ['id' => $id]);
})->name('products.edit');