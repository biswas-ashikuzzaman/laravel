@extends('layouts.app')

@section('content')
<h3>Edit Category</h3>

<form action="{{ route('products.update', $category) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label class="form-label">Category Name</label>
    <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control">
    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Category</label>
    <input type="text" name="category" value="{{ old('category', $category->category) }}" class="form-control">
    @error('category') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Price ($)</label>
    <input type="number" step="0.01" name="price" value="{{ old('price', $category->price) }}" class="form-control">
    @error('price') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <button class="btn btn-warning">Update</button>
  <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
