<script setup>
import GuestLayout from '../Layouts/GuestLayout.vue'
import { ref } from 'vue';
import axios from 'axios';
import store from '../store/index.js';
import router from '../router/index.js';
axios.defaults.withCredentials = true;
let loading = ref(false);
let errorMsg = ref("");
const user = ref({
  email: '',
  password: '',
  remember: false
});

const login = async () => {
  try {
    await axios.get('http://localhost:8000/sanctum/csrf-cookie');
  const response = await axios.post('http://localhost:8000/login',
    {
      email: user.value.email,
      password: user.value.password,
      remember: user.value.remember
    });
    console.log(response)
    if (response.data && response.data.token) {
      router.push({name:'app.dashboard'});
    }    
  } catch (error) {
    
  }

}
</script>

<template>
  <GuestLayout title="Sign In to your Account!">
    <form class="space-y-6" action="#" method="POST" @submit.prevent="login">
      <div v-if="errorMsg" class="flex items-center justify-between py-3 px-5 bg-red-500 text-white rounded">
        {{ errorMsg }}
        <span @click="errorMsg = ''"
          class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </span>
      </div>

      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-white">Email address</label>
        <div class="mt-2">
          <input v-model="user.email" id="email" name="email" type="email" autocomplete="email" required=""
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            placeholder="admin@admin.com" />
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label>
          <div class="text-sm">
            <router-link :to="{ name: 'request-password' }" class="font-semibold text-[#20D0FF] hover:text-[#00A7D4]">Forgot
              password?</router-link>
          </div>
        </div>
        <div class="mt-2">
          <input v-model="user.password" id="password" name="password" type="password" autocomplete="current-password"
            required=""
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            placeholder="Password" />
        </div>
      </div>
      <div>
        <input v-model="user.remember" type="checkbox" id="remember" name="remember" class="text-[#20D0FF]">

        <label class="ml-2 text-white" for="remember">Remember me</label>

      </div>
      <div class="bg-[#20D0FF]  ">
        <button :disabled="loading" :class="{ 'cursor-not-allowed': loading, }" type="submit"
          class="flex w-full justify-center items-center rounded-mdpx-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#00A7D4] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
          in</button>
      </div>

    </form>


  </GuestLayout>
</template>