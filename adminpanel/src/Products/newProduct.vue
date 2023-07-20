<script setup>

import AppLayout from '../Layouts/AppLayout.vue'

</script>
<template>
    <AppLayout>
        <div>
            <div class="m-2">
                Add Product
            </div>
            <div class=" ml-2 mr-2 border-2 border-gray-200 h-[500px">
                <div class="w-auto divide-x-2 flex  ">
                    <div class="w-1/3">
                        <div
                            class="m-2 md:ml-10 mt-5 py-5 md:px-12 md:py-24 md:w-60 items-center flex justify-center border-2 border-dashed border-orange-300">
                            <div class="flex-col items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="ml-5 text-orange-300 w-24 h-24 md:-mt-10">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="text-orange-500 m-2 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <p class="inline-block text-xs">Drag & Drop Your photo.or <span
                                            class="text-orange-500 cursor-pointer">Browse</span></p>
                                    <input id="" type="file" class="hidden">
                                </div>


                            </div>


                        </div>
                        <div name="pics " class="">
                           
                            <div class="mt-2 ">
                                <div class="border-dashed border-2 h-20  m-1 bg-slate-100  flex justify-between"> 
                                    <div class="flex">
                                        <div class="md:w-24 w-14 m-2  items-center flex">
                                            <img src="https://www.tejar.pk/media/catalog/product/cache/3/image/9df78eab33525d08d6e5fb8d27136e95/m/i/microsoft_surface_laptop_4_-_intel_core_i5_512gb_8gb_-_13.5_inch_-_matte_black_-_1tejar_2.jpg" alt="">
    
                                        </div>
                                        <div class="m-2 md:block hidden">
                                            Screenshot (46)
                                        </div>
    
                                    </div>
                                   <div class=" flex items-center justify-center md:m-2 text-red-500 hover:text-red-700 rounded-full hover:bg-white px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                      </svg>
                                      
                                   </div>
                                </div>
                                <div class="border-dashed border-2 h-20  m-1 bg-slate-100  flex justify-between"> 
                                    <div class="flex">
                                        <div class="md:w-24 w-14 m-2  items-center flex">
                                            <img src="https://cdn.thewirecutter.com/wp-content/media/2022/10/laptopstopicpage-2048px-2102-3x2-1.jpg?auto=webp&quality=75&crop=3:2&width=1024" alt="">

                                        </div>
                                        <div class="m-2 md:block hidden">
                                            Screenshot (46)
                                        </div>
    
                                    </div>
                                   <div class=" flex items-center justify-center md:m-2 text-red-500 hover:text-red-700 rounded-full hover:bg-white px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                      </svg>
                                      
                                   </div>
                                </div>
                              
                                <div class="border-dashed border-2 h-20  m-1 bg-slate-100  flex justify-between"> 
                                    <div class="flex">
                                        <div class="md:w-24 w-14 m-2  items-center flex">
                                            <img src="https://www.tejar.pk/media/catalog/product/cache/3/image/9df78eab33525d08d6e5fb8d27136e95/m/i/microsoft_surface_laptop_4_-_intel_core_i5_512gb_8gb_-_13.5_inch_-_matte_black_-_1tejar_2.jpg" alt="">
    
                                        </div>
                                        <div class="m-2 md:block hidden">
                                            Screenshot (46)
                                        </div>
    
                                    </div>
                                   <div class=" flex items-center justify-center md:m-2 text-red-500 hover:text-red-700 rounded-full hover:bg-white px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                      </svg>
                                      
                                   </div>
                                </div>
                                <div class="border-dashed border-2 h-20  m-1 bg-slate-100  flex justify-between"> 
                                    <div class="flex">
                                        <div class="md:w-24 w-14 m-2  items-center flex">
                                            <img src="https://cdn.thewirecutter.com/wp-content/media/2022/10/laptopstopicpage-2048px-2102-3x2-1.jpg?auto=webp&quality=75&crop=3:2&width=1024" alt="">

                                        </div>
                                        <div class="m-2 md:block hidden">
                                            Screenshot (46)
                                        </div>
    
                                    </div>
                                   <div class=" flex items-center justify-center md:m-2 text-red-500 hover:text-red-700 rounded-full hover:bg-white px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                      </svg>
                                      
                                   </div>
                                </div>
                              
                    
                                
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2">
                        das
                    </div>
                </div>

            </div>
        </div>

    </AppLayout>
</template>