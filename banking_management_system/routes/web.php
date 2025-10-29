<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('about');
});
Route::get('/about', function(){
    return "This is the about page.";
});
Route::get('/home', function(){
    return view('Home');
});
Route::get('/about', function(){
    return view('About');
});
Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
Route::get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
Route::post('/accounts', [AccountController::class, 'store'])->name('accounts.store');