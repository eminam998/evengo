<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedAdmin.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeTextArea from '@/Components/Textarea.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
const props = defineProps({
    news: Object,
});
const form = useForm({
    _method: "PUT",
    title: props.news.title,
    description: props.news.description,
    image: props.news.image
});
const submit = () => {
    form.post(route('news.update', props.news.id), {
        forceFormData: true,
    });
};

</script>
<template>
    <Head title="Uredi novost" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Uredi novost - {{ news.title }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                :href="route('news.index')"
                            >
                                Nazad
                            </Link>
                        </div>
                        <form name="createForm" @submit.prevent="submit">
                                <div className="flex flex-col">
                                    <div className="mb-4">
                                        <BreezeLabel for="title" value="Naslov" />
                                        
                                        <BreezeInput 
                                            id="title" 
                                            type="text" 
                                            class="mt-1 block w-full" 
                                            v-model="form.title" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.title">
                                            {{ form.errors.title }}
                                        </span>
                                    </div>
                                    <div class="pb-4">
                                        <img :src="news.image" width="50" />
                                        </div>
                                    <div class="mb-4">
                                        
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
                                        <BreezeLabel for="description" value="Sadržaj" />
                                        
                                        <BreezeTextArea 
                                            id="description" 
                                            class="mt-1 block w-full" 
                                            v-model="form.description" 
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.description">
                                            {{ form.errors.description }}
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