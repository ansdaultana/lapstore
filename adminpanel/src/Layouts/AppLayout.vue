
<script setup>
import Sidebar from '../components/Sidebar.vue';
import Navbar from '../components/Navbar.vue'
</script>

<template>
    <div class="flex">
        <Sidebar />
        <div class="w-screen">
            <Navbar />
            <slot />

        </div>
    </div>
</template>