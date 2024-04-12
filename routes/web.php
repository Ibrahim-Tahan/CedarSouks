<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLocationController;
use App\Http\Controllers\StoreLocationController;
/*

Route::get('/', function () {return view('storeIndex');});
Route::get('FirstRoute',[Home::class,'HomePage']);
Route::get('CartRoute',[Home::class,'Cart']);
Route::get('WishListRoute',[Home::class,'WishList']);
Route::resource('products',DataController::class);
Route::get('CheckoutRoute',[Home::class,'Checkout']);
*/


Route::get('PinUserLocation',[UserLocationController::class,'index']);
Route::post('insertUserAddress',[UserLocationController::class,'store']);

Route::get('PinShopLocation',[StoreLocationController::class,'index']);
Route::post('insertShopLocation',[StoreLocationController::class,'store']);


