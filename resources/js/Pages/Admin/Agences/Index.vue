<template>

  <Head title="Agences" />
  <h1 class="mb-8 text-3xl font-bold">Liste d'agences</h1>
  <div class="flex justify-between">
    <div class="flex">
      <Link href="/admin/agences/create" class="btn-indigo">Ajouter Agence</Link>
    </div>
    <input v-model="recherche" type="text" placeholder="search ..." class="border rounded px-2 px-6">
  </div>
  <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mt-6">
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="pb-4 pt-6 px-6 font-bold text-gray-900 ">Name</th>
          <th scope="col" class="pb-4 pt-6 px-6 font-bold text-gray-900">Email</th>
          <th scope="col" class="pb-4 pt-6 px-6 font-bold text-gray-900">Ville</th>
          <th scope="col" class="pb-4 pt-6 px-6 font-bold text-gray-900"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 border-t border-gray-100">
        <tr class="hover:bg-gray-50" v-for="agence in agences.data" :key="agence.id">
          <th class="pb-4 pt-6 px-6">
            <div class="text-sm">
              <div class="font-medium text-gray-700">{{ agence.name }}</div>
            </div>
          </th>
          <th class="pb-4 pt-6 px-6">
            <div class="text-sm">
              <div class="font-medium text-gray-700">{{ agence.email }}</div>
            </div>
          </th>
          <th class="pb-4 pt-6 px-6">
            <div class="text-sm">
              <div class="font-medium text-gray-700">{{ agence.ville }}</div>
            </div>
          </th>
          <td class="px-6 py-4">
            <div class="flex justify-end gap-4">
              <Link x-data="{ tooltip: 'Edite' }" :href="'/admin/agences/edit/' + agence.id">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
              </svg>
              </Link>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

  </div>

  <!-- Paginator -->
  <Pagination :paging="agences.paging" :url="'/admin/agences?page'" :search="(search !== '' ? `&search=${search}` : '')" />

  <!-- <div style="margin-top: 800px;">
    <p>The current Time {{ time }}</p>
    <Link href="/users" class="text-blue-500 hover:underline" preserve-scroll>Refresh</Link>
  </div> -->
</template>

<script setup>

import Pagination from './../../../Shared/Pagination.vue'
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import debounce from "lodash/debounce";

let props = defineProps({
  time: String,
  agences: Object,
  filters: String
})

let search = ref(props.filters)
watch(search, debounce(function (value) {
router.visit('/admin/agences', {
  method: 'get',
  data: { search: value },
  preserveState: true,
  replace: true
}
)
}, 300))
</script>
