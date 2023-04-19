<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
  contacts: {
    type: Object,
    default: () => ({}),
  },

});
const form = useForm();
function destroy(id) {
    if (confirm("Jeste li sigurni da želite obrisati poruku?")) {
        form.delete(route('contact.destroy', id));
    }
}


</script>


<template>
    <Head title="Poruke" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-blue-800 leading-tight">
                Poruke
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex bg-white border-b border-blue-200 justify-between items=center p-5">
                        <div class="flex space-x-2 items-center">
                            Sve poruke (pročitane i nepročitane)
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-200">
                            <tr>
                                <th scope="col" class="py-3 px-6">Ime</th>
                                <th scope="col" class="py-3 px-6">Email</th>

                                <th  scope="col" class="py-3 px-6">Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="contact in contacts.data" :key="contact.id" class="bg-white border-b border-blue-200">
                                <td data-label="Title" class="py-4 px-6">
                                    {{ contact.name }}
                                </td>
                                <td data-label="Title" class="py-4 px-6">
                                    {{ contact.email }}
                                </td>
                                <td
                                    
                                    class="py-4 px-6 w-64"
                                >
                                    <div type="justify-start lg:justify-end" no-wrap>
                                        <a
                                            tabIndex="1"
                                            className="px-4 py-2 text-sm text-white bg-green-500 rounded"
                                            :href="route('messages.show', contact.id)"
                                        >
                                            Vidi poruku
                                        </a>
                                        <button
                                            @click="destroy(contact.id)"
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
                    <Pagination class="mt-6" :links="contacts.links" />
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>