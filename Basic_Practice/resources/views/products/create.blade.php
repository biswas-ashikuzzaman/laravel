<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <input name="name" placeholder="Name">
    <input name="price" placeholder="Price">
    <textarea name="description"></textarea>
    <button type="submit">Save</button>
</form>
