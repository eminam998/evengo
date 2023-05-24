<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedAdmin.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeTextArea from '@/Components/Textarea.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
const props = defineProps({
    company: Object,
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
    _method: "PUT",
    name: props.company.name,
    description: props.company.description,
    address: props.company.address,
    phone: props.company.phone,
    location_id: props.company.location_id,
    instagram: props.company.instagram,
    website: props.company.website,
    facebook: props.company.facebook,
    file: props.company.logo

});
const submit = () => {
    form.post(route('company.update', props.company.id), {
        forceFormData: true,
    });
};
</script>
<template>
    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit {{ company.name }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                :href="route('admin')"
                            >
                                Back
                            </Link>
                        </div>
                        <form name="createForm" @submit.prevent="submit">
                                <div className="flex flex-col">
                                    <div className="mb-4">
                                        <BreezeLabel for="name" value="Ime organizacije" />
                                        
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
                                    <div class="pb-4">
                                        <img :src="company.logo" width="50" />
                                        </div>
                                    <div className="mb-4">

                                        <BreezeLabel for="file" value="Logo" />
                                        <input
                                            id="file"
                                            type="file"
                                            name="file"
                                            class="text-sm text-grey-500
                                                    file:mr-5 file:py-2 file:px-6
                                                    file:rounded-full file:border-0
                                                    file:text-sm file:font-medium
                                                    file:bg-blue-50 file:text-blue-700
                                                    hover:file:cursor-pointer hover:file:bg-blue-50
                                                    hover:file:text-blue-700
                                                " 
                                            
                                            @input = "form.file = $event.target.files[0] || $event.dataTransfer.files"
                                            
                                        />

                                        <span className="text-red-600" v-if="form.errors.file">
                                            {{ form.errors.file }}
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
                                        <BreezeLabel for="phone" value="Broj telefona" />
                                        
                                        <BreezeInput 
                                            id="phone" 
                                            type="text" 
                                            class="mt-1 block w-full" 
                                            v-model="form.phone" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.phone">
                                            {{ form.errors.phone }}
                                        </span>
                                    </div>
                                    <div className="mb-4">
                                        <BreezeLabel for="description" value="Kratki opis" />
                                        
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
                                        <BreezeLabel for="instagram" value="Instagram" />
                                        
                                        <BreezeInput 
                                            id="instagram" 
                                            type="text" 
                                            class="mt-1 block w-full" 
                                            v-model="form.instagram" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.instagram">
                                            {{ form.errors.instagram }}
                                        </span>
                                    </div>
                                    <div className="mb-4">
                                        <BreezeLabel for="facebook" value="Facebook" />
                                        
                                        <BreezeInput 
                                            id="facebook" 
                                            type="text" 
                                            class="mt-1 block w-full" 
                                            v-model="form.facebook" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.facebook">
                                            {{ form.errors.name }}
                                        </span>
                                    </div>
                                    <div className="mb-4">
                                        <BreezeLabel for="website" value="Web stranica" />                                        
                                        <BreezeInput 
                                            id="website" 
                                            type="text" 
                                            class="mt-1 block w-full" 
                                            v-model="form.website" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.website">
                                            {{ form.errors.website }}
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