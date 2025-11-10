<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == 'user') {
            return view('dashboard');
        } else {
            return view('admin.dashboard');
        }
    }

    public function productDetails($id)
    {
        // $latestProducts  = Product::findOrFail($id);
        // return view('product_details', compact('latestProducts'));


          $product = Product::findOrFail($id); // findOrFail throws 404 if not found

    $latestProducts = Product::orderBy('created_at', 'desc')->take(10)->get();

    return view('product_details', compact('product', 'latestProducts'));
    }
    
}
