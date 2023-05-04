<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps({
  users: {
    type: Object,
    default: () => ({}),
  },
  can: {
    type: Object,
    default: () => ({}),
  },
  pendingUsers: {
    type: Object,
    default: () => ({}),
  }
})

</script>

<template>
    <Head title="Korisnici" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Korisnici
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex text-gray-700 justify-between items=center p-5">
                        <div class="flex space-x-2 items-center">
                            Korisnici koji čekaju odobrenje
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
                                <th scope="col" class="py-3 px-6">Email adresa</th>
                                <th scope="col" class="py-3 px-6">Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="pending in pendingUsers.data" :key="pending.id" class="bg-white border-b border-blue-200">
                                <td data-label="Ime" class="py-4 px-6">
                                    {{ pending.name }}
                                </td>
                                <td data-label="Email adresa" class="py-4 px-6">
                                    {{ pending.email }}
                                </td>
                                <td
                                    class="py-4 px-6"
                                >
                                    <div type="justify-start lg:justify-end" no-wrap>
                                        <a
                                            tabIndex="1"
                                            className="mr-4 bg-green-500 px-4 py-2 rounded text-white cursor-pointer"
                                            :href="route('user.viewCompany', pending.id)"
                                        >
                                            Pregledaj kompaniju
                                        </a>
                                        <a
                                            tabIndex="1"
                                            className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                            :href="route('user.approve', pending.id)"
                                        >
                                            Odobri
                                        </a>
                                        <a :href="route('user.deny', pending.id)" class="ml-4 bg-red-500 px-4 py-2 rounded text-white cursor-pointer" >
                                            Poništi
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="mt-6" :links="pendingUsers.links" />
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between items=center p-5">
                        <div class="flex space-x-2 items-center text-gray-700">
                            Odobreni korisnici
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
                                <th scope="col" class="py-3 px-6">Email adresa</th>
                                <th v-if="can.edit || can.delete" scope="col" class="py-3 px-6">Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users.data" :key="user.id" class="bg-white border-b border-blue-200">
                                <td data-label="Name" class="py-4 px-6">
                                    {{ user.name }}
                                </td>
                                <td data-label="Email" class="py-4 px-6">
                                    {{ user.email }}
                                </td>
                                <td
                                    class="py-4 px-6"
                                >
                                    <div type="justify-start lg:justify-end" no-wrap>
                                        <a
                                            tabIndex="1"
                                            className="ml-4 bg-green-500 px-4 py-2 rounded text-white cursor-pointer"
                                            :href="route('user.viewCompany', user.id)"
                                        >
                                            Pregledaj kompaniju
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="mt-6" :links="users.links" />

                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>