<main>
  <div class="font-sans">
    <div
      class=" top-0 left-0 right-0 z-[100] bg-transparent shadow-md  rounded-b-xl flex justify-between p-1   rounded-md    text-white @if(request()->is('/')) fixed @endif">
      <div class="flex  text-gradient">
        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class=" mt-3 w-6 h-6  ">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
        </svg>
        <div class="text-xl font-bold mt-2 ml-1  ">
          <a href="/">LapStore</a>
        </div>
      </div>

      <div class="flex ">

        <div class="m-2 ">
          <form action="/search" method="GET">
            <div class="flex">
              <button type="submit " class="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor"
                  class="animate-bounce w-6 h-6 mr-1 text-orange-500 font-bold transition-transform hover:scale-105 ">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
              </button>
            <input
              class=" transition-transform hover:scale-103 appearance-none relative block w-32 lg:w-48 px-3 py-1 md:py-2 border border-orange-300 placeholder-orange-600 text-orange-600 rounded-lg focus:outline-none bg-transparent focus:ring-orange-400 focus:border-orange-400 focus:z-10 sm:text-sm"
              placeholder="Type to Search products" name="search">
            
          </div>
          </form>
          <div class="hidden absolute right-16 h-36 w-32 lg:w-48 bg-white p-2 rounded-md shadow-md"
          x-show="query && products.length">
          <ul>
            <template x-for="product in products" :key="product.id">
              <li x-text="product.title"></li>
            </template>
          </ul>
        </div>
        </div>
      
        <div class="mt-3 -ml-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 text-orange-500 transition-transform hover:scale-105 hover:cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
          </svg>

        </div>
        <div class="mt-3 ml-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 text-orange-500 transition-transform hover:scale-105 hover:cursor-pointer ">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
          </svg>

        </div>
      </div>
    </div>
    
  </div>
</main>
