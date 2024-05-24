<template>

  <nav class="ml-6">
    <ul class="flex space-x-4">
      <li>
        <NavLink href="/" :active="$page.component == 'Home/Index'">
          Home
        </NavLink>
        
      </li>
      <li>
        <NavLink href="/users" :active="$page.component == 'Users/Index'" >
          Users
        </NavLink>
      </li>
      <li>
        <NavLink href="/settings" :active="$page.component == 'Home/Settings'" >
          Settings
        </NavLink>
      </li>
      <li>
        <Link href="/logout" method="post" :headers="{ 'X-CSRF-Token': $page.props._csrfToken }" as="button" class="text-black hover:underline" :data="{foo: 'isbar'}">Logout</Link>
      </li>
    </ul>
  </nav>

</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import NavLink from './NavLink.vue'
</script>