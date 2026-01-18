<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', sans-serif;
        }
        /* Sidebar */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: #1e1e2f;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 0;
            overflow-y: auto;
        }
        .sidebar a {
            color: #c7c7d3;
            text-decoration: none;
            display: block;
            padding: 12px 25px;
            font-size: 15px;
        }
        .sidebar a.active, .sidebar a:hover {
            background: #34344e;
            color: #fff;
        }
        /* Content Area */
        .content-area {
            margin-left: 260px;
            padding: 30px;
        }
        .topbar {
            background: white;
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.05);
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content-area {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center fw-bold mb-4">My Dashboard</h4>

        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>

        <a href="{{ route('myorders') }}" class="{{ request()->routeIs('myorders') ? 'active' : '' }}">
            <i class="bi bi-bag-check me-2"></i> My Orders
        </a>

        <a href="{{ route('profile.edit') }}">
            <i class="bi bi-person-lines-fill me-2"></i> Profile
        </a>

        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button class="btn btn-danger w-75 mx-auto d-block">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="content-area">
        <div class="topbar d-flex justify-content-between align-items-center flex-wrap">
            <h4 class="fw-bold m-0">Welcome, {{ Auth::user()->name }}</h4>
            <span class="text-muted small">{{ Auth::user()->email }}</span>
        </div>

        <!-- My Order History -->
        <div class="container-fluid">
            <h3 class="fw-bold mb-3">📜 My Order History</h3>

            @if($orders->isEmpty())
                <div class="alert alert-info text-center shadow-sm">
                    <i class="bi bi-info-circle-fill me-2"></i> No orders found. Start shopping!
                </div>
            @else
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold">
                        Orders List ({{ $orders->count() }})
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0 align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Product</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-end">Total Price</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Invoice</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="fw-bold">{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ url('products', $order->product->id) }}" class="text-dark fw-semibold">
                                            {{ $order->product->product_title ?? 'N/A' }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/product_images/' . ($order->product->product_image ?? 'default.jpg')) }}"
                                             width="50" height="50" class="img-thumbnail rounded">
                                    </td>
                                    <td class="text-end fw-bold text-success">
                                        ৳{{ number_format($order->product->product_price ?? 0, 2) }}
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $status = $order->status ?? 'Pending';
                                            $badgeClass = match($status) {
                                                'Delivered' => 'success',
                                                'Shipped' => 'info',
                                                'Cancelled' => 'danger',
                                                default => 'warning',
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $badgeClass }}">{{ $status }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.downloadinvoice', $order->id) }}"
                                           class="btn btn-sm btn-outline-info">
                                            <i class="bi bi-file-earmark-arrow-down"></i> Invoice
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
