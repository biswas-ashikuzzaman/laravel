<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Simple test route (to check API works)
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

// Your product CRUD routes
Route::apiResource('products', ProductController::class);
