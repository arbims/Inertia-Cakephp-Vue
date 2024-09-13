<template>
  
  <div class="mt-6">
      <Link :href="`${url}=${paging.currentPage - 1}`" 
      :class="paging.hasPrevPage ? 'mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded' : 'text-gray-400 pointer-events-none'"
      class="px-1"
      v-text="'&laquo; Prev'"></Link>
      <Link :href="`${url}=${i}${search}`" v-for="i in paging.pageCount" :key="i"
      class="mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded"
      :class="paging.currentPage == i ? 'mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded text-gray-400 pointer-events-none' : ''"
      >{{ i }}</Link>
      <Link :href="`${url}=${paging.currentPage + 1}`"
      class="px-1"
      :class="paging.hasNextPage ? 'mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded' : 'mb-1 mr-1 px-4 py-3 focus:text-indigo-500 text-sm leading-4 hover:bg-white border focus:border-indigo-500 rounded text-gray-400 pointer-events-none'"
      v-text="'Next &raquo;'"></Link>
    </div>
</template>

<script>
import {Link} from '@inertiajs/vue3'

export default {
  props: {
    paging: Object,
    url: String,
    search: String
  },
  components: {Link}
}
</script>