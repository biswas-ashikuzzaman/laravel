<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Invoice #{{ $order->id }}</h2>
    <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
           @php
    $items = json_decode($order->order_items, true);
@endphp

@if(is_array($items))
    @foreach($items as $item)
        <tr>
            <td>{{ $item['title'] ?? 'N/A' }}</td>
            <td>৳{{ $item['price'] ?? 0 }}</td>
            <td>{{ $item['quantity'] ?? 0 }}</td>
            <td>৳{{ ($item['price'] ?? 0) * ($item['quantity'] ?? 0) }}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="4" class="text-danger">Order items are missing or invalid.</td>
    </tr>
@endif

        </tbody>
    </table>

    <h4>Total: ৳{{ $order->total_price }}</h4>
</body>
</html>
