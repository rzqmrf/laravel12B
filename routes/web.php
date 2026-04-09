<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FieldController;

Route::get('/', fn() => view('home'));
Route::get('/about', fn() => view('about'));
Route::get('/contact', fn() => view('contact'));
Route::get('/features', fn() => view('features'));

// Admin pages
Route::prefix('admin')->group(function () {
    Route::get('/', fn() => view('admin.dashboard'));
    Route::get('/users', fn() => view('admin.users'));
    Route::get('/fields', fn() => view('admin.fields'));
});

// API
Route::prefix('api')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('fields', FieldController::class);
});
