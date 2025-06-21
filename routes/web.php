<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController; // Import your controller
use App\Http\Controllers\PriceController;
use App\Http\Controllers\AdminController;

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



Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');



Route::post('/signup', [AuthController::class, 'register'])->name('signup.submit');





// PRODUCTS ROUTES
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');






// CATEGORIES ROUTES
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/create', function () {
    return view('categories.create');
})->name('categories.create');
Route::get('/categories/{id}', [CategoriesController::class, 'show'])->name('categories.show');
Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');





// INVENTORY ROUTES
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/update', [InventoryController::class, 'update'])->name('inventory.update');




// PRICES ROUTES
Route::get('/prices', [PriceController::class, 'index'])->name('prices.index');
Route::get('/prices/{id}/edit', [PriceController::class, 'edit'])->name('prices.edit');





// SUPERADMIN ROUTES
Route::get('/superadmin', function () {
    return view('superadmin.index');
})->name('superadmin.index');

Route::prefix('superadmin')->group(function () {
    // USER ROUTES
    Route::get('/user', [\App\Http\Controllers\UsersController::class, 'index'])->name('user.index');
    Route::get('/user/create', [\App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
    Route::get('/user/{id}', [\App\Http\Controllers\UsersController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/edit', [\App\Http\Controllers\UsersController::class, 'edit'])->name('user.edit');
    Route::delete('/user/{id}', [\App\Http\Controllers\UsersController::class, 'destroy'])->name('user.destroy');

    // ADMIN ROUTES
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // PROJECT MANAGER ROUTES
    Route::get('/project-manager', [\App\Http\Controllers\ProjManController::class, 'index'])->name('project-manager.index');
    Route::get('/project-manager/create', [\App\Http\Controllers\ProjManController::class, 'create'])->name('project-manager.create');
    Route::get('/project-manager/{id}', [\App\Http\Controllers\ProjManController::class, 'show'])->name('project-manager.show');
    Route::get('/project-manager/{id}/edit', [\App\Http\Controllers\ProjManController::class, 'edit'])->name('project-manager.edit');
    Route::delete('/project-manager/{id}', [\App\Http\Controllers\ProjManController::class, 'destroy'])->name('project-manager.destroy');
});

