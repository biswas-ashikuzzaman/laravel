@extends('admin.maindesign')
@section('view_category')
<div class="container mt-4">
    <h4 class="mb-3">View Categories</h4>

    <div class="card shadow-sm rounded-3">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width:100px;">Category ID</th>
                        <th>Category Name</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <!-- Dynamic Example for Blade -->
                    
                    @foreach($categories as $category)
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 12px;">{{ $category->id }}</td>
                            <td>{{ $category->category }}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
