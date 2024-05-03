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


//adminPanel

Route::get('/adminPanel', function () {
    return view('pages/adminPanel');
})->middleware(['auth', 'verified'])->name('adminpanel');

Route::get('/adminpanel/{categoryName?}', [AdminPanelMainController::class, 'showProducts'])->name('admin.products.show');

Route::get('/add-product/{categoryName}', [AddProductController::class, 'index'])->name('add-product.index');


require __DIR__.'/auth.php';

// Hlavna stranka
Route::get('/', [MainController::class, 'show_top_products']);

// Detail produktu
Route::get('/product-detail/{product_id}', [ProductDetailController::class, 'showProductDetail'])->name('product-detail.show');

Route::get('/test', function () {
    return view('pages/shoppingCart');
});

Route::post('/', [CartController::class, 'add_to_cart'])->name('shopping-cart.add');

Route::get('/deb', [CartController::class, 'debug'])->name('shopping-cart-debug.add');
Route::get('/ns', [CartController::class, 'new_session'])->name('new-session');
