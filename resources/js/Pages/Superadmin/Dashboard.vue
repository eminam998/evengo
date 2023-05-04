<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
const props = defineProps({
  contacts: {
    type: Object,
    default: () => ({}),
  },
  pendingCount: {
    type: Number,
    default: 0
  }

});
</script>

<template>
    <Head title="Početna stranica" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Početna stranica
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex bg-white border-b border-blue-200 justify-between items=center p-5">
                    <div v-if="pendingCount == 0" class="flex space-x-2 items-center">
                        Nemate novih korisničkih registracija
                    </div>
                    <div v-else class="flex space-x-2 items-center">
                        Imate {{ pendingCount }} novih korisničkih registracija
                    </div>
                    <div class="flex space-x-2 items-center">
                        <a
                            className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                            :href="route('user.index')"
                        >
                            Pregledaj sve registracije/korisnike
                    </a>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div v-if="contacts.length < 0" class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2 rounded-lg">
            <div class="py-2 px-6 bg-white border-b border-gray-200 rounded-lg">
                        Nove poruke
                    </div>
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
                                        >
                                            Vidi poruku
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="mt-6" :links="contacts.links" />
                </div>
            </div>
        <div v-else class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2 rounded-lg">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="flex bg-white border-b border-blue-200 justify-between items=center p-5">
                    <div class="flex space-x-2 items-center">
                        Nemate novih poruka
                    </div>
                    <div class="flex space-x-2 items-center">
                        <a
                            className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                            :href="route('messages.index')"
                        >
                            Pregledaj sve poruke
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
