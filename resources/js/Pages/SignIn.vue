<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
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
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
    company_name: '',
    description: '',
    address: '',
    phone: '',
    category_id: '',
    location_id: '',
    file: null
});

const submit = () => {
    form.post(route('send.request'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Register your company" />

        <form @submit.prevent="submit">
            <div class="flex space-x-4 w-100">
                <div class="w-1/2">
                    <div>
                        <BreezeLabel for="name" value="Name" />
                        <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                        <BreezeInputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="email" value="Email" />
                        <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
                        <BreezeInputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="password" value="Password" />
                        <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                        <BreezeInputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="password_confirmation" value="Confirm Password" />
                        <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                        <BreezeInputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>
                </div>
                <div class="w-1/2">
                    <div className="mb-4">
                        <BreezeLabel for="company_name" value="Company Name" />
                        
                        <BreezeInput 
                            id="company_name" 
                            type="text" 
                            class="mt-1 block w-full" 
                            v-model="form.company_name" 
                            autofocus />
                        <span className="text-red-600" v-if="form.errors.company_name">
                            {{ form.errors.company_name }}
                        </span>
                    </div>

                    <div className="mb-4">

                        <BreezeLabel for="file" value="File" />

                        <input
                            id="file"
                            type="file"
                            name="file"
                            
                            @input = "form.file = $event.target.files[0] || $event.dataTransfer.files"
                            
                        />

                        <span className="text-red-600" v-if="form.errors.file">
                            {{ form.errors.file }}
                        </span>
                        
                    </div>
                    <div className="mb-4">
                        <BreezeLabel for="address" value="Address" />
                        
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
                        <BreezeLabel for="phone" value="Phone" />
                        
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
                        <BreezeLabel for="description" value="Description" />
                        
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
                        <BreezeLabel for="category_id" value="Category" />
                        
                        <select v-model="form.category_id" class="mt-1 block w-full">
                        <option>Please Select</option>
                        <option :value="category.id" v-for="(category, i) in categories" :key="i">{{category.id}} - {{ category.title }}</option>
                        </select>
                        <span className="text-red-600" v-if="form.errors.category_id">
                            {{ form.errors.category_id }}
                        </span>
                    </div>
                    <div className="mb-4">
                        <BreezeLabel for="location_id" value="Location" />
                        
                        <select v-model="form.location_id" class="mt-1 block w-full">
                        <option>Please Select</option>
                        <option :value="location.id" v-for="(location, i) in locations" :key="i">{{location.id}} - {{ location.name }}</option>
                        </select>
                        <span className="text-red-600" v-if="form.errors.location_id">
                            {{ form.errors.location_id }}
                        </span>
                    </div>
                </div>

            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link>

                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
