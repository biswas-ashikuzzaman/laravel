@extends('maindesign')
<base href="/public">

@section('product_details')
<div class="container mt-5">
    <!-- Product Details -->
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/sample-product.jpg') }}" class="img-fluid rounded" alt="Sample Product">
        </div>
        <div class="col-md-6">
            <h2>Wireless Headphones</h2>
            <p><strong>Price:</strong> ৳2,999</p>
            <p><strong>Stock:</strong> Available</p>

            <!-- Rating Stars -->
            <p>
                <strong>Rating:</strong>
                <i class="fa fa-star" style="color: gold;"></i>
                <i class="fa fa-star" style="color: gold;"></i>
                <i class="fa fa-star" style="color: gold;"></i>
                <i class="fa fa-star" style="color: gold;"></i>
                <i class="fa fa-star-o" style="color: gold;"></i>
                (4/5)
            </p>

            <p>High-quality wireless headphones with noise cancellation and long battery life.</p>

            <!-- Action Buttons -->
            <div class="mt-3">
                <a href="{{ route('add_to_cart') }}" type="button" class="btn btn-success">🛒 Add to Cart</a>
                <button type="button" class="btn btn-outline-danger">❤️ Add to Wishlist</button>
            </div>
        </div>
    </div>

    <!-- Review Section -->
    <div class="row mt-5">
        <div class="col-md-8">
            <h4>📝 Reviews</h4>
            <div class="border rounded p-3 mb-2">
                <strong>John Doe</strong> 
                <span class="text-muted">(2 days ago)</span>
                <p>Great sound quality and very comfortable to wear!</p>
                <p>
                    <i class="fa fa-star" style="color: orange;"></i>
                    <i class="fa fa-star" style="color: orange;"></i>
                    <i class="fa fa-star" style="color: orange;"></i>
                    <i class="fa fa-star" style="color: orange;"></i>
                    <i class="fa fa-star-o" style="color: orange;"></i>
                </p>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="row mt-5">
        <div class="col-12">
            <h4>🔗 Related Products</h4>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ asset('images/related1.jpg') }}" class="card-img-top" alt="Related Product 1">
                <div class="card-body">
                    <h5 class="card-title">Bluetooth Speaker</h5>
                    <p class="card-text">৳1,499</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ asset('images/related2.jpg') }}" class="card-img-top" alt="Related Product 2">
                <div class="card-body">
                    <h5 class="card-title">Noise Cancelling Earbuds</h5>
                    <p class="card-text">৳2,199</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
