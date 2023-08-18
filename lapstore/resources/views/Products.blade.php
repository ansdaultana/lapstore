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
            <a href="{{ route('products.category', ['slug' => $category_name, 'search' => request('search')]) }}">

            <div
                class="bg-orange-400 text-white  rounded-full  p-1 transition-transform hover:scale-103 hover:cursor-pointer flex items-center justify-center ml-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>

            </div>
        </a>
     </div>
    </div>
    <div class="flex ">
        <h1 class="text-2xl text-black p-4 ml-8 -mb-2 "> {{$category_name}} for
            You!</h1>
    </div>
    <div class="h-full flex">
        <div
            class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-10 gap-y-6 mt-8 mb-10 mx-auto">
            @foreach($products as $product)
            <div class="slider-item">
                @include('product-container',['product'=>$product])
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
