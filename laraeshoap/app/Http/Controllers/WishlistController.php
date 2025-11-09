<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index() {
        $wishlistItems = auth()->user()->wishlist()->with('product')->get();
        return view('wishlist.index', compact('wishlistItems'));
    }

    public function add($productId) {
        $user = auth()->user();
        if(!$user->wishlist()->where('product_id', $productId)->exists()) {
            $user->wishlist()->create(['product_id' => $productId]);
        }
        return redirect()->back()->with('success', 'Added to wishlist');
    }

    public function remove($productId) {
        auth()->user()->wishlist()->where('product_id', $productId)->delete();
        return redirect()->back()->with('success', 'Removed from wishlist');
    }
}
