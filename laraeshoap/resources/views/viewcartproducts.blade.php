@extends('maindesign')
@section('viewcart_products')
{{-- Start total price calculation --}}
@php
    $subtotal = 0;
    // Set your delivery and VAT rates here (e.g.)
    $shipping = 100; // Fixed delivery charge
    $tax_rate = 0.10; // 10% VAT
    
    foreach ($cart as $item) {
        // Calculate subtotal by multiplying product price and quantity
        $subtotal += $item->product->product_price * $item->quantity;
    }
    
    // Calculate VAT
    $tax = $subtotal * $tax_rate;
    // Calculate Grand Total
    $grand_total = $subtotal + $shipping + $tax;
@endphp

{{-- Ensure Bootstrap Icons CSS is linked (if not already in maindesign) --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container my-5">
    <h2 class="mb-4 text-center fw-bold text-primary">Your Shopping Cart</h2>
    
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white fw-bold">
            Cart Items
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Product Description</th>
                            <th class="text-end">Price (BDT)</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-end">Total (BDT)</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($cart->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Your shopping cart is empty.</td>
                            </tr>
                        @else
                            @foreach($cart as $cart_product)
                                <tr>
                                    <!-- 1. Image -->
                                    <td class="text-center">
                                        <img src="{{ asset('storage/product_images/' . $cart_product->product->product_image) }}" 
                                             alt="{{ $cart_product->product->product_title }}"
                                             width="70" 
                                             height="70" 
                                             class="img-thumbnail rounded shadow-sm"
                                             onerror="this.onerror=null; this.src='https://placehold.co/70x70/E0E0E0/333333?text=Missing'; console.error('Failed to load image at: cart_images/{{ $cart_product->product->product_image }}');">
                                    </td>
                                    
                                    <!-- 2. Title -->
                                    <td>
                                        <!-- Link to product details page -->
                                        <a href="{{ url('products', $cart_product->product->id) }}" class="text-decoration-none text-dark fw-bold">
                                            {{ $cart_product->product->product_title }}
                                        </a>
                                        <p class="small text-muted mb-0">SKU: #{{ $cart_product->product->id }}</p>
                                    </td>
                                    
                                    <!-- 3. Price -->
                                    <td class="text-end fw-semibold">
                                        {{ number_format($cart_product->product->product_price, 2) }}
                                    </td>
                                    
                                    <!-- 4. Quantity (Input field for updating quantity) -->
                                    <td class="text-center">
                                        {{-- You can integrate a form here to update the quantity --}}
                                        <input type="number" name="quantity" value="{{ $cart_product->quantity }}" min="1" class="form-control form-control-sm text-center mx-auto" style="width: 70px;">
                                    </td>
                                    
                                    <!-- 5. Subtotal (Row Total) -->
                                    <td class="text-end fw-bold text-success">
                                        {{ number_format($cart_product->product->product_price * $cart_product->quantity, 2) }}
                                    </td>

                                    <!-- 6. Action Button (Remove) -->
                                    <td class="text-center">
                                        <a href="{{ route('removecartproducts', $cart_product->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to remove this item from the cart?')">
    <i class="bi bi-trash"></i> Remove
</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    @if ($cart->isNotEmpty())
        <div class="row mt-4">
            <!-- Continue Shopping Button -->
            <div class="col-md-6 mb-3 d-grid">
                <a href="{{ route('index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Continue Shopping
                </a>
            </div>
            
            <!-- Cart Summary & Checkout -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-light fw-bold">Cart Summary</div>
                    <div class="card-body">
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td>Subtotal:</td>
                                    <td class="text-end fw-semibold">BDT {{ number_format($subtotal, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Shipping Charge:</td>
                                    <td class="text-end fw-semibold">BDT {{ number_format($shipping, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>VAT ({{ $tax_rate * 100 }}%):</td>
                                    <td class="text-end fw-semibold">BDT {{ number_format($tax, 2) }}</td>
                                </tr>
                                <tr class="border-top border-2">
                                    <td class="fw-bold fs-5">Grand Total:</td>
                                    <td class="text-end fw-bold fs-5 text-success">BDT {{ number_format($grand_total, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="d-grid gap-2 mt-3">
                            <a href="#" class="btn btn-success btn-lg">
                                <i class="bi bi-bag-check-fill"></i> Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection