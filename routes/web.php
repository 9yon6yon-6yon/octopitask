<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('user')->group(function () {
        Route::post('/store', [UserController::class, 'store'])->name('products.store');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('products.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('products.destroy');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('/filter', [ProductController::class, 'filter'])->name('products.filter');
        Route::get('/search', [ProductController::class, 'lookforproduct'])->name('products.search');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    });
});

require __DIR__ . '/auth.php';
