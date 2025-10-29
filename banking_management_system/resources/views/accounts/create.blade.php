@extends('layouts.app')

@section('content')
<h4>Create New Account</h4>
<form action="{{ route('accounts.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Account Number</label>
        <input type="text" name="account_number" class="form-control" value="{{ old('account_number') }}">
        @error('account_number') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Holder Name</label>
        <input type="text" name="holder_name" class="form-control" value="{{ old('holder_name') }}">
        @error('holder_name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Initial Balance</label>
        <input type="number" step="0.01" name="balance" class="form-control" value="{{ old('balance', 0) }}">
        @error('balance') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Account Type</label>
        <select name="account_type" class="form-select">
            <option value="savings" {{ old('account_type') == 'savings' ? 'selected' : '' }}>Savings</option>
            <option value="current" {{ old('account_type') == 'current' ? 'selected' : '' }}>Current</option>
        </select>
        @error('account_type') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-primary">Create Account</button>
    <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
