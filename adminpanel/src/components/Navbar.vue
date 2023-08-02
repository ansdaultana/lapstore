<script setup>
import { computed, ref } from 'vue'
import router from '../router/index.js';
import store from '../store/index.js';

const userName = computed(() => store.getters.userName);
const userToken = computed(() => store.getters.userToken);


const logout = async () => {

    try {
        const response = await store.dispatch('logout');
        console.log(response);

    } catch (error) {
        console.log(error);
    }
}
const showDropdown = ref(false);
</script>

<template>
    <div class="w-full bg-slate-100 h-16 overflow-y-hidden ">
        <div class="flex justify-between">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mt-4 ml-4 text-orange-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
            </div>
            <div class="flex ">
                <div id="userinfo"
                    class="cursor-pointer z-50 userinfo mt-2 flex bg-white rounded-full p-1 hover:bg-orange-500 hover:text-white transition duration-300 ease-in-out  ">
                    <img class="w-11 h-11 rounded-full" src="../assets/johndoe.png" alt="Bonnie Green avatar">
                    <div class="items-center justify-between flex ml-4 mr-2" v-text="userName"></div>
                    <div class="items-center justify-between flex ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>

                    </div>
                    <div
                        class="dropdown absolute hidden top-14 text-black w-40 bg-white border  transition duration-300 ease-in-out border-gray-300 rounded-md  p-2 z-40  ">

                        <div class="flex items-center hover:text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div class="py-2 px-4 cursor-pointer border-b-2 border-gray-200">Settings</div>
                        </div>

                        <div class="flex items-center hover:text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>

                            <div @click="logout" class="py-2 px-4 cursor-pointer ">Logout</div>
                        </div>
                    </div>
                </div>

                <div
                    class="flex bg-orange-500 ml-8   rounded-lg  text-white items-center mt-3 mr-2 px-1 cursor-pointer hover:bg-orange-600 h-10 transition-transform ease-in-out duration-300 hover:scale-105">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>

                    <button @click="logout" class="px-1 text-md">
                        log out
                    </button>
                </div>
            </div>

        </div>


    </div>
</template>
<style>
.userinfo:hover .dropdown {
    display: block;
    /* Show the dropdown when hovering over userinfo */
}</style>
  