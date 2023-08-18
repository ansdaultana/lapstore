cart 
@foreach(session('cart', []) as $item)
    <p>{{ $item['product_slug'] }}  - Quantity: {{ $item['quantity'] }}</p>
@endforeach