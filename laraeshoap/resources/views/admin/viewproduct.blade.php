@extends('admin.maindesign')

@section('view_product')
    @if(session('product_message'))
        <div class="alert alert-success mt-3">
            {{ session('product_message') }}
        </div>
    @endif

    <div class="container mt-4">
        <h4 class="mb-3">View Products</h4>

        <div class="card shadow-sm rounded-3">
            <div class="card-body">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_title }}</td>
                                <td>{{ $product->product_description }}</td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_category }}</td>
                                <td>
                                    @if($product->product_image)
                                        <img src="{{ asset('product_images/' . $product->product_image) }}" width="80" height="80" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
