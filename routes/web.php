<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AddressController;


Route::get('/', function () {
    return view('index');
});
Route::get('FirstRoute',[Home::class,'HomePage']);
Route::get('CartRoute',[Home::class,'Cart']);
Route::get('WishListRoute',[Home::class,'WishList']);
Route::resource('products',DataController::class);
Route::get('CheckoutRoute',[Home::class,'Checkout']);

Route::get('PinLocation',[LocationController::class,'index']);
Route::post('insertUserAddress',[LocationController::class,'insertUserAddress']);

