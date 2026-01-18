@extends('maindesign')
@section('viewcart_products')

{{-- Start total price calculation --}}
@php
    $subtotal = 0;
    $shipping = 100;
    $tax_rate = 0.10;

    foreach ($cart as $item) {
        $subtotal += $item->product->product_price * $item->quantity;
    }

    $tax = $subtotal * $tax_rate;
    $grand_total = $subtotal + $shipping + $tax;
@endphp

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
                        @php $price = 0; @endphp

                        @if($cart->isEmpty())
                            <tr><td colspan="6" class="text-center py-4 text-muted">Your shopping cart is empty.</td></tr>
                        @else
                            @foreach($cart as $cart_product)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/product_images/' . $cart_product->product->product_image) }}"
                                             width="70" height="70"
                                             class="img-thumbnail rounded shadow-sm">
                                    </td>

                                    <td>
                                        <a href="{{ url('products', $cart_product->product->id) }}"
                                           class="text-decoration-none text-dark fw-bold">
                                            {{ $cart_product->product->product_title }}
                                        </a>
                                        <p class="small text-muted mb-0">SKU: #{{ $cart_product->product->id }}</p>
                                    </td>

                                    <td class="text-end fw-semibold">
                                        {{ number_format($cart_product->product->product_price, 2) }}
                                    </td>

                                    <td class="text-center">
                                        <input type="number" value="{{ $cart_product->quantity }}" min="1"
                                               class="form-control form-control-sm text-center mx-auto" style="width: 70px;">
                                    </td>

                                    <td class="text-end fw-bold text-success">
                                        {{ number_format($cart_product->product->product_price * $cart_product->quantity, 2) }}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('removecartproducts', $cart_product->id) }}"
                                           class="btn btn-sm btn-outline-danger"
                                           onclick="return confirm('Are you sure you want to remove this item?')">
                                           <i class="bi bi-trash"></i> Remove
                                        </a>
                                    </td>
                                </tr>

                                @php
                                    $price += ($cart_product->product->product_price * $cart_product->quantity);
                                @endphp
                            @endforeach

                            <tr>
                                <th></th>
                                <th>Total Price</th>
                                <th class="text-end"></th>
                                <th class="text-center"></th>
                                <th class="text-end">{{ $price }}</th>
                                <th></th>
                            </tr>
                        @endif
                    </tbody>
                </table>

                @if(session('confirm_your_order'))
                    <div class="alert alert-success mt-3">
                        {{ session('confirm_your_order') }}
                    </div>
                @endif

            </div>
        </div>
    </div>

    @if($cart->isNotEmpty())
        <div class="row mt-4">

            <div class="col-md-6 mb-3 d-grid">
                <a href="{{ route('index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Continue Shopping
                </a>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-light fw-bold">Cart Summary</div>

                    <div class="card-body">
                        <table class="table table-sm table-borderless">
                            <tr><td>Subtotal:</td> <td class="text-end fw-semibold">BDT {{ number_format($subtotal, 2) }}</td></tr>
                            <tr><td>Shipping:</td> <td class="text-end fw-semibold">BDT {{ number_format($shipping, 2) }}</td></tr>
                            <tr><td>VAT ({{ $tax_rate * 100 }}%):</td> <td class="text-end fw-semibold">BDT {{ number_format($tax, 2) }}</td></tr>
                            <tr class="border-top border-2">
                                <td class="fw-bold fs-5">Grand Total:</td>
                                <td class="text-end fw-bold fs-5 text-success">BDT {{ number_format($grand_total, 2) }}</td>
                            </tr>
                        </table>

                        {{-- Order Form --}}
                        <form action="{{ route('confirm_order') }}" method="post">
                            @csrf

                            <input type="text" name="receiver_address" placeholder="Enter Your Address" required class="form-control mb-3">

                            <input type="text" name="receiver_phone" placeholder="Enter Your Phone Number" required class="form-control mb-3">

                            <label class="fw-bold mb-2">Select Payment Method:</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                                <label class="form-check-label" for="cod">Cash On Delivery</label>
                            </div>

                            <div class="form-check mt-1 mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="online" value="online">
                                <label class="form-check-label" for="online">Pay Online</label>
                            </div>

                            <button class="btn btn-primary w-100">Confirm Order</button>

                            {{-- Pay Now button --}}
                            <a href="{{ route('stripe', $price) }}"
                               id="payNowBtn"
                               class="btn btn-success w-100 mt-3 d-none">
                               Pay Now
                            </a>
                        </form>

                        {{-- Script for show/hide Pay Now button --}}
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const payNowBtn = document.getElementById('payNowBtn');
                                const cod = document.getElementById('cod');
                                const online = document.getElementById('online');

                                cod.addEventListener('change', function () {
                                    payNowBtn.classList.add('d-none');
                                });

                                online.addEventListener('change', function () {
                                    payNowBtn.classList.remove('d-none');
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@endsection
