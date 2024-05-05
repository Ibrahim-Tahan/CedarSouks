<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLocationController;
use App\Http\Controllers\StoreLocationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomAuth2;
use App\Http\Controllers\Order;
use App\Http\Controllers\Admin;





Route::get('PinUserLocation',[UserLocationController::class,'index']);
Route::post('insertUserAddress/{id}',[UserLocationController::class,'store'])->name('insertUserLocation');

Route::get('PinShopLocation',[StoreLocationController::class,'index']);
Route::post('insertShopLocation/{id}',[StoreLocationController::class,'store'])->name('insertShopLocation');

Route::get('makeEventindex',[EventController::class,'index']);







//All the authentification route

Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
Route::get('/registration', [CustomAuthController::class, 'registration'])->name('getRegister');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('home');
Route::get('/logout',[CustomAuthController::class, 'logout']);
Route::get('/update2',[CustomAuthController::class, 'update2']);
Route::get('/changing', [CustomAuthController::class, 'changing']);
Route::post('/changing-user/{userId}', [CustomAuthController::class, 'changingUser'])->name('changing-user');

Route::get('verify/{token}', [CustomAuthController::class, 'verify'])->name('verify_email');

Route::post('searching', [CustomAuth2::class, 'searchstore'])->name('searchstore');



// Route for initiating the Google login process
Route::get('/sign-in/google', [CustomAuthController::class, 'google']);

// Route for handling the redirect after Google authentication
Route::get('/sign-in/google/redirect', [CustomAuthController::class, 'googleRedirect']);

// Github login

Route::get('/sign-in/github', [CustomAuthController::class, 'github']);

Route::get('/sign-in/github/redirect', [CustomAuthController::class, 'githubRedirect']);

Route::post('/checkusertype/{id}', [CustomAuthController::class, 'type'])->name('typeuser');


//Email verification
Route::get('/registration/verify-email/{verification_code}', [CustomAuthController::class, 'verify_email'])->name('verify_email');


//End of the authentification route
























Route::get('/addstore/{id}', [CustomAuth2::class, 'add'])->name('add');

//put name to invoke this route in addstore.blade.php
Route::post('/store/{id}', [CustomAuth2::class, 'store'])->name('store');

//see the table
Route::get('/table2/{id}', [CustomAuth2::class, 'index'])->name('tableindex');

//delete a store
Route::delete('/deletetype/{id}', [CustomAuth2::class, 'destroy'])->name('delete');


//go to storepage
Route::get('/stores/{id}', [CustomAuth2::class, 'show'])->name('store.show');


// add category page
Route::get('store/{storeId}/add-category',[CustomAuth2::class, 'addCategory'])->name('store.addCategory');
Route::post('store/{storeId}/store-category', [CustomAuth2::class, 'storeCategory'])->name('store.storeCategory');


// routes/web.php

Route::get('store/{storeId}/add-product', [CustomAuth2::class, 'addProduct'])->name('store.addProduct');
Route::post('store/{storeId}/store-product', [CustomAuth2::class, 'storeCategoryProduct'])->name('store.storeProduct');

// Route definition
Route::delete('/delete-type/{id}/{store_id}', [CustomAuth2::class, 'destroy2'])->name('delete2');



//end of store features
















//admin features

Route::get('/allstore',[Admin::class, 'store'])->name('allstore');
Route::get('/allstore/{id}',[Admin::class, 'approve'])->name('approve');
Route::post('/search',[Admin::class,'search2'])->name('search');



Route::get('/alluser',[Admin::class, 'User'])->name('alluser');
Route::get('/alluser/{id}',[Admin::class, 'reset'])->name('reset');
Route::get('/alluser2/{id}',[Admin::class, 'update'])->name('update');
Route::post('/user/{id}',[Admin::class, 'changepass'])->name('changepass');
Route::match(['get', 'post'],'/filter',[Admin::class, 'filter'])->name('filter');
Route::get('/admin',[Admin::class, 'adminpage']);


//end admin features




























//order feature

Route::get('/allorder',[Order::class, 'order'])->name('allorder');
Route::get('/homepage',[Order::class, 'homepage']);
Route::get('/order/{id}',[Order::class, 'order2'])->name('order');
Route::get('detail2/{id}',[Order::class, 'detail2'])->name('detail2');



//Seller Reports
Route::post('/reports/{id}',[Order::class,'date'])->name('date');























