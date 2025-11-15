<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function addCategory()
    {
        return view('admin.addcategory');
    }

    public function postaddCategory(Request $request)
    {
        $category = new Category();
        $category->category = $request->category;
        $category->save();

        return redirect()->back()->with('category_message', 'Category added successfully!');
    }

   public function viewCategory(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->input('per_page', 5); // Default to 5

    $categories = Category::when($search, function ($query, $search) {
        return $query->where('category', 'like', "%{$search}%");
    })->paginate($perPage);

    return view('admin.viewcategory', compact('categories', 'search'));
}

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('deletecategory_message', 'Deleted Successfully!');
    }

    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.addproduct', compact('categories'));
    }

    public function postAddProduct(Request $request)
    {
        $request->validate([
            'product_title' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'product_quantity' => 'required|integer|min:1',
            'product_price' => 'required|numeric|min:0',
            'product_category' => 'required',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_category = $request->product_category;

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('product_images'), $imageName);
            $product->product_image = $imageName;
        }

        $product->save();

        return redirect()->back()->with('product_message', 'Product added successfully!');
    }

    public function viewProduct(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5); // Default to 5 if not specified

        $products = Product::when($search, function ($query, $search) {
            return $query->where('product_title', 'like', "%{$search}%")
                         ->orWhere('product_category', 'like', "%{$search}%");
        })->paginate($perPage);

        return view('admin.viewproduct', compact('products', 'search'));
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.editproduct', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'product_title' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'product_quantity' => 'required|integer|min:1',
            'product_price' => 'required|numeric|min:0',
            'product_category' => 'required',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_category = $request->product_category;

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('product_images'), $imageName);
            $product->product_image = $imageName;
        }

        $product->save();

        return redirect()->route('admin.viewproduct')->with('product_message', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        if ($product->product_image) {
            $imagePath = public_path('product_images/' . $product->product_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()->back()->with('product_message', 'Product deleted successfully!');
    }
  public function viewOrders()
{
    $orders = Order::latest()->paginate(10);
    return view('admin.vieworders', compact('orders'));
}

public function updateOrderStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return redirect()->back()->with('order_message', 'Order status updated!');
}
public function downloadInvoice($id)
{
    $order = Order::findOrFail($id);
    $invoice = view('admin.invoice', compact('order'))->render();

    return response()->streamDownload(function () use ($invoice) {
        echo $invoice;
    }, 'invoice_' . $order->id . '.html');
}
// Product details 

public function adminOrders(){
    $orders = Order::with('items.product','user')->get();
    return view('admin.orders', compact('orders'));
 }
 
 

}
