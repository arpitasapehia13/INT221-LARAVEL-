<h2>Add Product to Cart</h2>

<form action="{{ route('cart.addProduct') }}" method="POST">
    @csrf
    <label for="id">Product ID:</label>
    <input type="number" name="id" required>

    <label for="name">Product Name:</label>
    <input type="text" name="name" required>

    <label for="price">Price:</label>
    <input type="number" step="0.01" name="price" required>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" value="1" required>

    <button type="submit">Add to Cart</button>
</form>

<a href="{{ route('cart.show') }}">View Cart</a>
