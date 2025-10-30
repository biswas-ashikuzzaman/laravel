<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function(){
    return view('/home');
})->name('home');

Route::get('/addMoney', function(){
    return view('pages.addMoney');
})->name('addMoney');