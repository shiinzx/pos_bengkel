<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route :: get('/test',[HomeController::class, 'testing']);
Route :: get('order',[OrderController::class,'index']);
