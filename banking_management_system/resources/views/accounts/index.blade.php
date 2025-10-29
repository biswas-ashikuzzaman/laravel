@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Accounts</h2>

    <a href="{{ route('accounts.create') }}" class="btn btn-primary mb-3">+ Add New Account</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Account #</th>
                <th>Holder</th>
                <th>Email</th>
                <th>Balance</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($accounts as $a)
            <tr>
                <td>{{ $a->account_number }}</td>
                <td>{{ $a->holder_name }}</td>
                <td>{{ $a->email }}</td>
                <td>${{ $a->balance }}</td>
                <td>{{ ucfirst($a->account_type) }}</td>
                <td>
                    <a href="{{ route('accounts.show', $a) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('accounts.edit', $a) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('accounts.destroy', $a) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this account?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
