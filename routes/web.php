<?php

use Illuminate\Support\Facades\Route;

Route::resource('/courses', 'App\Http\Controllers\CourseController');
Route::resource('/posts', 'App\Http\Controllers\PostController');

Route::get('/', function () {
    return view('welcome');
});
