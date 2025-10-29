@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>All Accounts</h4>
    <a href="{{ route('accounts.create') }}" class="btn btn-success">+ Add New Account</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Account Number</th>
            <th>Holder Name</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>
        @forelse($accounts as $account)
        <tr>
            <td>{{ $account->id }}</td>
            <td>{{ $account->account_number }}</td>
            <td>{{ $account->holder_name }}</td>
            <td>{{ $account->email }}</td>
            <td>${{ number_format($account->balance, 2) }}</td>
            <td>{{ ucfirst($account->account_type) }}</td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No accounts found</td></tr>
        @endforelse
    </tbody>
</table>

{{ $accounts->links() }}
@endsection
