
<script setup>
import AppLayout from '../Layouts/AppLayout.vue'
const products = [
  {
    ID: 1,
    title: 'Dell Precision 5520',
    price: '10400',
    imageUrl:
      'https://cdn.mos.cms.futurecdn.net/xq9imgnBPQw7TWPz9JnakA.jpg',
    lastUpdatedDateTime: '2023-01-23T13:23Z',
  }, {
    ID: 2,
    title: 'Dell Precision 5520',
    price: '10400',
    imageUrl:
      'https://cdn.mos.cms.futurecdn.net/xq9imgnBPQw7TWPz9JnakA.jpg',
    lastUpdatedDateTime: '2023-01-23T13:23Z',
  },
  {
    ID: 3,
    title: 'Dell Precision 5520',
    price: '10400',
    imageUrl:
      'https://cdn.thewirecutter.com/wp-content/media/2023/06/laptops-2048px-5607.jpg?auto=webp&quality=75&crop=1.91:1&width=1200',
    lastUpdatedDateTime: '2023-01-23T13:23Z',
  }, {
    ID: 3,
    title: 'Dell Precision 5520',
    price: '10400',
    imageUrl:
      'https://cdn.mos.cms.futurecdn.net/xq9imgnBPQw7TWPz9JnakA.jpg',
    lastUpdatedDateTime: '2023-01-23T13:23Z',
  }, {
    ID: 3,
    title: 'Dell Precision 5520',
    price: '10400',
    imageUrl:
      'https://cdn.mos.cms.futurecdn.net/xq9imgnBPQw7TWPz9JnakA.jpg',
    lastUpdatedDateTime: '2023-01-23T13:23Z',
  }, {
    ID: 3,
    title: 'Dell Precision 5520',
    price: '10400',
    imageUrl:
      'https://cdn.mos.cms.futurecdn.net/xq9imgnBPQw7TWPz9JnakA.jpg',
    lastUpdatedDateTime: '2023-01-23T13:23Z',
  }, {
    ID: 3,
    title: 'Dell Precision 5520',
    price: '10400',
    imageUrl:
      'https://cdn.mos.cms.futurecdn.net/xq9imgnBPQw7TWPz9JnakA.jpg',
    lastUpdatedDateTime: '2023-01-23T13:23Z',
  }, {
    ID: 3,
    title: 'Dell Precision 5520',
    price: '10400',
    imageUrl:
      'https://cdn.mos.cms.futurecdn.net/xq9imgnBPQw7TWPz9JnakA.jpg',
    lastUpdatedDateTime: '2023-01-23T13:23Z',
  },
  {
    ID: 4,
    title: 'Dell Precision 5520',
    price: '10400',
    imageUrl:
      'https://cdn.mos.cms.futurecdn.net/xq9imgnBPQw7TWPz9JnakA.jpg',
    lastUpdatedDateTime: '2023-01-23T13:23Z',
  },
  {
    ID: 5,
    title: 'Dell Precision 5520',
    price: '10400',
    imageUrl:
      'https://cdn.mos.cms.futurecdn.net/xq9imgnBPQw7TWPz9JnakA.jpg',
    lastUpdatedDateTime: '2023-01-23T13:23Z',
  },
]
</script>
<template>
  <AppLayout>
    <div class="relative ">

      <div class=" flex justify-between ">
        <div class="text-orange-500 text-lg mt-2  ml-5 hover:text-orange-600 ">
          Products
        </div>
        <div
          class="
          md:w-36 w-14 bg-orange-500 hover:bg-orange-600 transition-transform hover:scale-105 text-white px-2 rounded-lg py-1 m-2 ml-2 flex ">
          <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="  transition-transform hover:rotate-90 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>

          <button class="hidden md:block">
            New Product
          </button>
        </div>
      </div>

      <div name="panel" class=" mt-1 bg-orange-50 absolute lg:left-60 rounded-lg border-orange-300 w-auto  border-2 ">

        <div class=" p-2  ">
          <div class="flex justify-between  pb-3">
            <div class="flex items-center ">
              <span class="whitespace-nowrap mr-3 text-orange-500">Per Page</span>
              <select @change="getProducts(null)" v-model="perPage"
                class="appearance-none relative block w-24 px-3 py-2 border border-orange-300 placeholder-orange-500 text-orange-900 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
              <!-- <span class="ml-3 hidden md:block">Found {{ products.total }} products</span> -->
            </div>
            <div>
              <input v-model="search" @change="getProducts(null)"
                class="appearance-none relative block w-32 lg:w-48 px-3 py-2 border border-orange-300 placeholder-orange-500 text-gray-900 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500 focus:z-10 sm:text-sm"
                placeholder="Type to Search products">
            </div>
          </div>



          <div class="flex bg-orange-500 p-2 border-2  rounded-lg justify-between text-white">
            <div class=" ml-5 w-20 hidden md:block">
              ID
            </div>
            <div class="w-24">
              Image
            </div>
            <div class="w-16 md:w-44">
              Title
            </div>
            <div class="w-36 hidden md:block">
              Price
            </div>
            <div class="w-40 hidden lg:block">
              Last updated At
            </div>
            <div class="w-20">
              Actions
            </div>
          </div>
        </div>

        <ul role="list" class="divide-y divide-orange-300 ml-5 mr-5 overflow-y-scroll overflow-x-hidden h-[500px] scrollbar text-orange-600">
          <li v-for="product in products" :key="product.ID" class="cursor-pointer flex justify-between gap-x-6 py-5 transition-transform hover:scale-105 ease-in-out duration-300 hover:text-orange-700">
            <div class="flex justify-between items-center">
              <div class=" ml-8 w-20   hidden md:block">
                {{ product.ID }}
              </div>
              <div class="w-24 ">
                <div class=" w-16  ">
                  <img :src="product.imageUrl" alt="" class="rounded-lg">

                </div>
              </div>
              <div class=":w-16 md:w-44">
                {{ product.title }}

              </div>
              <div class="w-36 hidden md:block pl-5">
                {{ product.price }}

              </div>
              <div class="w-40 hidden lg:block">
                {{ product.lastUpdatedDateTime }}

              </div>
              <div class="w-20 text-black hover:text-orange-500 justify-between  flex mr-8 ml-2 gap-3">
                <div class="bg-[#20D0FF] p-2 rounded-lg transition-transform hover:scale-105 ease-in-out duration-300 cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                </div>
                <div class="bg-red-500 p-2 rounded-lg transition-transform hover:scale-105 ease-in-out duration-300 cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                  
                </div>
              

              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>

  </AppLayout>
</template>
<style>

/* Hide the scroll bar */
.scrollbar::-webkit-scrollbar {
    width: 0.4em;
    background-color: transparent;
}




/* Optional: Add a custom color for the thumb */
.scrollbar::-webkit-scrollbar-thumb {
    background-color: orange;
}

/* Optional: Add hover styles for the thumb */
.scrollbar::-webkit-scrollbar-thumb:hover {
    background-color: orangered;
}
</style>