<template>

  <div @click="removeFlash" class="flash_error">
    <div v-if="$page.props.flash.message"
        class="bg-red-100 border-l-4 border-orange-500 text-orange-700 p-4 text-red-900 mb-5">
        {{ $page.props.flash.message }}
    </div>
  </div>
  <main class="grid place-items-center min-h-screen">
    <section class="bg-white rounded-xl max-w-md mx-auto border p-8 border-gray-400">

      <Head title="Login" />
      <div class="flex">
        <h1 class="text-3xl font-bold">
          Login User
        </h1>
      </div>

      <form @submit.prevent="submit" method="POST" class="max-w-md mx-auto mt-6">

        <div class="mb-6">
          <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
            Email
          </label>

          <input v-model="form.email" type="email" name="email" id="email" class="border border-gray-400 p-2 w-full"
            required>

          <div v-if="errors" v-for="error in errors.email" class="text-red-500 text-xs mt-1">
            {{ error }}
          </div>

        </div>
        <div class="mb-6">
          <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
            Password
          </label>

          <input v-model="form.password" type="password" name="password" id="password"
            class="border border-gray-400 p-2 w-full" required>

          <div v-if="errors" v-for="error in errors.password" class="text-red-500 text-xs mt-1">
            {{ error }}
          </div>

        </div>
        <div class="mb-6">
          <button type="submit" class="bg-gray-600 text-white py-2 px-4 hover:bg-gray-900 " :disabled="processing">
            Submit
          </button>
        </div>

      </form>
    </section>
  </main>
</template>

<script setup>

import {reactive, ref} from "vue";
import { router, usePage } from '@inertiajs/vue3'

defineOptions({
  layout: null
})

defineProps({
  errors: Array
});

const page = usePage();

let form = reactive({
  email: '',
  password: ''
});

let processing = ref(false);

let submit = () => {
   
   router.post('/login', form, {
     headers: {'X-CSRF-Token': page.props._csrfToken },
     onStart: () => {
       processing.value = true;
     },
     onFinish: () => {
       processing.value = false;
     }
   });
 }

let removeFlash = (e) => {
  console.log(e)
  //e.target.remove()
}
</script>