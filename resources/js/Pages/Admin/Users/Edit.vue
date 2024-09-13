<template>
  <Layout>
    <Head title="Create User" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/Users">Users</Link>
      <span class="text-indigo-400 font-medium">/</span> Modifier
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="submit" method="POST" class="max-w-md mx-auto mt-6">
        <div class="mb-6">
          <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
            Name
          </label>

          <input v-model="form.name" type="text" name="name" id="name" class="form-input" required>

          <div v-if="errors" v-for="error in errors.name" class="text-red-500 text-xs mt-1">
            {{ error }}
          </div>

        </div>
        <div class="mb-6">
          <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
            Email
          </label>

          <input v-model="form.email" type="email" name="email" id="email" class="form-input" required>

          <div v-if="errors" v-for="error in errors.email" class="text-red-500 text-xs mt-1">
            {{ error }}
          </div>

        </div>
        <div class="mb-6">
          <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
            Password
          </label>

          <input v-model="form.password" type="password" name="password" id="password" class="form-input">

          <div v-if="errors" v-for="error in errors.password" class="text-red-500 text-xs mt-1">
            {{ error }}
          </div>

        </div>
        <div class="mb-6">
          <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
            <button type="submit" class="flex items-center btn-indigo" :disabled="processing">
              Submit
            </button>
          </div>
        </div>

      </form>
    </div>
  </Layout>
</template>

<script setup>
import {reactive, ref} from "vue";
import { router, usePage } from '@inertiajs/vue3'

  let props = defineProps({
    errors: Array,
    user: Object
  });

  const page = usePage();

  let form = reactive({
    name: props.user.name,
    email: props.user.email,
    password: ''
  });

  let processing = ref(false);

  let submit = () => {

    router.put('/admin/users/edit/'+props.user.id, form, {
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
