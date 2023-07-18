<script setup>
import { computed,onMounted } from 'vue'
import store from '../store/index.js';

const userName = computed(() => store.getters.userName);
const userToken = computed(() => store.getters.userToken);

console.log("in Navbar:" + userName.value)
console.log("in Navbar:" +userToken.value)


</script>

<template>
    <div class="w-full bg-slate-100 h-16 ">
        <div class="flex justify-between">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mt-4 ml-4 text-orange-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>

            </div>
            <div class="flex">
                <div class="mt-2 flex">
                    <img class="w-11 h-11 rounded-full" src="../assets/johndoe.png" alt="Bonnie Green avatar">
                    <div class="items-center justify-between flex ml-4 mr-8" v-text="userName"></div>
                </div>
                <div class="flex bg-orange-500   rounded-lg  text-white items-center mt-3 mr-2 px-1 cursor-pointer hover:bg-orange-600 h-10 transition-transform ease-in-out duration-300 hover:scale-105">
                    <svg 
                     fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                      </svg>
                      
                    <button class="px-1 text-md">
                        log out
                    </button>
                </div>
            </div>
           
        </div>

    </div>
</template>