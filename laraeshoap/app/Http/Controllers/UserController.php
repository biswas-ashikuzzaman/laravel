<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product; // Product মডেলটি ব্যবহার করার জন্য নিশ্চিত করুন

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
}