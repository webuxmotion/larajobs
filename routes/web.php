<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingController::class, 'index']);
Route::get('/listings/{listing}', [ListingController::class, 'show']);
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
Route::get('/create-listing', [ListingController::class, 'create']);

Route::post('/listings', [ListingController::class, 'store']);
Route::put('/listings/{listing}', [ListingController::class, 'update']);
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/logout', [UserController::class, 'logout']);