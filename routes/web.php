<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);
Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

//Route::get('/jobs/{job}', [JobController::class, 'show']);
//Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::get('/success', [RegisteredUserController::class, 'success'])->middleware('auth');
Route::delete('/logout', [LoginController::class, 'destroy'])->middleware('auth');


