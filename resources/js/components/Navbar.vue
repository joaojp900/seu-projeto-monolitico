<template>
   
    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
         
        <Link
            v-if="authUser"
            :href="route('dashboard')"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Dashboard
        </Link>

        <template v-else>
            <Link
                v-if="canRegister"
                :href="route('register')"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Desafio
            </Link>
        </template>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

const authUser = computed(() => page.props.auth?.user)
const canLogin = computed(() => page.props.canLogin)
const canRegister = computed(() => page.props.canRegister)
</script>

<style scoped>
 nav{
      background-color: #333;
 }
</style>
