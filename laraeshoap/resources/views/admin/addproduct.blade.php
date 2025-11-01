@extends('admin.maindesign')

@section('add_product')
    @if(session('product_message'))
        <div class="alert alert-success mt-3">
            {{ session('product_message') }}
        </div>
    @endif

    <div class="container mt-4">
        <form action="{{ route('admin.postaddproduct') }}" method="post" enctype="multipart/form-data" class="p-4 border rounded bg-light shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" name="product_title" class="form-control" placeholder="Enter Product Title"/>
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea id="product_description" name="product_description" class="form-control" placeholder="Product Descriptions!"></textarea>
            </div>

            <div class="mb-3">
                <label for="product_quantity" class="form-label">Quantity</label>
                <input type="number" id="product_quantity" name="product_quantity" class="form-control" placeholder="Enter Product quantity here"/>
            </div>

            <div class="mb-3">
                <label for="product_price" class="form-label">Price</label>
                <input type="number" id="product_price" name="product_price" class="form-control" placeholder="Enter Product Price here"/>
            </div>

            <div class="mb-3">
                <label for="product_category" class="form-label">Select Category</label>
                <select id="product_category" name="product_category" class="form-select">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file" id="product_image" name="product_image" class="form-control"/>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
