@extends('admin.maindesign')

@section('add_category')
    @if(session('category_message'))
        <div class="alert alert-success mt-3">
            {{ session('category_message') }}
        </div>
    @endif

    <div class="container mt-4">
<form action="{{route('admin.postaddproduct')}}" method="post">
    @csrf
    <input type="text" name="product_title" placeholder="Enter Product Title"/>
    <textarea name="product_description" placeholder="Product Descriptions!"></textarea>
    <input type="number" name="product_quantity" placeholder="Enter Product quantity here"/>
    <input type="number" name="product_price" placeholder="Enter Product Price here"/>
    <input type="text" name="product_category" placeholder="Enter Category Name"/>
    <input type="submit" name="submit" value="Add Product"/>
</form>

</div>
@endsection