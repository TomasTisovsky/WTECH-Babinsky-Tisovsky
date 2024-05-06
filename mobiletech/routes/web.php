<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminPanelMainController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductDetailController;
use \App\Http\Controllers\CartController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

// Hlavna stranka
Route::get('/', [MainController::class, 'show_top_products']);


// Detail produktu

Route::get('/product-detail/{product_id}', [ProductDetailController::class, 'showProductDetail'])->name('product-detail.show');

// Nakupny kosik
Route::get('/shopping-cart', [CartController::class, 'view_shopping_cart'])->name('shopping-cart-view');

// Debug - ODSTRANIT PRED ODOVZDANIM !!!
Route::get('/deb', [CartController::class, 'debug'])->name('shopping-cart-debug.add'); // ukaze obsah kosika
Route::get('/ns', [CartController::class, 'new_session'])->name('new-session'); // resetuje session

