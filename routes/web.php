<?php

use Illuminate\Support\Facades\Route;

Route::resource('/courses', 'App\Http\Controllers\CourseController');
Route::resource('/posts', 'App\Http\Controllers\PostController');
Route::resource('/inscriptions', 'App\Http\Controllers\InscriptionController');

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

