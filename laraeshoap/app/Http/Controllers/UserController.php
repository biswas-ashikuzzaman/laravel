<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCart;

use App\Models\Order;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use PhpParser\Node\Expr\New_;

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

        // প্রোডাক্টটি খুঁজে বের করা হচ্ছে
        $product = Product::findOrFail($id);

        // কার্ট আইটেম তৈরি/সংরক্ষণ
        $product_cart = new ProductCart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $product->id;
        $product_cart->quantity = 1;
        $product_cart->save();

        // সফলভাবে কার্টে যোগ করার পর রিডাইরেক্ট এবং মেসেজ দেখানো
        return redirect()->back()->with('success_message', 'Product added to cart successfully!');
    }
    // View cart products
    public function cartProducts()
    {   
        if (Auth::check()) {
         $count = ProductCart::where('user_id', Auth::id())->count();
        $cart = ProductCart::where('user_id', Auth::id())->with('product')->get();
      
        } else {
           $count = '';
           
        }

       
        
       return view('viewcartproducts', compact('cart', 'count'));
    }
    public function removeCartProducts($id)
    {
        $cart_product = ProductCart::findOrFail($id);
        $cart_product->delete();
        return redirect()->back();
    }   
    public function confirmOrder(Request $request){
        $cart_product_id=productCart::where('user_id',Auth::id())->get();
        $address=$request->receiver_address;
        $phone=$request->receiver_phone;
foreach($cart_product_id as $cart_product){
    $order=new Order();

$order->receiver_address= $address;
$order->receiver_phone=$phone;
$order->user_id=Auth::id();
$order->product_id=$cart_product->product_id;
$order->save();

}
$carts=ProductCart::where('user_id',Auth::id())->get();
foreach($carts as $cart){
    $cart_id=ProductCart::find($cart->id);
    $cart_id->delete();
}
return redirect()->back()->with('confirm_your_order','Your Order Confirmed');
    }
    
}
