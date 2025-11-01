@extends('admin.maindesign')

@section('add_category')
    @if(session('category_message'))
        <div class="alert alert-success mt-3">
            {{ session('category_message') }}
        </div>
    @endif

    <div class="container mt-4">
        <form action="{{ route('admin.postaddcategory') }}" method="post" class="p-4 border rounded bg-light shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="category" class="form-label">Category Name</label>
                <input type="text" id="category" name="category" class="form-control" placeholder="Enter Category Name!">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>
@endsection
