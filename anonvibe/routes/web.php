<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::post('/post/{post}/like', [PostController::class, 'like'])->name('post.like');
Route::post('/post/{post}/comment', [PostController::class, 'comment'])->name('post.comment');


Route::get('/', function () {
    return view('welcome');
});

