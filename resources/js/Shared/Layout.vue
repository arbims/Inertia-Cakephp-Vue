<template>
    <Head>
        <title>My App</title>
        <meta type="description" content="Description about my app" head-key="description">
    </Head>

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
import { usePage } from '@inertiajs/vue3'

import Nav from './Nav.vue'

const page = usePage();

const username = computed(() => {
    return page.props.auth.user.username;
})

</script>
