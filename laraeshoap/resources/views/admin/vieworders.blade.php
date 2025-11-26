@extends('admin.maindesign')

@section('view_order')
<div class="container mt-4">
    <h4 class="mb-4 fw-bold">Order List</h4>

    @if(session('order_message'))
        <div class="alert alert-success">{{ session('order_message') }}</div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Invoice</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td class="text-center fw-bold">{{ $order->id }}</td>

                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->email }}</td>

                    <td class="fw-bold text-success">
                        ৳{{ $order->product->product_price }}
                    </td>

                    {{-- STATUS DROPDOWN WITH WORKING COLOR --}}
                    <td>
                        <form action="{{ route('admin.updateorderstatus', $order->id) }}" method="POST">
                            @csrf

                            @php
                                if ($order->status == 'Pending') {
                                    $bg = 'bg-warning text-dark'; // Yellow
                                } elseif ($order->status == 'Delivered') {
                                    $bg = 'bg-primary text-white'; // Blue
                                } elseif ($order->status == 'Cancelled') {
                                    $bg = 'bg-danger text-white'; // Red
                                } else {
                                    $bg = 'bg-secondary text-white';
                                }
                            @endphp

                            <select name="status" onchange="this.form.submit()"
                                class="form-select form-select-sm {{ $bg }}">
                                <option value="Pending" class="text-dark" {{ $order->status=='Pending' ? 'selected' : '' }}>
                                    Pending
                                </option>
                                <option value="Delivered" class="text-dark" {{ $order->status=='Delivered' ? 'selected' : '' }}>
                                    Delivered
                                </option>
                                <option value="Cancelled" class="text-dark" {{ $order->status=='Cancelled' ? 'selected' : '' }}>
                                    Cancelled
                                </option>
                            </select>
                        </form>
                    </td>

                    {{-- PAYMENT STATUS BADGE --}}
                    <td class="text-center">
                        @if($order->payment_status == 'Paid')
                            <span class="badge bg-success px-3 py-2">Paid</span>
                        @elseif($order->payment_status == 'Cash on Delivery')
                            <span class="badge bg-info text-dark px-3 py-2">Cash on Delivery</span>
                        @else
                            <span class="badge bg-danger px-3 py-2">Unpaid</span>
                        @endif
                    </td>

                    {{-- INVOICE --}}
                    <td class="text-center">
                        <a href="{{ route('admin.downloadinvoice', $order->id) }}"
                           class="btn btn-sm btn-outline-primary">
                            Download
                        </a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $orders->links() }}
    </div>
</div>
@endsection
