<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/', fn()=>redirect()->route('transactions.index'));

Route::resource('customers', CustomerController::class);
Route::resource('services', ServiceController::class);
Route::resource('transactions', TransactionController::class);

Route::middleware(['auth','role:admin'])->group(function () {
    Route::resource('services', ServiceController::class);
    Route::resource('customers', CustomerController::class);
});

Route::middleware(['auth','role:kasir'])->group(function () {
    Route::resource('transactions', TransactionController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('transactions', TransactionController::class);
});

Route::middleware(['auth','role:admin'])->group(function () {
    Route::resource('customers', CustomerController::class);
    Route::resource('services', ServiceController::class);
});


require __DIR__.'/auth.php';
