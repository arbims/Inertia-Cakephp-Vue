<!-- <template>
    

    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">My App</h1>
                <p class="text-sm ml-4">
                    Welcome Back, {{ username }}
                </p>

            </div>
            <Nav></Nav>
        </header>
    </section>
    <Dropdown></Dropdown>
    <section class="p-6">
        <div class="max-w-3xl mx-auto mb-6">
            <div v-if="$page.props.flash.message"
                class="bg-green-100 border-l-4 border-orange-500 text-orange-700 p-4 text-green-900 mb-5">
                {{ $page.props.flash.message }}
                <span class="">X</span>
            </div>
            <slot></slot>
        </div>
    </section>
</template> -->


<template>
    <Head>
        <title>My App</title>
        <meta type="description" content="Description about my app" head-key="description">
    </Head>
    <div>
      <div id="dropdown" />
      <div class="md:flex md:flex-col">
        <div class="md:flex md:flex-col md:h-screen">
          <div class="md:flex md:shrink-0">
            <div class="flex items-center justify-between px-6 py-4 bg-indigo-900 md:shrink-0 md:justify-center md:w-56">
              <Link class="mt-1" href="/">
                <logo class="fill-white" width="120" height="28" />
              </Link>
              <dropdown class="md:hidden" placement="bottom-end">
                <template #default>
                  <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" /></svg>
                </template>
                <template #dropdown>
                  <div class="mt-2 px-8 py-4 bg-indigo-800 rounded shadow-lg">
                    <main-menu />
                  </div>
                </template>
              </dropdown>
            </div>
            <div class="md:text-md flex items-center justify-between p-4 w-full text-sm bg-white border-b md:px-12 md:py-0">
              <div class="mr-4 mt-1">Gestion AutoEcole</div>
              <dropdown class="mt-1" placement="bottom-end">
                <template #default>
                  <div class="group flex items-center cursor-pointer select-none">
                    <div class="mr-1 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600 whitespace-nowrap">
                      <span>{{ username }}</span>
                      <span class="hidden md:inline">&nbsp;{{ username }}</span>
                    </div>
                    <icon class="w-5 h-5 fill-gray-700 group-hover:fill-indigo-600 focus:fill-indigo-600" name="cheveron-down" />
                  </div>
                </template>
                <template #dropdown>
                  <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
                    <Link class="block px-6 py-2 hover:text-white hover:bg-indigo-500" href="#">My Profile</Link>
                    <Link class="block px-6 py-2 hover:text-white hover:bg-indigo-500" href="/users">Manage Users</Link>
                    <Link class="block px-6 py-2 w-full text-left hover:text-white hover:bg-indigo-500" href="/logout" method="delete" as="button">Logout</Link>
                  </div>
                </template>
              </dropdown>
            </div>
          </div>
          <div class="md:flex md:grow md:overflow-hidden">
            <main-menu class="hidden shrink-0 p-12 w-56 bg-indigo-800 overflow-y-auto md:block" />
            <div class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto" scroll-region>
              <flash-messages />
              <div class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto">
              <slot />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

<!-- import Nav from './Nav.vue'

export default {
    components: { Nav },
    computed: {
        username() {
            return this.$page.props.auth.user.username;
        }
    }
} -->

<script setup>
import { computed } from 'vue'
import { usePage , Link } from '@inertiajs/vue3'
import Dropdown from './Dropdown.vue'
import MainMenu from './MainMenu.vue'
import Logo from './Logo.vue'
import FlashMessages from './FlashMessages.vue'

const page = usePage();

const username = computed(() => {
    return page.props.auth.user.username;
})

</script>


