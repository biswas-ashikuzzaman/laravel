<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/profile', function () {
    $data = ['name' => 'Sohel Amin', 'email' => 'sohel@example.com'];
    return view('profile', $data);
})->name('profile');




// Route::get('/', function()
// {
// return view('welcome', ['name' => 'Sohel Amin'], ['work' => 'Learn properly']);
// });


Route::get('/about', function (){
    return 'This is our about page.';
})->name('about');


Route ::get('/contact', function (){
    return "This is our contact page.";
})->name('contact');

Route ::get('/service' , function (){
    return "This is our service page.";
})->name('service');


Route ::get('/hello', function (){
    return view('hello');
})->name('hello');

Route ::get('/', [UserController::class, 'show']);
