<script setup>
import MainLayout from '@/Layouts/Main.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Neuspjela prijava" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Neuspjela prijava na događaj!
            </h2>
        </template>

        <!-- Container for demo purpose -->
<div class="container py-24 px-6 mx-auto">

<!-- Section: Design Block -->
<div class="text-center bg-gray-50 text-gray-800 py-24 px-6 bg-white rounded-lg shadow-md">
      <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold tracking-tight mb-12">Nažalost <br /><span class="text-blue-600">Vaša prijava nije uspješna</span></h1>
      <h3 class="text-xl md:text-6xl xl:text-4xl font-bold tracking-tight mb-12">Događaj na koji ste se prijavili je popunjen.</h3>
      <a class="inline-block px-7 py-3 mr-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="light" href="/" role="button">Početna</a>
    </div>
<!-- Section: Design Block -->

</div>
<!-- Container for demo purpose -->
    </MainLayout>
</template>