<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Product List</h2>
<a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add Product</a>

@if ($message = Session::get('success'))
    <div class="alert alert-success">{{ $message }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th><th>Name</th><th>Price</th><th>Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST" style="display:inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
