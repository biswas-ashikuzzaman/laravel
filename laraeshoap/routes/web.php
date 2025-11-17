<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Models\Product;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/products/{id}', [UserController::class, 'productDetails'])->name('product_details');

// Dashboard route using UserController
Route::get('/dashboard', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Authenticated routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/add_category', [AdminController::class, 'addCategory'])->name('admin.addcategory');
    Route::post('/add_category', [AdminController::class, 'postaddCategory'])->name('admin.postaddcategory');
    Route::get('/view_category', [AdminController::class, 'viewCategory'])->name('admin.viewcategory');
    Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::get('/add_product', [AdminController::class, 'addProduct'])->name('admin.addproduct');
    Route::get('/view_product', [AdminController::class, 'viewProduct'])->name('admin.viewproduct');

    //  Route::get('/view_order', [AdminController::class, 'viewOrder'])->name('admin.vieworder');
    Route::post('/add_product', [AdminController::class, 'postAddProduct'])->name('admin.postaddproduct');
    Route::get('/edit_product/{id}', [AdminController::class, 'editProduct'])->name('admin.editproduct');
    Route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteproduct');
    Route::post('/update_product/{id}', [AdminController::class, 'updateProduct'])->name('admin.updateproduct');
    //rout for web view latest products
    // Route::get('/', [WebController::class, 'index'])->name('web.index');
    Route::get('/view_order', [AdminController::class, 'viewOrders'])->name('admin.vieworders');
    Route::get('/invoice/{id}', [AdminController::class, 'downloadInvoice'])->name('admin.downloadinvoice');
    Route::post('/status/{id}', [AdminController::class, 'updateOrderStatus'])->name('admin.updateorderstatus');
    Route::get('/', function () {
        $latestProducts = Product::latest()->take(10)->get(); // সর্বশেষ ১০টি প্রোডাক্ট
        return view('index', compact('latestProducts'));
    })->name('index');
    // product details
    // প্রোডাক্ট ডিটেইলসের জন্য পাবলিক রাউট
Route::get('/product/{id}', [UserController::class, 'productDetails'])->name('product.details');
    Route::get('/product/{id}', [AdminController::class, 'showProductDetails'])->name('product.details');
// Cart section 
Route::get('/addtocart/{id}', [UserController::class, 'addToCart'])
    ->middleware(['auth', 'verified'])
    ->name('add_to_cart');
});

require __DIR__ . '/auth.php';
