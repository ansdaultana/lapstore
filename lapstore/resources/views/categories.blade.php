

<div
    class="flex flex-col  md:flex-row justify-center items-center space-x-3 md:space-x-10 mt-8 mb-10">
    @foreach($categories as $category)
    <a href="/products/{{$category->name}}">
    <div
        class="w-56 md:w-56 bg-gradient-to-r from-orange-400 via-orange-600 to-red-600 rounded-xl px-4 py-7 shadow-lg shadow-orange-200 mb-4 transition-transform hover:scale-105 duration-300 ease-in-out hover:cursor-pointer">

        <div class="flex items-center justify-center">
            <h4 class="mt-2 text-lg text-white  ">{{$category->name}}</h4>
        </div>
        <div class="flex items-center justify-center">
            @if($category->name==='Laptop')
            <img
                src="https://res.cloudinary.com/ddrivhxfq/image/upload/f_auto,q_auto/dpmw0xppkrqgmamjikkg"
                alt="Category Image"
                class="h-32 md:h-44 w-auto object-cover rounded-md animate-bounce">
            @elseif($category->name==='Others')
            <img
                src="https://res.cloudinary.com/ddrivhxfq/image/upload/f_auto,q_auto/aunulkog350kflwalfsr"
                alt="Category Image"
                class="h-32 md:h-44 w-auto object-cover rounded-md animate-bounce">
            @elseif($category->name==='Accessories')
            <img
                src="https://res.cloudinary.com/ddrivhxfq/image/upload/f_auto,q_auto/hd6wdtl82kxfbjqmqq9d"
                alt="Category Image"
                class="h-24 md:h-44 w-auto object-cover rounded-md .
                animate-bounce duration-600">

            @endif
        </div>
    </div>
</a>
    @endforeach

</div>
<style>
    
    @keyframes bounce {
  0%, 100% {
    transform: translateY(-8%);
    animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
  }
  50% {
    transform: translateY(0);
    animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
  }
}

</style>