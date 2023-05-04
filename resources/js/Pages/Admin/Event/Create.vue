<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedAdmin.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeTextArea from '@/Components/Textarea.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
const props = defineProps({
    locations: {
        type: Object,
        default: () => ({}),
    },
    categories: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm({
    name: '',
    description: '',
    image: null,
    address: '',
    time: '',
    date: '',
    category_id: '',
    location_id: '',
    guest_number: '',
});
const submit = () => {
    form.post(route("event.store"), {
        forceFormData: true,
    })
};

</script>
<template>
    <Head title="Kreiraj događaj" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kreiraj događaj
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                :href="route('event.index')"
                            >
                                Nazad
                            </Link>
                        </div>
                        <form name="createForm" @submit.prevent="submit" enctype="multipart/form-data">
                                <div className="flex flex-col">
                                    <div className="mb-4">
                                        <BreezeLabel for="name" value="Naziv" />
                                        
                                        <BreezeInput 
                                            id="name" 
                                            type="text" 
                                            class="mt-1 block w-full" 
                                            v-model="form.name" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.name">
                                            {{ form.errors.name }}
                                        </span>
                                    </div>
                                    <div class="mb-4">
                                        <BreezeLabel for="image" value="Slika" />
                                        <input
                                            id="image"
                                            type="file"
                                            name="image"
                                            required
                                            class="text-sm text-grey-500
                                                    file:mr-5 file:py-2 file:px-6
                                                    file:rounded-full file:border-0
                                                    file:text-sm file:font-medium
                                                    file:bg-blue-50 file:text-blue-700
                                                    hover:file:cursor-pointer hover:file:bg-blue-50
                                                    hover:file:text-blue-700
                                                " 
                                            
                                            @input = "form.image = $event.target.files[0] || $event.dataTransfer.files"
                                            
                                        />
                                        <div
                                            v-if="form.errors.image"
                                            class="text-sm text-red-600"
                                        >
                                            {{ form.errors.image }}
                                        </div>
                                    </div>
                                    
                                    <div className="mb-4">
                                        <BreezeLabel for="description" value="Opis" />
                                        
                                        <BreezeTextArea 
                                            id="description" 
                                            class="mt-1 block w-full" 
                                            v-model="form.description" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.description">
                                            {{ form.errors.description }}
                                        </span>
                                    </div>

                                    <div className="mb-4">
                                        <BreezeLabel for="guest_number" value="Broj gostiju (ukoliko je neograničen ostaviti prazno)" />
                                        
                                        <BreezeInput 
                                            id="guest_number" 
                                            type="number" 
                                            class="mt-1 block w-full" 
                                            v-model="form.guest_number" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.guest_number">
                                            {{ form.errors.guest_number }}
                                        </span>
                                    </div>

                                    <div className="mb-4">
                                        <BreezeLabel for="category_id" value="Kategorija" />
                                        
                                        <select v-model="form.category_id"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option>Please Select</option>
                                        <option :value="category.id" v-for="(category, i) in categories" :key="i">{{ category.title }}</option>
                                        </select>
                                        <span className="text-red-600" v-if="form.errors.category_id">
                                            {{ form.errors.category_id }}
                                        </span>
                                    </div>
                                    <div className="mb-4">
                                        <BreezeLabel for="location_id" value="Lokacija" />
                                        
                                        <select v-model="form.location_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option>Please Select</option>
                                        <option :value="location.id" v-for="(location, i) in locations" :key="i">{{ location.name }}</option>
                                        </select>
                                        <span className="text-red-600" v-if="form.errors.location_id">
                                            {{ form.errors.location_id }}
                                        </span>
                                    </div>

                                    <div className="mb-4">
                                        <BreezeLabel for="address" value="Adresa" />
                                        
                                        <BreezeInput 
                                            id="address" 
                                            type="text" 
                                            class="mt-1 block w-full" 
                                            v-model="form.address" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.address">
                                            {{ form.errors.address }}
                                        </span>
                                    </div>

                                    <div className="mb-4">
                                        <BreezeLabel for="date" value="Datum" />
                                        
                                        <BreezeInput 
                                            id="date" 
                                            type="date" 
                                            class="mt-1 block w-full" 
                                            v-model="form.date" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.date">
                                            {{ form.errors.date }}
                                        </span>
                                    </div>
                                    
                                    
                                    <div className="mb-4">
                                        <BreezeLabel for="time" value="Vrijeme" />
                                        
                                        <BreezeInput 
                                            id="time" 
                                            type="time" 
                                            class="mt-1 block w-full" 
                                            v-model="form.time" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.time">
                                            {{ form.errors.time }}
                                        </span>
                                    </div>
                                </div>

  
                                <div className="mt-4">
                                    <button
                                        type="submit"
                                        className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                                    >
                                        Spremi
                                    </button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>