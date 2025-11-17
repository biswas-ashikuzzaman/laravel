@extends('maindesign')
<base href="/public">

@section('product_details')
<div class="container mt-5">
    
    {{-- ## 📦 প্রোডাক্ট ডিটেইলস সেকশন --}}
    <div class="row">
        <div class="col-md-6">
            {{-- **ডাইনামিক ইমেজ** --}}
            <img src="{{ asset('product_images/' . $product->product_image) }}" class="img-fluid rounded" alt="{{ $product->product_title }}">
        </div>
        <div class="col-md-6">
            
            {{-- **ডাইনামিক নাম** --}}
            <h2>{{ $product->product_title }}</h2>
            
            {{-- **ডাইনামিক দাম** --}}
            <p><strong>Price:</strong> ৳{{ number_format($product->product_price, 0, '.', ',') }}</p>
            
            {{-- স্টক (স্ট্যাটিক) --}}
            <p><strong>Stock:</strong> Available</p> 

            <p>
                <strong>Rating:</strong>
                <i class="fa fa-star" style="color: gold;"></i>
                <i class="fa fa-star" style="color: gold;"></i>
                <i class="fa fa-star" style="color: gold;"></i>
                <i class="fa fa-star" style="color: gold;"></i>
                <i class="fa fa-star-o" style="color: gold;"></i>
                (4/5)
            </p>

            {{-- **ডাইনামিক বিবরণ** --}}
            <p>{{ $product->product_description }}</p>

            <div class="mt-3">
                <button type="button" class="btn btn-success">🛒 Add to Cart</button>
                <button type="button" class="btn btn-outline-danger">❤️ Add to Wishlist</button>
            </div>
        </div>
    </div>
    
    <hr>

    {{-- ## 📝 রিভিউ সেকশন (স্ট্যাটিক থাকবে) --}}
    <div class="row mt-5">
        <div class="col-md-8">
            <h4>📝 Reviews</h4>
            <div class="border rounded p-3 mb-2">
                <strong>John Doe</strong> 
                <span class="text-muted">(2 days ago)</span>
                <p>Great sound quality and very comfortable to wear!</p>
                {{-- ... (Rest of static review content) ... --}}
            </div>
        </div>
    </div>

    {{-- ## 🔗 রিলেটেড প্রোডাক্টস (স্ট্যাটিক থাকবে) --}}
    <div class="row mt-5">
        <div class="col-12">
            <h4>🔗 Related Products</h4>
        </div>
        {{-- স্ট্যাটিক কার্ড ১ --}}
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
        {{-- স্ট্যাটিক কার্ড ২ --}}
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