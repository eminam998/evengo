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
    instagram: '',
    twitter: '',
    facebook: '',
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
        <Head title="Registrirajte Vašu kompaniju" />

        <form @submit.prevent="submit">
            <div class="flex space-x-8 mb-4">
                <div class="w-1/2">
                    <div class="pb-4 space-y-2">
                        <h2>Lični podaci</h2>
                        <hr>
                    </div>
                    
                    <div>
                        <BreezeLabel for="name" value="Ime i prezime" />
                        <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                        <BreezeInputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="email" value="Email adresa" />
                        <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
                        <BreezeInputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="password" value="Lozinka" />
                        <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                        <BreezeInputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="password_confirmation" value="Potvrda lozinke" />
                        <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                        <BreezeInputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="pb-4 space-y-2">
                        <h2>Podaci o kompaniji</h2>
                        <hr>
                    </div>
                    <div className="mb-4">
                        <BreezeLabel for="company_name" value="Naziv kompanije" />
                        
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
                        <BreezeLabel for="description" value="Kratki opis kompanije" />
                        
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
                        <option>Molimo odaberite</option>
                        <option :value="location.id" v-for="(location, i) in locations" :key="i">{{ location.name }}</option>
                        </select>
                        <span className="text-red-600" v-if="form.errors.location_id">
                            {{ form.errors.location_id }}
                        </span>
                    </div>
                    <div class="mt-4">
                        <BreezeLabel for="instagram" value="Instagram" />
                        <BreezeInput id="instagram" type="text" class="mt-1 block w-full" v-model="form.instagram" required autocomplete="instagram" />
                        <BreezeInputError class="mt-2" :message="form.errors.instagram" />
                    </div>
                    <div class="mt-4">
                        <BreezeLabel for="facebook" value="Facebook" />
                        <BreezeInput id="facebook" type="text" class="mt-1 block w-full" v-model="form.facebook" required autocomplete="facebook" />
                        <BreezeInputError class="mt-2" :message="form.errors.facebook" />
                    </div>
                    <div class="mt-4">
                        <BreezeLabel for="twitter" value="Twitter" />
                        <BreezeInput id="twitter" type="text" class="mt-1 block w-full" v-model="form.twitter" required autocomplete="twitter" />
                        <BreezeInputError class="mt-2" :message="form.errors.twitter" />
                    </div>
                </div>

            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-blue-600 hover:text-blue-900">
                    Već registrovani?
                </Link>

                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registrirajte se
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
