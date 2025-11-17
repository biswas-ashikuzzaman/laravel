<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product; // Product মডেলটি ব্যবহার করার জন্য নিশ্চিত করুন
use App\Models\ProductCart;

class UserController extends Controller
{
    /**
     * ড্যাশবোর্ড লোড করার জন্য মেথড। 
     * এটি ইউজার টাইপ অনুযায়ী ইউজার বা অ্যাডমিন ড্যাশবোর্ডে পাঠাবে।
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == 'user') {
            return view('dashboard');
        } else {
            return view('admin.dashboard');
        }
    }

    /**
     * নির্দিষ্ট ID এর প্রোডাক্টের বিস্তারিত তথ্য প্রদর্শন করে।
     * শুধুমাত্র $product অবজেক্টটি ভিউ-এ পাঠানো হবে।
     * * @param int $id প্রোডাক্টের ID
     */
    public function productDetails($id)
    {
        // নির্দিষ্ট ID অনুযায়ী প্রোডাক্ট খুঁজে বের করা হচ্ছে, না পেলে 404 দেখাবে।
        $product = Product::findOrFail($id); 

        // যেহেতু আপনি Related Products সেকশনটি স্ট্যাটিক রাখতে চেয়েছেন,
        // তাই অন্য কোনো ডেটা (যেমন $latestProducts) এখান থেকে আর পাঠানো হলো না।

        return view('product_details', compact('product'));
    }
    public function addToCart($id)
    {
        $product_cart = new ProductCart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $id;
        $product_cart->quantity = 1; // ডিফল্ট মান ১
        $product_cart->save();
        // এখানে কার্টে প্রোডাক্ট যোগ করার লজিক থাকবে
        // উদাহরণস্বরূপ, সেশন বা ডাটাবেসে কার্ট আইটেম সংরক্ষণ করা ইত্যাদি

        // প্রোডাক্টটি খুঁজে বের করা হচ্ছে
        $product = Product::findOrFail($id);

        // কার্টে প্রোডাক্ট যোগ করার লজিক এখানে যুক্ত করুন
        // উদাহরণস্বরূপ, সেশন ব্যবহার করে কার্টে প্রোডাক্ট যোগ করা

        // সফলভাবে কার্টে যোগ করার পর রিডাইরেক্ট এবং মেসেজ দেখানো
        return redirect()->back()->with('success_message', 'Product added to cart successfully!');
    }
}