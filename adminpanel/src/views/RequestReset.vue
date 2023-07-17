<script setup>
import GuestLayout from '../Layouts/GuestLayout.vue';

</script>
<template>
  
  <GuestLayout title="Enter your email to reset password!">
          <form class="space-y-6" action="#" method="POST">
            <div>
              <label for="email" class="block text-sm font-medium leading-6 text-white">Email address</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" required="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
              </div>
            </div>
               <div class="bg-[#20D0FF]  ">
              <button type="submit" class="flex w-full justify-center items-center rounded-mdpx-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#00A7D4] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            </div>
          </form>
      </GuestLayout>
    </template>