@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">➕ Add New Account</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some issues with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('accounts.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="holder_name">Account Holder Name</label>
            <input type="text" name="holder_name" id="holder_name" class="form-control" placeholder="Enter holder name" value="{{ old('holder_name') }}">
        </div>

        <div class="form-group mb-3">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">
        </div>

        <div class="form-group mb-3">
            <label for="account_type">Account Type</label>
            <select name="account_type" id="account_type" class="form-select">
                <option value="savings">Savings</option>
                <option value="current">Current</option>
                <option value="student">Student</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Account</button>
        <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
