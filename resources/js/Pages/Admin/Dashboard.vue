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
                    <div class="flex">
                        <div class="p-6 text-3xl bg-white border-b border-gray-200">
                        {{ company.name }}
                        </div>
                        <a
                            tabIndex="1"
                            className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                            :href="route('company.edit', company.id)"
                        >
                            Edit
                        </a>
                        <div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-1/2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Ovdje će ići lista evenata i lista news ono zadnjih
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
