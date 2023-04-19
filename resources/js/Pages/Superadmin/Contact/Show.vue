<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
const props = defineProps({
  contact: {
    type: Object,
    default: () => ({}),
  },


  
});

const form = useForm({
    name: props.contact.name,
    email: props.contact.email,
    message: ''

});
const submit = () => {
    form.post(route("send.reply"), {
        forceFormData: true,
    })
};



</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pregledaj poruku
            </h2>
        </template>

        <div class="py-12 flex gap-4 mx-64">
            <div class="w-1/2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-5 flex space-x-8 w-full">
                        <div class="w-1/2">
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Ime pošiljalaca</h2>
                                <h3>
                                    {{contact.name}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Email adresa pošiljalaca</h2>
                                <h3>
                                    {{contact.email}}
                                </h3>
                            </div>
                            <div class="pb-4">
                                <h2 class="text-lg font-bold">Poruka</h2>
                                <h3>
                                    {{contact.message}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-1/2">
                <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <form  @submit.prevent="submit" enctype="multipart/form-data">
                            <h1 class="pb-4 text-lg font-bold">Odgovori na poruku</h1>
                            <div class="form-group mb-6">
                                <textarea class="
                                form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            " id="message" rows="3" name="message" placeholder="Poruka" v-model="form.message" ></textarea>
                            </div>
                            <button type="submit" class="
                            w-full
                            px-6
                            py-2.5
                            bg-blue-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-blue-700 hover:shadow-lg
                            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-blue-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out">Pošalji</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
