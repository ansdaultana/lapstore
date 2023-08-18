@extends('layout')
@include('navbar')
<main class="">
    <div class="ml-5 md:ml-20 ">
        <div class=" text-2xl p-2 font-sans">
            Your favourite items!
        </div>
        <div class=" p-2">
            You have <span class="text-orange-600 font-bold text-lg">
                {{count(session('favourite',[]))}}
            </span>
            favourite items.
        </div>
    </div>

    <div class="flex items-center justify-center  "
        x-data="{quantities: {{ json_encode(session('favourite', [])) }}}">
        <div class="h-auto p-4 mt-4 bg-slate-200 w-[95%] md:w-[60%] rounded-lg">
            @foreach($products as $product)
            <a href="/product/{{$product->slug}}">
                <div
                    class="bg-slate-50 rounded-lg  p-2 flex m-2 transition-transform hover:scale-102 duration-300 ease-in-out"
                    x-data="{quantity:1}">
                    <div class="flex items-center justify-center">
                        @if($product->images)
                        <div class=" ml-4 ">
                            <img class=" w-24 rounded-lg "
                                src="{{$product->images[0]->image_url}}">
                        </div>
                        @endif
                    </div>
                    <div
                        class="flex items-center   m-1 justify-center text-sm p-2 md:m-8 w-16 md:w-44">
                        <span>{{$product->title}}</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <div
                            class="shadow-orange-100 flex items-center bg-slate-200 p-2  h-10 rounded-2xl transition-transform hover:scale-103 duration-300 shadow-sm ease-in-out">
                            <button x-on:click="if(quantity>1) quantity-=1"
                                class="bg-blue-400 font-bold text-white md:px-2 md:py-1 rounded-lg">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-5">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19.5 12h-15" />
                                </svg>

                            </button>
                            <div
                                x-text="quantity"
                                class="p-1 md:py-2  animate-pulse md:px-4 text-orange-600 text-lg md:text-2xl font-bold animate-"></div>
                            <button
                                class="bg-blue-400 font-bold text-white md:px-2 md:py-1  rounded-lg"
                                x-on:click="if(quantity < {{$product->quantity}} ) quantity+=1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-5">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-center text-sm p-2 m-1 md:m-8 w-16 md:w-44">
                        <span>Rs: </span>
                        <span class="ml-1 "
                            x-text="{{$product->price}} *   quantity"></span>
                    </div>
                    <div class="flex items-center justify-center ">
                        <form action="/favourite/addremove/{{$product->slug}}" method="post">
                            @csrf
                        <button type="submit"
                            class="block md:hidden bg-red-500 md:p-2 p-1  h-8 md:h-10 rounded-lg transition-transform hover:scale-103 ease-in-out duration-300 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 text-white">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>

                        </button>
                        <button type="submit"
                            class="hidden md:block text-red-500 text-sm p-2  h-10 rounded-lg transition-transform hover:scale-103 ease-in-out duration-300 cursor-pointer">
                            <span>Remove the item</span>
                        </button>
                        </form>
                    </div>
                </div>
            </a>
            @endforeach
        </div></div>
        <div class="h-36"></div>
</main>
@include('footer')
