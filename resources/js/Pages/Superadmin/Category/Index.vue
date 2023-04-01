<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
  categories: {
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
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('category.destroy', id));
    }
}


</script>


<template>
    <Head title="Category" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-blue-900 leading-tight">
                Kategorije
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div class="flex bg-white border-b border-blue-200 justify-between items=center p-5">
                        <div class="flex space-x-2 items-center">
                            Category Settings Page! Here you can list, create, update or delete category!
                        </div>
                        <div class="flex space-x-2 items-center" v-if="can.create">
                            <a
                                className="px-6 py-2 text-white bg-green-500 uppercase rounded-md focus:outline-none"
                                :href="route('category.create')"
                            >
                                Kreiraj kategoriju
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-blue-900 uppercase bg-blue-200">
                            <tr>
                                <th scope="col" class="py-3 px-6">Title</th>
                                <th scope="col" class="py-3 px-6">Description</th>
                                <th v-if="can.edit || can.delete" scope="col" class="py-3 px-6">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories.data" :key="category.id" class="bg-white border-b border-blue-200">
                                <td data-label="Title" class="py-4 px-6">
                                    {{ category.title }}
                                </td>
                                <td data-label="Title" class="py-4 px-6">
                                    {{ category.description }}
                                </td>
                                <td
                                    v-if="can.edit || can.delete"
                                    class="py-4 px-6 w-64"
                                >
                                    <div type="justify-start lg:justify-end" no-wrap>
                                        <a
                                            tabIndex="1"
                                            className="px-4 py-2 text-sm text-white bg-blue-600 uppercase rounded"
                                            :href="route('category.edit', category.id)"
                                        >
                                            uredi
                                        </a>
                                        <button
                                            @click="destroy(category.id)"
                                            tabIndex="-1"
                                            type="button"
                                            className="mx-1 px-4 py-2 text-sm uppercase text-white bg-red-600 rounded"
                                        >
                                            obriši
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="mt-6" :links="categories.links" />
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>