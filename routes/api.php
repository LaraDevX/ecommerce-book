<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\CategoryController;

Route::middleware('setLocale')->group(function(){
    Route::middleware('auth:sanctum')->group(function(){
        Route::get('/user', [AuthController::class, 'findUser']);
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/filter-book', [BookController::class, 'filterBook']);
        Route::get('/search', [BookController::class, 'search']);
        Route::apiResource('/books', BookController::class);
    });
    Route::apiResource('/categories', CategoryController::class);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/email-verify', [AuthController::class, 'verifyEmail']);
});
