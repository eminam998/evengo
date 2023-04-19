<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
  news: {
    type: Object,
    default: () => ({}),
  },
  can: {
    type: Object,
    default: () => ({}),
  },
});
const form = useForm();
function destroy(id) {
    if (confirm("Jeste li sigurni da želite obrisati novost")) {
        form.delete(route('superadmin-news.destroy', id));
    }
}


</script>


<template>
    <Head title="Novosti" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Novosti
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex bg-white border-b border-gray-200 justify-between items=center p-5">
                        <div class="flex space-x-2 items-center">
                            Sve novosti
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-200">
                            <tr>
                                <th scope="col" class="py-3 px-6">Naslov</th>
                                <th scope="col" class="py-3 px-6">Sadržaj</th>
                                <th scope="col" class="py-3 px-6">Kompanija</th>
                                <th scope="col" class="py-3 px-6">Slika</th>
                                <th scope="col" class="py-3 px-6">Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="n in news.data" :key="n.id" class="bg-white border-b border-blue-200">
                                <td data-label="Title" class="py-4 px-6">
                                    {{ n.title }}
                                </td>
                                <td data-label="Title" class="py-4 px-6">
                                    {{ n.description }}
                                </td>
                                <td data-label="Title" class="py-4 px-6">
                                    {{ n.company.name }}
                                </td>
                                <td data-label="Title" class="py-4 px-6">
                                    <img :src="n.image" width="50" />
                                </td>
                                <td
                                   
                                    class="py-4 px-6 w-96"
                                >
                                    <div type="justify-start lg:justify-end" no-wrap>
                                        <a
                                            tabIndex="1"
                                            className="px-4 py-2 mr-1 text-sm text-white bg-green-500 rounded"
                                            :href="route('superadmin-news.show', n.id)"
                                        >
                                            Više
                                        </a>
                                        <button
                                            @click="destroy(n.id)"
                                            tabIndex="-1"
                                            type="button"
                                            className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded"
                                        >
                                            Obriši
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="mt-6" :links="news.links" />
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>