<template>
  <Layout>

    <Head title="Create User" />
    <div class="flex justify-between">
      <h1 class="text-3xl font-bold">
        Create Users
      </h1>
    </div>
   
    <form @submit.prevent="submit" method="POST" class="max-w-md mx-auto mt-6">
      <div class="mb-6">
        <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Name
        </label>

        <input v-model="form.name" type="text" name="name" id="name" class="border border-gray-400 p-2 w-full" required>

        <div v-if="errors" v-for="error in errors.name" class="text-red-500 text-xs mt-1">
          {{ error }}
        </div>

      </div>
      <div class="mb-6">
        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Email
        </label>

        <input  v-model="form.email"  type="email" name="email" id="email" class="border border-gray-400 p-2 w-full" required>

        <div v-if="errors" v-for="error in errors.email" class="text-red-500 text-xs mt-1">
          {{ error }}
        </div>

      </div>
      <div class="mb-6">
        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Password
        </label>

        <input  v-model="form.password"  type="password" name="password" id="password" class="border border-gray-400 p-2 w-full" required>

        <div v-if="errors" v-for="error in errors.password" class="text-red-500 text-xs mt-1">
          {{ error }}
        </div>

      </div>
      {{ processing }}
      <div class="mb-6">
        <button type="submit" class="bg-gray-600 text-white py-2 px-4 hover:bg-gray-900 " :disabled="processing">
          Submit
        </button>
      </div>

    </form>
  </Layout>
</template>

<script setup>
import {reactive, ref} from "vue";
import { router, usePage } from '@inertiajs/vue3'

  defineProps({
    errors: Array
  });

  const page = usePage();

  let form = reactive({
    name: '',
    email: '',
    password: ''
  });

  let processing = ref(false);

  let submit = () => {
   
    router.post('/users/create', form, {
      headers: {'X-CSRF-Token': page.props._csrfToken },
      onStart: () => {
        processing.value = true;
      },
      onFinish: () => {
        processing.value = false;
      }
    });
  }

</script>