@extends('maindesign')
@section('viewcart_products')
{{-- Start total price calculation (Initial values from PHP) --}}
@php
    $subtotal = 0;
    $shipping = 100; // Fixed delivery charge
    $tax_rate = 0.10; // 10% VAT
    
    foreach ($cart as $item) {
        $subtotal += $item->product->product_price * $item->quantity;
    }
    
    $tax = $subtotal * $tax_rate;
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
                <table class="table table-striped table-hover align-middle mb-0" id="cart-table">
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
                                <tr data-row-id="{{ $cart_product->id }}">
                                    <td class="text-center">
                                        <img src="{{ asset('storage/product_images/' . $cart_product->product->product_image) }}" 
                                             alt="{{ $cart_product->product->product_title }}"
                                             width="70" 
                                             height="70" 
                                             class="img-thumbnail rounded shadow-sm"
                                             onerror="this.onerror=null; this.src='https://placehold.co/70x70/E0E0E0/333333?text=Missing';">
                                    </td>
                                    
                                    <td>
                                        <a href="{{ url('products', $cart_product->product->id) }}" class="text-decoration-none text-dark fw-bold">
                                            {{ $cart_product->product->product_title }}
                                        </a>
                                        <p class="small text-muted mb-0">SKU: #{{ $cart_product->product->id }}</p>
                                    </td>
                                    
                                    <td class="text-end fw-semibold">
                                        <span class="product-price">{{ $cart_product->product->product_price }}</span>
                                    </td>
                                    
                                    <td class="text-center">
                                        <input type="number" 
                                               name="quantity" 
                                               value="{{ $cart_product->quantity }}" 
                                               min="1" 
                                               class="form-control form-control-sm text-center mx-auto product-quantity"
                                               style="width: 70px;"
                                               data-cart-id="{{ $cart_product->id }}"
                                               onchange="updateRowTotal(this)">
                                    </td>
                                    
                                    <td class="text-end fw-bold text-success">
                                        <span class="row-total">{{ number_format($cart_product->product->product_price * $cart_product->quantity, 2) }}</span>
                                    </td>

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
                            <tbody>
                                <tr>
                                    <td>Subtotal:</td>
                                    <td class="text-end fw-semibold">BDT <span id="cart-subtotal-display">{{ number_format($subtotal, 2) }}</span></td>
                                </tr>
                                <tr>
                                    <td>Shipping Charge:</td>
                                    <td class="text-end fw-semibold">BDT <span id="cart-shipping-display">{{ number_format($shipping, 2) }}</span></td>
                                </tr>
                                <tr>
                                    <td>VAT ({{ $tax_rate * 100 }}%):</td>
                                    <td class="text-end fw-semibold">BDT <span id="cart-tax-display">{{ number_format($tax, 2) }}</span></td>
                                </tr>
                                <tr class="border-top border-2">
                                    <td class="fw-bold fs-5">Grand Total:</td>
                                    <td class="text-end fw-bold fs-5 text-success">BDT <span id="cart-grandtotal-display">{{ number_format($grand_total, 2) }}</span></td>
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

{{-- ---------------------------------------------------------------------- --}}
{{-- 🚀 JAVASCRIPT FOR DYNAMIC PRICE UPDATE (Requires jQuery) --}}
{{-- Make sure you have jQuery loaded in your maindesign.blade.php or above this script --}}
{{-- ---------------------------------------------------------------------- --}}
<script>
    // --- Configuration from PHP ---
    const SHIPPING_CHARGE = parseFloat({{ $shipping }});
    const TAX_RATE = parseFloat({{ $tax_rate }});
    const CSRF_TOKEN = '{{ csrf_token() }}'; // Laravel CSRF Token
    // ----------------------------

    /**
     * Finds the parent row and sends an AJAX request to update the quantity on the server.
     * Then it updates the local totals.
     * @param {HTMLInputElement} quantityInput - The quantity input element that triggered the change.
     */
    function updateRowTotal(quantityInput) {
        const row = $(quantityInput).closest('tr'); // Use jQuery for easy DOM traversal
        const cartId = $(quantityInput).data('cart-id');
        let quantity = parseInt(quantityInput.value);

        // Client-side validation
        if (isNaN(quantity) || quantity < 1) {
            quantity = 1;
            quantityInput.value = 1;
        }

        // 1. **Perform AJAX Call to Server**
        $.ajax({
            url: '{{ url('/updatecartquantity') }}/' + cartId, // Construct the URL
            method: 'POST',
            data: {
                _token: CSRF_TOKEN,
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    // 2. **Update Row Total Display using data from server**
                    row.find('.row-total').text(
                        parseFloat(response.row_total).toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        })
                    );
                    
                    // 3. **Update Cart Summary Totals**
                    updateCartSummary();
                    
                    // Optional: Show a success message (e.g., using Bootstrap toast or alert)
                    // console.log(response.message); 

                } else {
                    alert('Error: ' + response.message);
                    // Reload or revert quantity if server update failed
                }
            },
            error: function(xhr) {
                // Handle various AJAX errors (e.g., validation failed, 404, 500)
                const error = xhr.responseJSON.message || "Could not connect to server.";
                alert('Quantity update failed: ' + error);
                
                // For robustness, you might want to fetch the current DB quantity and revert the input field
            }
        });
    }

    /**
     * Recalculates Subtotal, Tax, and Grand Total for the entire cart based on visible row totals.
     */
    function updateCartSummary() {
        let newSubtotal = 0;
        
        // Sum up all the individual row totals
        $('.row-total').each(function() {
            // Get the numeric value from the displayed text (remove commas)
            const totalValue = parseFloat($(this).text().replace(/,/g, ''));
            if (!isNaN(totalValue)) {
                newSubtotal += totalValue;
            }
        });
        
        // Calculate new tax and grand total
        const newTax = newSubtotal * TAX_RATE;
        const newGrandTotal = newSubtotal + SHIPPING_CHARGE + newTax;

        // Helper function for formatting
        const formatter = (value) => value.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        // Update the display elements
        $('#cart-subtotal-display').text(formatter(newSubtotal));
        $('#cart-tax-display').text(formatter(newTax));
        $('#cart-grandtotal-display').text(formatter(newGrandTotal));
    }

    // Initialize totals on page load
    $(document).ready(function() {
        updateCartSummary();
    });

</script>
@endsection