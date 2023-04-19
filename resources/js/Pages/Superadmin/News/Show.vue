<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
  news: {
    type: Object,
    default: () => ({}),
  },
  images: {
    type: Object,
    default: () => ({}),
  },
})
const form = useForm();
function destroy(id) {
    if (confirm("Jeste li sigurni da želite obrisati novost")) {
        form.delete(route('superadmin-news.destroy', id));
    }
}

</script>

<template>
    <Head title="Pregled novosti" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pregled novosti - {{ news.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex text-gray-700 justify-between items=center p-5">
                        <div class="flex justify-between text-xl items-center">
                            Pregled novosti - {{ news.title }}
                        </div>
                        <Link
                            className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                            :href="route('superadmin-news.index')"
                            >
                            Nazad
                        </Link>
                    </div>
                    <div class="p-5 w-full">
                        <div class="pb-4">
                            <h2 class="text-lg font-bold">Naslov</h2>
                            <h3>
                                {{news.title}}
                            </h3>
                        </div>
                        <div class="pb-4">
                            <h2 class="text-lg font-bold">Sadržaj</h2>
                            <h3>
                                {{news.description}}
                            </h3>
                        </div>
                        <div class="pb-4">
                            <h2 class="text-lg font-bold">Glavna slika</h2>
                            <img :src="news.image" width="200">
                        </div>
                        <div class="pb-4">
                            <h2 class="text-lg font-bold">Galerija</h2>
                            <div class="flex space-x-4">
                                <img v-for="image in news.images" :src="image" width="200">
                            </div>
                        </div>
                        <div type="justify-start lg:justify-end" no-wrap>
                            <button
                                @click="destroy(news.id)"
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
        </div>
    </BreezeAuthenticatedLayout>
</template>