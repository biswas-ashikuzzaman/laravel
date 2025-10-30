<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $products = Category::latest()->paginate(10);
        return view('Category.index', compact('Category'));
    }

    public function create()
    {
        return view('Category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Category::create($validated);

        return redirect()->route('Category.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $product)
    {
        return view('Category.show', compact('Category'));
    }

    public function edit(Category $product)
    {
        return view('Category.edit', compact('Category'));
    }

    public function update(Request $request, Category $Category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $Category->update($validated);

        return redirect()->route('Category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $Category)
    {
        $Category->delete();

        return redirect()->route('Category.index')->with('success', 'Category deleted successfully.');
    }
}
