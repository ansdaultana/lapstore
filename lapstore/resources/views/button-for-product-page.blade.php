<div class="filter relative">

    <button
        class="filter justify-between md:w-28 shadow-lg flex rounded-full bg-orange-400 hover:bg-orange-500 transition-transform hover:scale-105 ease-in-out duration-200 px-2 py-1 text-white">
        <span>
            {{$filter}}
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-5 ml-1 h-6 ">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>

    </button>

    <div class=" items-center h-auto shadow-lg  hidden  dropdown  z-20  p-2 bg-slate-100 rounded-lg">
        @if($filter==='Categories')
        <ul class=" space-y-2">
            <li class="p-1  hover:text-orange-700 border-gray-300 border-b-2 transition-transform hover:scale-103 ease-in-out duration-200">
                <a href="/products/Laptop">Laptop</li></a>
            <li class="p-1  hover:text-orange-700 border-gray-300 border-b-2 transition-transform hover:scale-103 ease-in-out duration-200">
                <a href="/products/Accessories">Accessories</li></a>
                </li>
            <li class="p-1 hover:text-orange-700 transition-transform hover:scale-103 ease-in-out duration-200">
                <a href="/products/Others"> Others</li></a>
              
               </li>
               <li class="p-1 hover:text-orange-700 transition-transform hover:scale-103 ease-in-out duration-200">
                <a href="/products/All"> All</li></a>
              
               </li>
        </ul>
        @endif
        @if($filter==='Price')
        <ul class="">
            <li class="p-1 hover:text-orange-700 border-gray-300 border-b-2 transition-transform hover:scale-103 ease-in-out duration-200">
                <a href="{{route('products.category',['slug'=>$category_name,'min_price'=>0,'max_price'=>1000,'sort' => request('sort')])}}">0 &lt; 1000 </a></li>
            <li class="p-1 hover:text-orange-700 border-gray-300 border-b-2 transition-transform hover:scale-103 ease-in-out duration-200">
                <a href="{{route('products.category',['slug'=>$category_name,'min_price'=>1000,'max_price'=>2000,'sort' => request('sort')])}}">1000&lt; 2000 </a></li>
                 </li>
            <li class="p-1 hover:text-orange-700 border-gray-300 border-b-2 transition-transform hover:scale-103 ease-in-out duration-200">
                <a href="{{route('products.category',['slug'=>$category_name,'min_price'=>2000,'max_price'=>3000,'sort' => request('sort')])}}">2000 &lt; 3000 </a></li>
                 </li>
            <li class="p-1 hover:text-orange-700 transition-transform hover:scale-103 ease-in-out duration-200">
                <a href="{{route('products.category',['slug'=>$category_name,'min_price'=>3000,'sort' => request('sort')])}}"> &gt; 3000</a></li>
                 </li>
        </ul>
        @endif
        @if($filter==='Sort By')
        <ul >
            <li class="p-1 hover:text-orange-700 border-gray-300 border-b-2 transition-transform hover:scale-103 ease-in-out duration-200"> 
                
               <a href="{{route('products.category',['slug'=>$category_name,'sort'=>'latest', 'min_price' => request('min_price'), 'max_price' => request('max_price')])}}"> Latest</a></li>
            <li class="p-1 hover:text-orange-700 transition-transform hover:scale-103 ease-in-out duration-200">
               <a href="{{route('products.category',['slug'=>$category_name,'sort'=>'oldest', 'min_price' => request('min_price'), 'max_price' => request('max_price')])}}"> Oldest</a> </li>

        </ul>
        @endif
    </div>
</div>

<style>
    .filter:hover .dropdown{
        display: block;
    }
    .filter .dropdown {
        display: none; /* Hide the dropdown by default */
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        z-index: 10;
    }

</style>