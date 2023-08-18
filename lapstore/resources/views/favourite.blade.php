favourite
@foreach(session('favourite', []) as $item)
    <p>{{ $item['product_slug'] }}</p>
@endforeach