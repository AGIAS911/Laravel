<?php

use App\Http\Controllers\CatigoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('categories',CatigoreController::class);
Route::resource('products',ProductController::class);

Route::resource('users',UserController::class);
