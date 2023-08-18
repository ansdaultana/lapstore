favourite
@foreach(session('favourite', []) as $item)
    <p>{{ $item }}</p>
@endforeach