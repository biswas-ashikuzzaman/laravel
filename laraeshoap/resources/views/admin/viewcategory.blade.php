@extends('admin.maindesign')

@section('view_category')
    @if (session('deletecategory_message'))
        <div class="alert alert-danger mt-3">
            {{ session('deletecategory_message') }}
        </div>
    @endif

    <div class="container mt-4">
        <h4 class="mb-3">View Categories</h4>

        <div class="card shadow-sm rounded-3">
            <div class="card-body">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 120px;">Category ID</th>
                            <th>Category Name</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="py-2">{{ $category->id }}</td>
                                <td class="py-2">{{ $category->category }}</td>
                                <td class="py-2">
                                    <a href="{{ route('admin.deleteCategory', $category->id) }}" 
                                       class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('Are You Sure To deleteCategory?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
