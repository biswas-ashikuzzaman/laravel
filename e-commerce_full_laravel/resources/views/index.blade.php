@extends('maindesign')
@section('index')
<!-- shop section -->

  <div class="container mt-5">
    <h3 class="mb-4">Latest Products</h3>

    <div class="row">
        @forelse($latestProducts as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100" style="border-radius:10px;">
                    
                    <!-- ✅ Wrap whole card content (except button) with link -->
                    <a href="{{ route('product_details', $product->id) }}" style="text-decoration:none; color:inherit;">

                        @if($product->product_image)
                            <img src="{{ asset('product_images/' . $product->product_image) }}" 
                                 class="card-img-top"
                                 alt="{{ $product->product_title }}"
                                 style="height:200px; object-fit:cover;">
                        @else
                            <img src="{{ asset('images/default.png') }}" 
                                 class="card-img-top"
                                 alt="No image"
                                 style="height:200px; object-fit:cover;">
                        @endif
                        
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->product_title }}</h5>
                            <p class="card-text">{{ Str::limit($product->product_description, 60) }}</p>
                            <p class="card-text text-danger fw-bold">৳{{ $product->product_price }}</p>
                        </div>

                    </a>

                    <div class="card-footer bg-white text-center">

    <!-- Preview Button -->
    <a href="{{ route('product_details',$product->id) }}" 
       class="btn btn-primary me-2">👁 Preview</a> <br> <br>

    <!-- Add to Cart Button -->
    <a href="{{ route('add_to_cart',$product->id) }}" 
       type="button" 
       class="btn btn-success">🛒 Add to Cart</a> <br> <br>

</div>

                </div>
            </div>
        @empty
            <p class="text-muted">No products available.</p>
        @endforelse
    </div>
  </div>

<!-- end shop section -->
@endsection