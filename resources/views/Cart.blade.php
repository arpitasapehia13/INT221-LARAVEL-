<h2>Your Shopping Cart</h2>

@if(empty($cart))
    <p>Your cart is empty.</p>
    <a href="{{ route('cart.addProductForm') }}">Add More Products</a>
@else
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $totalPrice = 0; @endphp
            @foreach($cart as $item)
                @php $total = $item['price'] * $item['quantity']; @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ number_format($total, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                @php $totalPrice += $total; @endphp
            @endforeach
        </tbody>
    </table>

    <p>Total Price: ${{ number_format($totalPrice, 2) }}</p>
    <a href="{{ route('cart.addProductForm') }}">Add More Products</a>
@endif
