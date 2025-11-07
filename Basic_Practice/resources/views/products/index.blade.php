@foreach($products as $product)
    <div>
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->price }}</p>
        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        <form method="POST" action="{{ route('products.destroy', $product->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
