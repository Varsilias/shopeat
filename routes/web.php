<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Gloudemans\Shoppingcart\Facades\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('test');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product/{product}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');

Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');

Route::delete('/cart/{product}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

Route::post('/cart/saveForLater/{product}', [App\Http\Controllers\CartController::class, 'saveForLater'])->name('cart.saveForLater');

Route::delete('/saveForLater/{product}', [App\Http\Controllers\SaveForLaterController::class, 'destroy'])->name('wishlist.destroy');

Route::post('/save/saveForLater/{product}', [App\Http\Controllers\SaveForLaterController::class, 'saveForLater'])->name('wishlist.saveForLater');

Route::get('/empty', function () {
    Cart::instance('default')->destroy();
});

Route::get('/checkout',  [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');

Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('payment.callback');

// Route::post('/checkout',  [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/order-successful', function(){
    return view('pages.thankyou');
})->name('thank-you');
