<?php

use Illuminate\Support\Facades\Route;

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