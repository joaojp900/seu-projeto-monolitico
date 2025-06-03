<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Tabelalista from '@/components/TabelaLista.vue';
</script>

<template>
    <Head title="Dashboar"></Head>

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
<!--Formulario-Componente-->   <Tabelalista></Tabelalista>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
