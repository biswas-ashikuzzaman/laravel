@extends('admin.maindesign')

@section('view_product')
    <div class="container mt-4">
        <h4 class="mb-3">View Products</h4>

        @if(session('product_message'))
            <div class="alert alert-success">
                {{ session('product_message') }}
            </div>
        @endif

        <form method="GET" action="{{ route('admin.viewproduct') }}" class="mb-4">
            <div class="row g-2">
                <div class="col-md-6">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by title or category">
                </div>
                <div class="col-md-3">
                    <select name="per_page" class="form-select" onchange="this.form.submit()">
                        <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5 per page</option>
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 per page</option>
                        <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20 per page</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-outline-secondary w-100" type="submit">Apply</button>
                </div>
            </div>
        </form>

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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
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
                                <td>
                                    <a href="{{ route('admin.editproduct', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('admin.deleteproduct', $product->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
