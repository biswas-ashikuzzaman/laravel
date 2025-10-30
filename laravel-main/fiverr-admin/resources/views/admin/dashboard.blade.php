@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Welcome to Fiverr Admin Panel</h2>
    <p>Manage users, gigs, and system settings from here.</p>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card p-3">
                <h5>Total Users</h5>
                <p>123</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h5>Total Gigs</h5>
                <p>87</p>
            </div>
        </div>
    </div>
</div>
@endsection
