<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingController::class, 'index']);
Route::get('/listings/{listing}', [ListingController::class, 'show']);
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
Route::get('/create-listing', [ListingController::class, 'create']);

Route::post('/listings', [ListingController::class, 'store']);
Route::put('/listings/{listing}', [ListingController::class, 'update']);