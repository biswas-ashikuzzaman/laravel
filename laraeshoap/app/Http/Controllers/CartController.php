<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function add(Request $request)
    {
        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity ?? 1,
        ]);

        return redirect()->back()->with('success','Added to cart successfully');
    }
}
