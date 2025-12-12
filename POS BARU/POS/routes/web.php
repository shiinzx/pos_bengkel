<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index']);
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/about',[HomeController::class,'about']);

Route::resource('customer', CustomerController::class);
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('order', OrderController::class);
