<form method="POST" action="{{ route('products.update', $product->id) }}">
    @csrf
    @method('PUT')
    <input name="name" value="{{ $product->name }}">
    <input name="price" value="{{ $product->price }}">
    <textarea name="description">{{ $product->description }}</textarea>
    <button type="submit">Update</button>
</form>
