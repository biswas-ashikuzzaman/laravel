@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Category</h2>
  <a href="{{ route('products.create') }}" class="btn btn-primary">Add New</a>
</div>

<div class="card">
  <div class="card-body">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Category</th>
          <th>Price ($)</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->category }}</td>
            <td>{{ number_format($category->price, 2) }}</td>
            <td>
              <a href="{{ route('products.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>

              <form action="{{ route('products.destroy', $category) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center">No category found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="mt-3">
      {{ $category->links('pagination::bootstrap-5') }}
    </div>
  </div>
</div>
@endsection
