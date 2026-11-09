<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/course', [CourseController::class, 'index'])->name('course');
Route::get('/student', [StudentController::class, 'index'])->name('student');

