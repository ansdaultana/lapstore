<script setup>
import { defineProps } from 'vue';
const props=defineProps({
    title:String,
})

</script>
<template>
    <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8 ">
        <div class="bg-slate-500 sm:mx-auto sm:w-full sm:max-w-sm p-10 rounded-xl">
 
        <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
          <img class="mx-auto h-40 w-auto" src="../assets/pngwing.com (1).png" alt="Your Company" />
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">{{props.title}}</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    
       <slot/>
    </div>
        
    </div>

      </div>
    </template>