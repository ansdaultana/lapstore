<template>
    <nav class="pagination flex justify-center mt-4 cursor-pointer ">
        <ul class="flex space-x-2 ">
            <li v-if="currentPage !== 1" @click="changePage(1)"  class="transition-transform hover:scale-105 duration-200">
                <a class="px-2 py-1 rounded bg-orange-500 text-white ">&laquo;</a>
            </li>
            <li v-if="currentPage > 1" @click="changePage(currentPage - 1)" class="transition-transform hover:scale-105 duration-200">
                <a class="px-2 py-1 rounded bg-orange-500 text-white ">{{ currentPage - 1 }}</a>
            </li>
            <li class="active transition-transform hover:scale-105 duration-200">
                <a class="px-2 py-1 rounded bg-orange-700 text-white">{{ currentPage }}</a>
            </li>
            <li v-if="currentPage < totalPages" @click="changePage(currentPage + 1)"  class="transition-transform hover:scale-105 duration-200">
                <a class="px-2 py-1 rounded bg-orange-500 text-white">{{ currentPage + 1 }}</a>
            </li>
            <li v-if="currentPage !== totalPages" @click="changePage(totalPages)"  class="transition-transform hover:scale-105 duration-200">
                <a class="px-2 py-1 rounded bg-orange-500 text-white">&raquo;</a>
            </li>
        </ul>
    </nav>
</template>
  
<script setup>
import { defineProps, defineEmits } from 'vue';

const { currentPage, totalPages } = defineProps(['currentPage', 'totalPages']);
const emit = defineEmits();
const changePage = (page) => emit('update:currentPage', page);
</script>
  
<style>
/* Styles can be customized as per your needs using Tailwind CSS classes */


.pagination .active {
    font-weight: bold;
}
</style>
  