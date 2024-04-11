<?php

use Illuminate\Support\Facades\Route;

Route::resource('/courses', 'App\Http\Controllers\CourseController');

Route::get('/', function () {
    return view('welcome');
});
