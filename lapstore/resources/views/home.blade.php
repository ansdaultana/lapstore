@extends('layout')

@section('content')
@include('navbar')
@include('slidder')

<main>

  <div>
    <div class="flex justify-center items-center text-white text-xl p-2">
      <h3 class="p-10">
        Promos
      </h3>
    </div>
    <div class="flex justify-center items-center text-white text-sm md:text-xl p-2">

      <div class="relative">
        
        <button
          class="text-gray-400 p-2 hover:bg-gray-700 hover:text-white rounded-lg">
          <h3>Recommendation</h3>
          <!-- <div class="bg-gray-600 p-0.5 mt-2 rounded-lg"></div> -->
        </button>
        <button
          class="text-gray-400 p-2 hover:bg-gray-700 hover:text-white rounded-lg">
          <h3>Laptop</h3>
          <!-- <div class="bg-gray-600 p-0.5 mt-2 rounded-lg"></div> -->
        </button> 
        <button
          class="text-gray-400 p-2 hover:bg-gray-700 hover:text-white rounded-lg">
          <h3>Accessories</h3>
          <!-- <div class="bg-gray-600  p-0.5 mt-2 rounded-lg"></div> -->
        </button>
         <button
          class="text-gray-400 p-2 hover:bg-gray-700 hover:text-white rounded-lg">
          <h3>Others</h3>
          <!-- <div class="bg-gray-600 p-0.5 mt-2 rounded-lg"></div> -->
        </button>
        <div class="absolute bottom-0.5 left-0 right-0 h-0.5 bg-gray-600 transform translate-y-2 "></div>
      </div>

    </div>

  
    <div class="flex justify-center space-x-4 mt-8">
      <!-- Card 1 -->
      <div class="bg-gray-600 rounded-lg p-4 shadow-md">
        <img src="image_url" alt="Category Image" class="w-full h-32 object-cover rounded-md">
        <h4 class="mt-2 text-lg font-semibold">Category Title</h4>
        <p class="mt-1 text-gray-600">Prize: $100</p>
        <div class="mt-4 flex space-x-2">
          <button class="bg-gray-700 text-white px-3 py-1 rounded-md hover:bg-gray-800">Button 1</button>
          <button class="bg-gray-700 text-white px-3 py-1 rounded-md hover:bg-gray-800">Button 2</button>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="bg-white rounded-lg p-4 shadow-md">
        <!-- Card content here -->
      </div>

      <!-- Card 3 -->
      <div class="bg-white rounded-lg p-4 shadow-md">
        <!-- Card content here -->
      </div>
    </div>
  </div>
</main>
  @endsection
