@extends('layout')
@section('content')
@include('navbar')
<main>
    <div class="mt-4 justify-between ml-10 mr-10 flex ">
        <div class=" flex">
            <div>
                @include('button-for-product-page',['filter'=>'Categories'])

            </div>
            <div class="ml-6">
                @include('button-for-product-page',['filter'=>'Price'])

            </div>

        </div>
        <div class="flex">
            @include('button-for-product-page',['filter'=>'Sort By'])

        </div>
    </div>
    <div class="flex ">
        <h1 class="text-2xl text-black p-4 ml-8 -mb-2 "> {{$category_name}} for
            You!</h1>
    </div>
    <div class="h-full flex">
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-10 gap-y-6 mt-8 mb-10 mx-auto">
            @foreach($products as $product)
            <div class="slider-item">
                @include('product-container',['product'=>$product])
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
