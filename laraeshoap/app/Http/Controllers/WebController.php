<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WebController extends Controller
{
    public function index()
    {
        $latestProducts = Product::latest()->take(8)->get(); // Show latest 8 products
        return view('index', compact('latestProducts'));
    }
    
}

