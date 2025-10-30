<?php

use App\Http\Controllers\admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
});
