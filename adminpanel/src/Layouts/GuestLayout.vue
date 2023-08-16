<script setup>
import { defineProps } from 'vue';
const props = defineProps({
  title: String,
})

</script>
<template>
  <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8 ">
    <div class="bg-slate-500 sm:mx-auto sm:w-full sm:max-w-sm p-10 rounded-xl">

      <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
        <img class="mx-auto h-40 w-auto animate-bounce" src="https://res.cloudinary.com/ddrivhxfq/image/upload/f_auto,q_auto/xbqscokdjitefrwzqohj" alt="Your Company" />
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">{{ props.title }}</h2>
      </div>
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <slot />
      </div>

    </div>

  </div>
</template>

<style>
@keyframes bounce {

  0%,
  100% {
    transform: translateY(-8%);
    animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
  }

  50% {
    transform: translateY(0);
    animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
  }
}
</style>