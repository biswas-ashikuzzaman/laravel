<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){ return Product::latest()->get(); }

    public function store(Request $r){
        $r->validate(['name'=>'required','price'=>'required|numeric']);
        return Product::create($r->only(['name','price','description']));
    }

    public function show(Product $product){ return $product; }

    public function update(Request $r, Product $product){
        $product->update($r->only(['name','price','description']));
        return $product;
    }

    public function destroy(Product $product){
        $product->delete();
        return response()->json(['message'=>'deleted']);
    }
}
