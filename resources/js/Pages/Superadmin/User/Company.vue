<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
  company: {
    type: Object,
    default: () => ({}),
  },
})

</script>

<template>
    <Head title="Pregled kompanije" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pregled kompanije - {{ company.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex text-gray-700 justify-between items=center p-5">
                        <div class="flex justify-between text-xl items-center">
                            Pregled kompanije - {{ company.name }}
                        </div>
                        <Link
                            className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                            :href="route('user.index')"
                            >
                            Nazad
                        </Link>
                    </div>
                    <div class="p-5 flex space-x-8 w-full">
                        <div class="w-1/2">
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Ime kompanije</h2>
                                <h3>
                                    {{company.name}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Logo</h2>
                                <img :src="company.logo" width="200">
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Lokacija</h2>
                                <h3>
                                    {{company.location.name}}
                                </h3>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Adresa</h2>
                                <h3>
                                    {{company.address}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Broj telefona</h2>
                                <h3>
                                    {{company.phone}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Kratki opis</h2>
                                <h3>
                                    {{company.description}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>