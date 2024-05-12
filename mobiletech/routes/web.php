<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\OrderSuccessfulController;
use App\Http\Controllers\PaymentTransportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderFinalizationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminPanelMainController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use \App\Http\Controllers\ProductController;

// prihlasenie
Route::get('/dashboard', [LoginController::class, 'login'])->middleware(['auth', 'verified'])->name('dashboard');

//odhlasenie
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

// Hlavna stranka
Route::get('/', [MainController::class, 'show_top_products'])->name('main-page');

// Detail produktu
Route::get('/product-detail/{product_id}', [ProductDetailController::class, 'showProductDetail'])->name('product-detail.show');

// Nakupny kosik
Route::get('/shopping-cart', [CartController::class, 'view_shopping_cart'])->name('shopping-cart-view');

// Informacie o kupujucom a adrese dorucenia
Route::get('/customer-information', [ContactInfoController::class, 'enter_customer_information'])->name('customer-information');
Route::post('/customer-information', [ContactInfoController::class, 'proceed'])->name('customer-information.proceed');

// Informacie o sposobe dopravy a pravdy
Route::get('/payment-transport', [PaymentTransportController::class, 'next'])->name('payment-transport');
Route::post('/payment-transport', [PaymentTransportController::class, 'setMethods'])->name('payment-transport-set');

// Dokoncenie objednavky
Route::get('/order-finalization', [OrderFinalizationController::class, 'next'])->name('order-finalization');
Route::post('/order-finalization', [OrderFinalizationController::class, 'finalize'])->name('order-finalization-final-database');

// Uspesne prijata objednavka
Route::get('/order-successful', [OrderSuccessfulController::class,'show'])->name('order-successful.show');


// Debug - ODSTRANIT PRED ODOVZDANIM !!!
Route::get('/deb', [CartController::class, 'debug'])->name('shopping-cart-debug.add'); // ukaze obsah kosika
Route::get('/ns', [CartController::class, 'new_session'])->name('new-session'); // resetuje session


Route::get('/t', function (){
    return view('pages/orderSuccessful');
})->name('test'); // test

//product search route  
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');