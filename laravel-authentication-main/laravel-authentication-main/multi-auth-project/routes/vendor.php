<?php

use App\Http\Controllers\Vendor\VendorDashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('vendor')->group(function () {

    Route::middleware(['auth', 'role:vendor'])->group(function () {
        Route::get('/dashboard', [VendorDashboardController::class, 'index'])->name('vendor.dashboard');
    });
});
