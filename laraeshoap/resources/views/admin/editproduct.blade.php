@extends('admin.maindesign')
<base href="/public">

@section('edit_product')
    <div class="container mt-4">
        <h4 class="mb-3">Edit Product</h4>

        <form action="{{ route('admin.updateproduct', $product->id) }}" method="post" enctype="multipart/form-data" class="p-4 border rounded bg-light shadow-sm">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" name="product_title" class="form-control" value="{{ $product->product_title }}">
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea id="product_description" name="product_description" class="form-control">{{ $product->product_description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="product_quantity" class="form-label">Quantity</label>
                <input type="number" id="product_quantity" name="product_quantity" class="form-control" value="{{ $product->product_quantity }}">
            </div>

            <div class="mb-3">
                <label for="product_price" class="form-label">Price</label>
                <input type="number" id="product_price" name="product_price" class="form-control" value="{{ $product->product_price }}">
            </div>

            <div class="mb-3">
                <label for="product_category" class="form-label">Select Category</label>
                <select id="product_category" name="product_category" class="form-select">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->product_category == $category->id ? 'selected' : '' }}>
                            {{ $category->category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file" id="product_image" name="product_image" class="form-control">
                @if($product->product_image)
                    <img src="{{ asset('product_images/' . $product->product_image) }}" width="100" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update Product</button>
        </form>
    </div>
@endsection
