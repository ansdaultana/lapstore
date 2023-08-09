@extends('layout')
@include('navbar')

<main x-data="{ selectedImage: '{{ $product->images[0]->image_url }}' }">
        <div class="flex">
            <div class="w-1/2 h-full justify-center items-center flex">
                <div class="w-full">
                    <div class="p-8 rounded-2xl mt-6 hover:cursor-pointer transition-transform hover:scale-103 ease-in-out duration-300  shadow-sm bg-gradient-to-bl from-orange-100 via-orange-50 to-slate-100 shadow-green-200">
                        <img class="rounded-2xl md:w-96" x-bind:src="selectedImage" alt>
                    </div>
                    <div class="mt-2 flex space-x-4">
                        @foreach($product->images as $image)
                        <div x-on:click="selectedImage = '{{ $image->image_url }}'"
                            class="bg-slate-200 rounded-2xl md:h-24 hover:cursor-pointer transition-transform hover:scale-103 ease-in-out duration-200">
                            <img src="{{$image->image_url}}" class="h-14 md:h-24 rounded-2xl p-2" alt>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        <div class="w-1/2 h-full ">
            <div class="mt-8  p-2 md:pl-8 flex">
                <h1 class="text-2xl font-bold ">{{$product->title}}</h1>
                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-red-400 hover:fill-red-600 w-6 h-6 m-1 ml-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                  </svg> -->
            </div>
            <div class=" pl-4 md:px-8 md:py-2 flex">
                <h1 class="text-md">{{$product->description}}</h1>
            </div>
            <div class="bg-green    -300 w-auto ml-2 md:ml-10 md:mr-20 h-0.5 "></div>

            <div class="p-2  md:p-8 flex">

                <h1 class="text-xl ml-2 font-bold">Rs: {{$product->price}} /-
                    <span class="text-orange-600">Only</span></h1>
            </div>
            <div class="bg-green-300 w-auto ml-2 md:ml-10 md:mr-20 h-0.5 "></div>
            <div class="mt-2 p-2 md:p-8 flex flex-row">
                <div
                    class="shadow-orange-100 text-lg flex items-center  bg-slate-100 py-1 px-4 rounded-2xl transition-transform hover:scale-103 duration-300 shadow-md ease-in-out">
                    <button>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 12h-15" />
                        </svg>

                    </button>
                    <div class="p-1 md:py-2 md:px-4 text-orange-600 text-2xl font-bold animate-">1</div>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.5v15m7.5-7.5h-15" />
                        </svg></button>
                </div>
                <div class="flex flex-col  ml-8">
                    <div class="md:text-lg mt-1 ">Only <span
                            class="font-bold text-orange-600 animate-pulse md:text-2xl">{{$product->quantity}}</span>
                        Left!</div>
                    <div class="hidden md:block">Don't Miss</div>
                </div>
            </div>

            <div class="md:px-4 md:py-2 mb-2 py-4 flex space-x-3 md:space-x-6">
                <div>
                    <button
                        class="shadow-green-100 bg-gradient-to-r from-green-400 via-green-600 to-green-700 w-auto text-white  py-4 px-5 md:px-12 md:py-4 rounded-full transition-transform hover:scale-105 duration-300 shadow-xl border-green-900 border ease-in-out">

                        <span class=" text-xs md:text-lg">Buy Now</span>

                    </button>
                </div>
                <div>
                    <button
                        class="shadow-green-100 font-bold w-auto border-green-700 border-2  text-green-700 p-4 md:px-12 md:py-4 rounded-full transition-transform hover:scale-105 duration-300 shadow-md ease-in-out">
                        <span class=" text-xs md:text-lg">Add to Cart</span>
                    </button>

                </div>
            </div>
            <div class="bg-green-300 w-auto ml-2 md:ml-10 md:mr-20 h-0.5 "></div>
            <div
                class="border rounded-lg border-green-300  ml-2 m-4 md:w-96 space-y-2 border-separate ">
                <div class="flex">
                    <div class="p-3">
                        <svg id="footer" class="animate-bounce" xmlns="http://www.w3.org/2000/svg" height="2em"
                            viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path
                                d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z" /></svg>

                    </div>
                    <div class="p-2"> <div class="font-body">Fast Delivery</div>
                        <span
                            class="text-xs underline hidden md:block">You will recieve the
                            package in 3 to
                            4 business days</span></div>
                </div>
                <div class="flex border-t">
                    <div class="p-3">
                        <svg id="footer"  xmlns="http://www.w3.org/2000/svg" height="2em"
                            viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path
                                d="M280 64h40c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64h40 9.6C121 27.5 153.3 0 192 0s71 27.5 78.4 64H280zM64 112c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320c8.8 0 16-7.2 16-16V128c0-8.8-7.2-16-16-16H304v24c0 13.3-10.7 24-24 24H192 104c-13.3 0-24-10.7-24-24V112H64zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" /></svg>

                    </div>
                    <div class="py-2 px-4 "> <div class="font-body textxs">Return
                            Delivery</div> <span
                            class="text-xs underline hidden md:block">Free 30 days Return
                            Policy.</span></div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('footer')