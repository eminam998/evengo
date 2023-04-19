<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedAdmin.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
  event: {
    type: Object,
    default: () => ({}),
  },
})

const form = useForm();
function destroy(id) {
    if (confirm("Jeste li sigurni da želite obrisati događaj?")) {
        form.delete(route('event.destroy', id));
    }
}

</script>

<template>
    <Head title="Pregled događaja" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pregled događaja - {{ event.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex text-gray-700 justify-between items=center p-5">
                        <div class="flex justify-between text-xl items-center">
                            Pregled događaja - {{ event.name }}
                        </div>
                        <Link
                            className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                            :href="route('event.index')"
                            >
                            Nazad
                        </Link>
                    </div>
                    <div class="p-5 flex space-x-8 w-full">
                        <div class="w-1/2">
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Naziv događaja</h2>
                                <h3>
                                    {{event.name}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Promo slika</h2>
                                <img :src="event.image" width="200">
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Kategorija</h2>
                                <h3>
                                    {{event.category.title}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Lokacija</h2>
                                <h3>
                                    {{event.location.name}}
                                </h3>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Adresa</h2>
                                <h3>
                                    {{event.address}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Datum i vrijeme  održavanja</h2>
                                <h3>
                                    {{event.date}} {{ event.time }}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Kratki opis</h2>
                                <h3>
                                    {{event.description}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Broj gostiju</h2>
                                <h3 v-if="event.guest_number===1000">
                                    Neograničen
                                </h3>
                                <h3 v-else>{{ event.guest_number }}</h3>
                            </div>
                        </div>
                        
                    </div>
                    <div class="justify-start p-5" no-wrap>
                            <a
                                tabIndex="1"
                                className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                :href="route('event.edit', event.id)"
                            >
                                Uredi
                            </a>
                            <button
                                @click="destroy(event.id)"
                                tabIndex="-1"
                                type="button"
                                className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded"
                            >
                                Obriši
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>