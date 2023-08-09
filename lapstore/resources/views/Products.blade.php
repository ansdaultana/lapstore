@extends('layout')
@section('content')
@include('navbar')
<main>
    <div class="flex">
        <div>

        </div>
    </div>
    <div class="flex ">
        <h1 class="mt-4 text-2xl text-black p-4 ml-8 -mb-2 "> {{$category_name}} for You!</h1>
    </div>
    <div class="h-full flex">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-10 gap-y-6 mt-8 mb-10 mx-auto">
            @foreach($products as $product)
            <div class="slider-item">
                @include('product-container',['product'=>$product])
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
