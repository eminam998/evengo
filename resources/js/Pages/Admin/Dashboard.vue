<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedAdmin.vue';
import { Head } from '@inertiajs/inertia-vue3';
const props = defineProps({
  admin: {
    type: Object,
    default: () => ({}),
  },
  company: {
    type: Object,
    default: () => ({}),
  },
  news: {
    type: Object,
    default: () => ({}),
  },
  events: {
    type: Object,
    default: () => ({}),
  },

  
});



</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dobar dan, {{ admin.name }}
            </h2>
        </template>

        <div class="py-12 flex gap-4 mx-8">
            <div class="w-1/2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between w-full items-center">
                        <div class="p-6 text-3xl bg-white border-b border-gray-200">
                        {{ company.name }}
                        </div>
                        <div class="p-6">
                            <a
                            tabIndex="1"
                            className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                            :href="route('company.edit', company.id)"
                        >
                            Uredi
                        </a>
                        </div>
                    </div>
                    <div class="p-5 flex space-x-8 w-full">
                        <div class="w-1/2">
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Ime organizacije</h2>
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
                        </div>
                        <div class="w-1/2">
                            
                            
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Kratki opis</h2>
                                <h3>
                                    {{company.description}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Facebook</h2>
                                <h3>
                                    {{company.facebook}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Web stranica</h2>
                                <h3>
                                    {{company.website}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Instagram</h2>
                                <h3>
                                    {{company.instagram}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-1/2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <div class="text-lg bg-white border-b border-gray-200">
                                Novosti
                            </div>
                            <div class="">
                                <a
                                tabIndex="1"
                                className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                :href="route('news.index')"
                                >
                                    Pogledaj sve
                                </a>
                            </div>
                        </div>
                        <div v-for="n in news" :key="n.id" class="py-4 flex space-x-4 items-center">
                            <div>
                                <img :src="n.image" class="object-cover h-24 w-48">
                            </div>
                            <div>
                                <h2 class="text-lg font-bold">{{n.title}}</h2>
                                <h3>
                                    {{ n.description.substring(0,100)+"..." }}
                                </h3>
                            </div>
                        </div>
                        <hr>
                        <div class="flex pt-4 justify-between items-center">
                            <div class="text-lg bg-white border-b border-gray-200">
                                Događaji
                            </div>
                            <div class="">
                                <a
                                tabIndex="1"
                                className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                :href="route('event.index')"
                                >
                                    Pogledaj sve
                                </a>
                            </div>
                        </div>
                        <div v-for="n in events" :key="n.id" class="py-4 flex space-x-4 items-center">
                            <div>
                                <img :src="n.image" class="object-cover h-24 w-48">
                            </div>
                            <div>
                                <h2 class="text-lg font-bold">{{n.name}}</h2>
                                <h3>
                                    {{ n.description.substring(0,100)+"..." }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
