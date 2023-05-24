<script setup>
import MainLayout from '@/Layouts/Main.vue';
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { watch } from "vue";
import { ref } from "vue";
import Pagination from '@/Components/Pagination.vue';

  
const props = defineProps({
    companies: {
        type: Object,
        default: () => ({}),
    },
});
let search = ref('');
watch(search, (value) => {
  Inertia.get(
    "/all-companies",
    { search: value },
    {
      preserveState: true,
    }
  );
}); 

</script>

<template>
    <Head title="Sve organizacije" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sve organizacije
            </h2>
        </template>

        <!-- Container for demo purpose -->
            <div class="container py-24 px-6 mx-auto">

                <!-- Section: Design Block -->
                <section class="mb-32 text-gray-800 text-center">

                <h2 class="text-3xl font-bold mb-10 text-center">Organizacije</h2>
                <div class='max-w-md mx-auto mb-8'>
                    <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                        <div class="grid place-items-center h-full w-12 text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>

                        <input
                        class="peer h-full w-full border-none outline-none text-sm text-gray-700 pr-2"
                        type="text"
                        id="search"
                        v-model="search"
                        placeholder="Pretraži organizaciju.." /> 
                    </div>
                </div>

                <div class="grid lg:grid-cols-3 gap-6 xl:gap-x-12">
                    <div v-for="company in companies.data" :key="company.id" class="mb-6 lg:mb-0">
                    <div>
                        <div
                        class="relative overflow-hidden w-full h-64 bg-no-repeat bg-cover relative overflow-hidden bg-no-repeat bg-cover ripple shadow-lg rounded-lg mb-6"
                        data-mdb-ripple="true" data-mdb-ripple-color="light">
                        <img :src="company.logo"
                            class="w-full" />
                        <a :href="route('company.about', company.id)">
                            <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
                            style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                        </div>

                        <h5 class="text-lg font-bold mb-3">{{ company.name }}</h5>
                    </div>
                    </div>
                </div>
                <Pagination class="mt-6" :links="companies.links" />

                </section>
                <!-- Section: Design Block -->

            </div>
            <!-- Container for demo purpose -->
    </MainLayout>
</template>


