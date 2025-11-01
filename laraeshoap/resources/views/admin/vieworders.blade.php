@extends('admin.maindesign')

@section('view_order')
<div class="container mt-4">
    <h4>Order List</h4>

    @if(session('order_message'))
        <div class="alert alert-success">{{ session('order_message') }}</div>
    @endif

    <table class="table table-bordered table-hover mt-3">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
                <th>Invoice</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>৳{{ $order->total_price }}</td>
                    <td>
                        <form action="{{ route('admin.updateorderstatus', $order->id) }}" method="POST">
                            @csrf
                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('admin.downloadinvoice', $order->id) }}" class="btn btn-sm btn-info">Download Invoice</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $orders->links() }}
</div>
@endsection
