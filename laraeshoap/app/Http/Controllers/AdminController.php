<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
        return view('admin.viewcategory', compact('categories'));
    }
    public function deleteCategory($id){
$category=Category::findOrFail($id);
$category->delete();
return redirect()->back()->with('deletecategory_message','Deleted Successfully!');
    }
    public function addProduct()
    {
        return view('admin.addproduct');
    }
    public function viewProduct()
    {
        return view('admin.viewproduct');
}
    public function viewOrder()
    {
        return view('admin.vieworder');
    }
}

