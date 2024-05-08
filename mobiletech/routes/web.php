<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactInfoController;
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

// Informacie o sposobe dopravy a pravdy
Route::get('/payment-transport', [PaymentTransportController::class, 'next'])->name('payment-transport');

// Dokoncenie objednavky
Route::get('/order-finalization', [OrderFinalizationController::class, 'next'])->name('order-finalization');

// Debug - ODSTRANIT PRED ODOVZDANIM !!!
Route::get('/deb', [CartController::class, 'debug'])->name('shopping-cart-debug.add'); // ukaze obsah kosika
Route::get('/ns', [CartController::class, 'new_session'])->name('new-session'); // resetuje session

Route::get('/t', function (){
    dd( auth()->user());
    return view('pages/paymentTransport');
})->name('test'); // test
