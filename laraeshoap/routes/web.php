<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

// --- পাবলিক বা গেস্ট ইউজারদের জন্য রাউটস ---

// ১. হোমপেজ রাউট (Route: '/') - এটি অবশ্যই auth গ্রুপ থেকে বাইরে থাকবে
Route::get('/', [UserController::class, 'home']) // UserController@home ফাংশন আপনার হোমপেজ ডেটা লোড করবে
    ->name('index'); 
    
// ২. প্রোডাক্ট ডিটেইলস (পাবলিক)
Route::get('/products/{id}', [UserController::class, 'productDetails'])
    ->name('product_details');
    
// ৩. কার্ট পেজ (পাবলিক - যদি সেশন/কুকি ব্যবহার করে কার্ট দেখান)
// যদি Auth::user() ব্যবহার করে কার্ট দেখান, তবে শুধু 'verified' মিডলওয়্যারটি সরান।
// এখন এটি সম্পূর্ণ পাবলিক
Route::get('/cartproducts', [UserController::class, 'cartProducts'])
        ->middleware('auth') // কার্টে যোগ করার আগে ভেরিফিকেশন চেক
        ->name('cartproducts');
        // Remove cart item
        Route::get('/removecartproducts/{id}', [UserController::class, 'removeCartProducts'])
        ->middleware('auth') 
        ->name('removecartproducts');


// ৪. অথেনটিকেশন রাউটস (Laravel Breeze বা Jetstream দ্বারা তৈরি)
require __DIR__ . '/auth.php';


// --- অথেনটিকেটেড ইউজারদের জন্য রাউটস ---

Route::middleware('auth')->group(function () {
    
    // ৫. ড্যাশবোর্ড রাউট (শুধুমাত্র লগইন করা ইউজারদের জন্য)
    Route::get('/dashboard', [UserController::class, 'index'])
        ->middleware('verified') // ইমেল ভেরিফিকেশন চেক
        ->name('dashboard');

    // ৬. প্রোফাইল ম্যানেজমেন্ট
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // ৭. কার্টে প্রোডাক্ট যোগ করার রাউট
    Route::get('/addtocart/{id}', [UserController::class, 'addToCart'])
        ->middleware('verified') // কার্টে যোগ করার আগে ভেরিফিকেশন চেক
        ->name('add_to_cart');


    // --- অ্যাডমিন প্যানেল রাউটস ---
    
    // ক্যাটেগরি
    Route::get('/add_category', [AdminController::class, 'addCategory'])->name('admin.addcategory');
    Route::post('/add_category', [AdminController::class, 'postaddCategory'])->name('admin.postaddcategory');
    Route::get('/view_category', [AdminController::class, 'viewCategory'])->name('admin.viewcategory');
    Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');

    // প্রোডাক্ট
    Route::get('/add_product', [AdminController::class, 'addProduct'])->name('admin.addproduct');
    Route::post('/add_product', [AdminController::class, 'postAddProduct'])->name('admin.postaddproduct');
    Route::get('/view_product', [AdminController::class, 'viewProduct'])->name('admin.viewproduct');
    Route::get('/edit_product/{id}', [AdminController::class, 'editProduct'])->name('admin.editproduct');
    Route::post('/update_product/{id}', [AdminController::class, 'updateProduct'])->name('admin.updateproduct');
    Route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteproduct');

    // অর্ডার
    Route::get('/view_order', [AdminController::class, 'viewOrders'])->name('admin.vieworders');
    Route::get('/invoice/{id}', [AdminController::class, 'downloadInvoice'])->name('admin.downloadinvoice');
    Route::post('/status/{id}', [AdminController::class, 'updateOrderStatus'])->name('admin.updateorderstatus');

});