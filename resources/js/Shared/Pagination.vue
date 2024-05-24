<template>
  
  <div class="mt-6">
      <Link :href="`${url}=${paging.page - 1}`" 
      :class="paging.prevPage ? '' : 'text-gray-400 pointer-events-none'"
      class="px-1"
      v-text="'&laquo; prev'"></Link>
      <Link :href="`${url}=${i}${search}`" v-for="i in paging.pageCount" :key="i"
      class="px-1"
      :class="paging.page == i ? 'font-bold' : ''"
      >{{ i }}</Link>
      <Link :href="`${url}=${paging.page + 1}`"
      class="px-1"
      :class="paging.nextPage ? '' : 'text-gray-400 pointer-events-none'"
      v-text="'next &raquo;'"></Link>
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