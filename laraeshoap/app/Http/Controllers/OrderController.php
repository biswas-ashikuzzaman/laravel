<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder()
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        $total = 0;

        foreach ($cart as $item){
            $total += $item->product->product_price * $item->quantity;
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total
        ]);

        foreach ($cart as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->product_price
            ]);
        }

        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('user.orders')->with('success','Order placed successfully');
    }

    public function myOrders(){
        $orders = Order::where('user_id', Auth::id())
                       ->with('items.product')
                       ->get();

        return view('users.orders', compact('orders'));
    }
}
