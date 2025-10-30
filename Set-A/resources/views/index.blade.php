@extends('layouts.app')

@section('content')
    <h1>Owners and Cars</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Owner Name</th>
                <th>Email</th>
                <th>Car Name</th>
                <th>Car Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($owners as $owner)
                <tr>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->email }}</td>
                    <td>{{ $owner->car->name ?? '—' }}</td>
                    <td>{{ $owner->car->details ?? '—' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
