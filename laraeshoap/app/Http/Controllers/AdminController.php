<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class AdminController extends Controller
{
    public function addCategory()
    {
        return view('admin.addcategory');
    }
    public function postaddCategory(Request $request)
    {
        $category=new Category();
        $category->category=$request->category;
        $category->save();
        // Here you would typically save the category to the database
        // For demonstration, we'll just return a success message
        return redirect()->back()->with('category_message', 'Category added successfully!');
    }
    public function viewCategory()
    {
        $categories = Category::all();
        return view('admin.addproduct', compact('categories'));

    }
    public function deleteCategory($id){
$category=Category::findOrFail($id);
$category->delete();
return redirect()->back()->with('deletecategory_message','Deleted Successfully!');
    }
    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.addproduct', compact('categories'));
    }
     public function postAddProduct(Request $request)
   {
    $product = new Product();

    $product->product_title = $request->product_title;
    $product->product_description = $request->product_description;
    $product->product_quantity = $request->product_quantity;
    $product->product_price = $request->product_price;
    $product->product_category = $request->product_category;
    // Handle image upload
    if ($request->hasFile('product_image')) {
        $image = $request->file('product_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('product_images'), $imageName);
        $product->product_image = $imageName;
    }

    $product->save();
    
       // Validate and save the product details
       // For demonstration, we'll just return a success message
       return redirect()->back()->with('product_message', 'Product added successfully!');
   }
public function viewProduct()
{
    $products = Product::all();
    return view('admin.viewproduct', compact('products'));
}
//     public function viewOrder()
//     {
//         return view('admin.vieworder');
//     }
  
}

