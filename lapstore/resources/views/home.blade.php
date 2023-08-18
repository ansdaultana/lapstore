@extends('layout')

@section('content')
@include('navbar')
@include('slidder')

<main>

  <div class>

    @include('heading',['headingtext'=>'Categories'])
    @include('categories')

    @include('heading',['headingtext'=>'Promos'])

    <!-- <div
      class="flex justify-center items-center text-white text-sm md:text-xl p-2">

      <div class="relative"
      x-data="{selected:''}">
      <a href="/products/category=Recommendation">

        <button
        @click="{selected='Recommendation'}"
          class="text-gray-600 p-2 hover:bg-gray-700 hover:text-white rounded-lg transition-transform hover:scale-103">
          <h3>Recommendation</h3>
        </button>
      </a>
        <a href="/products/category=Laptop"></a>

        <button
        @click="{selected='Laptop'}"
          class="text-gray-600 p-2 hover:bg-gray-700 hover:text-white rounded-lg transition-transform hover:scale-103">
          <h3>Laptop</h3>
        </button>
      </a>
        <a href="/products/category=Accessories">

        <button
        @click="{selected='Accessories'}"
          class="text-gray-600 p-2 hover:bg-gray-700 hover:text-white rounded-lg transition-transform hover:scale-103">
          <h3>Accessories</h3>
        </button>
      </a>
        <a href="/products/category=Others">
        <button
        @click="{selected='Others'}"
          class="text-gray-600 p-2 hover:bg-gray-700 hover:text-white rounded-lg transition-transform hover:scale-103">
          <h3>Others</h3>
        </button>
      </a>
        <div
          class="absolute bottom-0.5 left-0 right-0 h-0.5 bg-gray-600 transform translate-y-2  transition-transform hover:scale-103"></div>
      </div>

    </div> -->

    @include('recomended-products')
    @include('footer')

  </div>
</main>
@endsection
