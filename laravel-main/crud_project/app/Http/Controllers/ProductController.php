<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // সব প্রোডাক্ট দেখানো
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Create ফর্ম দেখানো
    public function create()
    {
        return view('products.create');
    }

    // নতুন প্রোডাক্ট যোগ করা
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Edit ফর্ম দেখানো
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // আপডেট করা
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // ডেটা মুছে ফেলা
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
