<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCart;

class UserController extends Controller
{
    // Home page
    public function home()
    {
        $latestProducts = Product::orderBy('created_at', 'desc')->limit(10)->get();
        $count = Auth::check() ? ProductCart::where('user_id', Auth::id())->count() : 0;

        return view('index', compact('latestProducts', 'count'));
    }

    // Dashboard
    public function index()
    {
        $count = Auth::check() ? ProductCart::where('user_id', Auth::id())->count() : 0;

        if (Auth::check() && Auth::user()->user_type == 'user') {
            return view('dashboard', compact('count'));
        } else {
            return view('admin.dashboard'); // admin view, usually cart count not needed
        }
    }

    // Product details
    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        $count = Auth::check() ? ProductCart::where('user_id', Auth::id())->count() : 0;

        return view('product_details', compact('product', 'count'));
    }

    // Add to cart
    public function addToCart($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $product_cart = new ProductCart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $id;
        $product_cart->quantity = 1;
        $product_cart->save();

<<<<<<< Updated upstream
        return redirect()->back()->with('success_message', 'Product added to cart successfully!');
=======
        // প্রোডাক্টটি খুঁজে বের করা হচ্ছে
        $product = Product::findOrFail($id);

        // কার্টে প্রোডাক্ট যোগ করার লজিক এখানে যুক্ত করুন
        // উদাহরণস্বরূপ, সেশন ব্যবহার করে কার্টে প্রোডাক্ট যোগ করা

        // সফলভাবে কার্টে যোগ করার পর রিডাইরেক্ট এবং মেসেজ দেখানো
        return redirect()->back()->with('cart_message', 'Product added to cart successfully!');
<<<<<<< Updated upstream
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
    }
}
