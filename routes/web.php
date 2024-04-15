<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLocationController;
use App\Http\Controllers\StoreLocationController;
use App\Http\Controllers\EventController;

Route::get('PinUserLocation',[UserLocationController::class,'index']);
Route::post('insertUserAddress',[UserLocationController::class,'store']);

Route::get('PinShopLocation',[StoreLocationController::class,'index']);
Route::post('insertShopLocation',[StoreLocationController::class,'store']);

Route::get('makeEventindex',[EventController::class,'index']);

