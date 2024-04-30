<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AuthenticationController;





Route::get('/', function () {
    return view('index');
});
// Route::get('FirstRoute',[Home::class,'HomePage']);
// Route::get('CartRoute',[Home::class,'Cart']);
//Route::get('WishListRoute',[Home::class,'WishList']);
Route::resource('products',ProductsController::class);
Route::get('CheckoutRoute',[Home::class,'Checkout']);
//Route::get('Cart', [CartController::class,'cartView']);
//Route::post('CartRoute', [DataController::class,'addToCart']);
Route::get('cartView',[CartController::class,'cartView'])->name('cartView');
Route::post('addToCart', [CartController::class,'AddToCart'])->name('addToCart');
Route::get('deleteProduct/{id}',[CartController::class,'delete'])->name('deleteProduct');
Route::get('search',[SearchController::class,'search'])->name('search');

Route::get('addToWishlist',[WishlistController::class,'index'])->name('addToWishlist');
Route::post('wishlistRoute', [WishlistController::class,'AddToWishlist'])->name('wishlistRoute');
Route::get('wishlist/{id}',[WishlistController::class,'destroy'])->name('wishlist');

Route::get('CheckoutPage',[CheckoutController::class,'index'])->name('CheckoutPage');
Route::post('ChangeOrderStatus',[CheckoutController::class,'ChangeStatus'])->name('ChangeOrderStatus');

Route::get('CryptoPayment',[PaymentController::class,'CryptoView'])->name('CryptoPayment');
Route::get('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('Login',[AuthenticationController::class,'index'])->name('Login');
Route::post('CheckLogin', [AuthenticationController::class, 'authenticateUser'])->name('CheckLogin');
