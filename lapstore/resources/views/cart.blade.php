@foreach(session('cart', []) as $item)
    <p>{{ $item['title'] }} - ${{ $item['price'] }} - Quantity: {{ $item['quantity'] }}</p>
@endforeach