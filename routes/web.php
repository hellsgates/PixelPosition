<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);
Route::get('/search', SearchController::class);

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'index'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::get('/success', [RegisteredUserController::class, 'success'])->middleware('auth');
Route::delete('/logout', [LoginController::class, 'destroy'])->middleware('auth');


