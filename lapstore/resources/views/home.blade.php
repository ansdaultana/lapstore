@extends('layout')

@section('content')
@include('navbar')
@include('slidder')

<main>

  <div class="">
    <div class="flex justify-center items-center text-white text-3xl p-2 ">
      <h3 class="p-10 transition-transform hover:scale-103">
        Promos
      </h3>
    </div>
    <div class="flex justify-center items-center text-white text-sm md:text-xl p-2">

      <div class="relative">
        
        <button
          class="text-gray-400 p-2 hover:bg-gray-700 hover:text-white rounded-lg transition-transform hover:scale-103">
          <h3>Recommendation</h3>
          <!-- <div class="bg-gray-600 p-0.5 mt-2 rounded-lg"></div> -->
        </button>
        <button
          class="text-gray-400 p-2 hover:bg-gray-700 hover:text-white rounded-lg transition-transform hover:scale-103">
          <h3>Laptop</h3>
          <!-- <div class="bg-gray-600 p-0.5 mt-2 rounded-lg"></div> -->
        </button> 
        <button
          class="text-gray-400 p-2 hover:bg-gray-700 hover:text-white rounded-lg transition-transform hover:scale-103">
          <h3>Accessories</h3>
          <!-- <div class="bg-gray-600  p-0.5 mt-2 rounded-lg"></div> -->
        </button>
         <button
          class="text-gray-400 p-2 hover:bg-gray-700 hover:text-white rounded-lg transition-transform hover:scale-103">
          <h3>Others</h3>
          <!-- <div class="bg-gray-600 p-0.5 mt-2 rounded-lg"></div> -->
        </button>
        <div class="absolute bottom-0.5 left-0 right-0 h-0.5 bg-gray-600 transform translate-y-2  transition-transform hover:scale-103"></div>
      </div>

    </div>

  
   @include('recomended-products')

   <div class="bg-slate-200 h-[400px]">

   </div>
  </div>
</main>
  @endsection
