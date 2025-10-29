@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Account Details</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <p><strong>Account Number:</strong> {{ $account->account_number }}</p>
    <p><strong>Holder Name:</strong> {{ $account->holder_name }}</p>
    <p><strong>Email:</strong> {{ $account->email }}</p>
    <p><strong>Balance:</strong> ${{ $account->balance }}</p>
    <p><strong>Type:</strong> {{ ucfirst($account->account_type) }}</p>

    <hr>

    <h4>💰 Deposit / Withdraw</h4>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('accounts.deposit', $account) }}" method="POST">
                @csrf
                <input type="number" name="amount" class="form-control mb-2" placeholder="Amount">
                <button class="btn btn-success">Deposit</button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{ route('accounts.withdraw', $account) }}" method="POST">
                @csrf
                <input type="number" name="amount" class="form-control mb-2" placeholder="Amount">
                <button class="btn btn-danger">Withdraw</button>
            </form>
        </div>
    </div>

    <a href="{{ route('accounts.index') }}" class="btn btn-secondary mt-3">⬅ Back</a>
</div>
@endsection
