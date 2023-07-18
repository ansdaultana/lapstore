<script setup>
    import { useRoute } from 'vue-router';
    const route = useRoute();
    </script>
<template>
    <div class="w-1/6 h-screen    bg-slate-100 text-black">
        <div class="flex  pt-6 pl-2 md:pl-4">
            <div class="rounded-md bg-orange-500 p-2">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white ">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                </svg>

            </div>

            <h1 class="text-lg lg:pl-10 p-2 text-orange-500 hidden md:block ">LapStore</h1>

        </div>
        <div >
            <router-link :to="{name: 'app.dashboard'}">

            <div id="container" class="flex  hover:bg-white rounded-md  hover:text-orange-500 mt-3">
                <div class="bg-orange py-1 w-1" :class="{'bg-orange-500':route.name==='app.dashboard'}">
                </div>
                <div class="pl-4 flex p-2">
                    <svg 
                    :class="{'text-orange-500':route.name==='app.dashboard'}"
                     fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <div class="lg:ml-8 ml-2 hidden md:block"  :class="{'text-orange-500':route.name==='app.dashboard'}">
                        DashBoard
                    </div>

                </div>
            </div>
        </router-link >
        <router-link :to="{name: 'app.products'}">

            <div  id="container" class="flex hover:bg-white rounded-md  hover:text-orange-500 mt-3">
                <div class="bg-orange py-1 w-1" :class="{'bg-orange-500':route.name==='app.products'}">

                </div>
                <div class="pl-4 flex p-2">
                    <svg 
                    
                    :class="{'text-orange-500':route.name==='app.products'}"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                    </svg>

                    <div class="lg:ml-8 ml-2 hidden md:block" :class="{'text-orange-500':route.name==='app.products'}">
                        Products
                    </div>

                </div>
            </div>
        </router-link >
        <router-link :to="{name: 'app.users'}">

            <div id="container" class="flex   hover:bg-white rounded-md hover:text-orange-500 mt-3">
                <div class="bg-orange py-1 w-1" :class="{'bg-orange-500':route.name==='app.users'}">

                </div>
                <div class="pl-4 flex p-2">
                    <svg 
                    :class="{'text-orange-500':route.name==='app.users'}"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>


                    <div class="lg:ml-8 ml-2 hidden md:block"  :class="{'text-orange-500':route.name==='app.users'}">
                        Users
                    </div>

                </div>
            </div>
        </router-link >
        <router-link :to="{name: 'app.reports'}">

            <div  id="container" class="flex  hover:bg-white rounded-md  hover:text-orange-500 mt-3">
                <div class="bg-orange py-1 w-1"  :class="{'bg-orange-500':route.name==='app.reports'}">

                </div>
                <div class="pl-4 flex p-2">
                    <svg
                    
                    :class="{'text-orange-500':route.name==='app.reports'}"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                    <div class="lg:ml-8 ml-2 hidden md:block"
                    :class="{'text-orange-500':route.name==='app.reports'}"
                    >
                        Reports
                    </div>

                </div>
            </div>
        </router-link >

        </div>
    </div>
</template>
<style>
#container:hover .bg-orange {
    background-color: rgb(255, 119, 0);
}
</style>