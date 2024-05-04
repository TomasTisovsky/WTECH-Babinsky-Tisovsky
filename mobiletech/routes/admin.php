<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanelMainController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/adminPanel', function () {
        return view('pages/adminPanel');
    })->name('adminpanel');

    Route::get('/adminpanel/{categoryName?}', [AdminPanelMainController::class, 'showProducts'])->name('admin.products.show');

    Route::get('/add-product/{categoryName}', [AddProductController::class, 'index'])->name('add-product.index');

    // Route to submit the product data
    Route::post('/add-product/{category}', [AddProductController::class, 'store'])->name('products.store');

    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Route to show the edit form
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

    // Route to submit the edit form
    Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');

    // Route to delete an image
    Route::delete('/images/{imageID}', [ImageController::class, 'destroy'])->name('images.destroy');
});