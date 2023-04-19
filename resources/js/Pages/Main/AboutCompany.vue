<script setup>
import MainLayout from '@/Layouts/Main.vue';
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { watch } from "vue";
import { ref } from "vue";
import moment from 'moment';
  
const props = defineProps({
    company: {
        type: Object,
        default: () => ({}),
    },
    news: {
        type: Object,
        default: () => ({}),
    },
    events: {
        type: Object,
        default: () => ({}),
    },
    newsCount: {
        type: Number,
        default: 0,
    },
    eventsCount: {
        type: Number,
        default: 0,
    },
});    


function format_date(value){
         if (value) {
           return moment(String(value)).format('DD.MM.YYYY.')
          }
      }
 

</script>

<template>
    <Head title="O kompaniji" />

    <MainLayout>
        <section class="py-16 bg-blueGray-50">
            <h2 class="text-3xl font-bold text-center">Podaci o kompaniji - {{ company.name }}</h2>
            <div class="flex justify-between space-x-8 px-20">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
                <div class="px-6">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4 flex justify-center">
                    <div class="relative pt-8 flex justify-center">
                            <img alt="..." :src="company.logo" class="object-contain w-64 h-auto">                       
                    </div>
                    </div>
                    <div class="w-full px-4 text-center mt-8">
                    <div class="flex justify-center py-4 lg:pt-4 pt-8">
                        <div class="mr-4 p-3 text-center">
                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                            {{newsCount}}
                        </span>
                        <span class="text-sm text-gray-400">Vijesti</span>
                        </div>
                        <div class="mr-4 p-3 text-center">
                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                            {{eventsCount}}
                        </span>
                        <span class="text-sm text-gray-400">Događaji</span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="text-center mt-12">
                    <h3 class="text-xl font-semibold leading-normal mb-2 text-gray-700 mb-2">
                    {{company.name}}
                    </h3>
                    <div class="text-sm flex justify-center items-center space-x-4 leading-normal mt-0 mb-2 text-gray-400 font-bold uppercase">
                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" data-name="Layer 3" viewBox="0 0 24 24" id="location"><path fill="#9ca3af" d="M12,2a8.009,8.009,0,0,0-8,8c0,3.255,2.363,5.958,4.866,8.819,0.792,0.906,1.612,1.843,2.342,2.791a1,1,0,0,0,1.584,0c0.73-.948,1.55-1.885,2.342-2.791C17.637,15.958,20,13.255,20,10A8.009,8.009,0,0,0,12,2Zm0,11a3,3,0,1,1,3-3A3,3,0,0,1,12,13Z"></path></svg>
                    {{company.address}}, {{company.location.name}}
                    </div>
                    <div class="mb-2 flex items-center justify-center space-x-2  my-10">
                        <a :href="company.instagram"><svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" data-name="Layer 1" viewBox="0 0 24 24" id="instagram"><path fill="#1f2937" d="M12,9.52A2.48,2.48,0,1,0,14.48,12,2.48,2.48,0,0,0,12,9.52Zm9.93-2.45a6.53,6.53,0,0,0-.42-2.26,4,4,0,0,0-2.32-2.32,6.53,6.53,0,0,0-2.26-.42C15.64,2,15.26,2,12,2s-3.64,0-4.93.07a6.53,6.53,0,0,0-2.26.42A4,4,0,0,0,2.49,4.81a6.53,6.53,0,0,0-.42,2.26C2,8.36,2,8.74,2,12s0,3.64.07,4.93a6.86,6.86,0,0,0,.42,2.27,3.94,3.94,0,0,0,.91,1.4,3.89,3.89,0,0,0,1.41.91,6.53,6.53,0,0,0,2.26.42C8.36,22,8.74,22,12,22s3.64,0,4.93-.07a6.53,6.53,0,0,0,2.26-.42,3.89,3.89,0,0,0,1.41-.91,3.94,3.94,0,0,0,.91-1.4,6.6,6.6,0,0,0,.42-2.27C22,15.64,22,15.26,22,12S22,8.36,21.93,7.07Zm-2.54,8A5.73,5.73,0,0,1,19,16.87,3.86,3.86,0,0,1,16.87,19a5.73,5.73,0,0,1-1.81.35c-.79,0-1,0-3.06,0s-2.27,0-3.06,0A5.73,5.73,0,0,1,7.13,19a3.51,3.51,0,0,1-1.31-.86A3.51,3.51,0,0,1,5,16.87a5.49,5.49,0,0,1-.34-1.81c0-.79,0-1,0-3.06s0-2.27,0-3.06A5.49,5.49,0,0,1,5,7.13a3.51,3.51,0,0,1,.86-1.31A3.59,3.59,0,0,1,7.13,5a5.73,5.73,0,0,1,1.81-.35h0c.79,0,1,0,3.06,0s2.27,0,3.06,0A5.73,5.73,0,0,1,16.87,5a3.51,3.51,0,0,1,1.31.86A3.51,3.51,0,0,1,19,7.13a5.73,5.73,0,0,1,.35,1.81c0,.79,0,1,0,3.06S19.42,14.27,19.39,15.06Zm-1.6-7.44a2.38,2.38,0,0,0-1.41-1.41A4,4,0,0,0,15,6c-.78,0-1,0-3,0s-2.22,0-3,0a4,4,0,0,0-1.38.26A2.38,2.38,0,0,0,6.21,7.62,4.27,4.27,0,0,0,6,9c0,.78,0,1,0,3s0,2.22,0,3a4.27,4.27,0,0,0,.26,1.38,2.38,2.38,0,0,0,1.41,1.41A4.27,4.27,0,0,0,9,18.05H9c.78,0,1,0,3,0s2.22,0,3,0a4,4,0,0,0,1.38-.26,2.38,2.38,0,0,0,1.41-1.41A4,4,0,0,0,18.05,15c0-.78,0-1,0-3s0-2.22,0-3A3.78,3.78,0,0,0,17.79,7.62ZM12,15.82A3.81,3.81,0,0,1,8.19,12h0A3.82,3.82,0,1,1,12,15.82Zm4-6.89a.9.9,0,0,1,0-1.79h0a.9.9,0,0,1,0,1.79Z"></path></svg></a>
                        <a :href="company.facebook"><svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" data-name="Ebene 1" viewBox="0 0 1024 1024" id="facebook-logo-2019"><path fill="#1f2937" d="M1024,512C1024,229.23016,794.76978,0,512,0S0,229.23016,0,512c0,255.554,187.231,467.37012,432,505.77777V660H302V512H432V399.2C432,270.87982,508.43854,200,625.38922,200,681.40765,200,740,210,740,210V336H675.43713C611.83508,336,592,375.46667,592,415.95728V512H734L711.3,660H592v357.77777C836.769,979.37012,1024,767.554,1024,512Z"></path><path fill="#fff" d="M711.3,660,734,512H592V415.95728C592,375.46667,611.83508,336,675.43713,336H740V210s-58.59235-10-114.61078-10C508.43854,200,432,270.87982,432,399.2V512H302V660H432v357.77777a517.39619,517.39619,0,0,0,160,0V660Z"></path></svg></a>
                        <a :href="company.twitter"><svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" data-name="Layer 1" viewBox="0 0 24 24" id="twitter"><path fill="#1f2937" d="M22,5.8a8.49,8.49,0,0,1-2.36.64,4.13,4.13,0,0,0,1.81-2.27,8.21,8.21,0,0,1-2.61,1,4.1,4.1,0,0,0-7,3.74A11.64,11.64,0,0,1,3.39,4.62a4.16,4.16,0,0,0-.55,2.07A4.09,4.09,0,0,0,4.66,10.1,4.05,4.05,0,0,1,2.8,9.59v.05a4.1,4.1,0,0,0,3.3,4A3.93,3.93,0,0,1,5,13.81a4.9,4.9,0,0,1-.77-.07,4.11,4.11,0,0,0,3.83,2.84A8.22,8.22,0,0,1,3,18.34a7.93,7.93,0,0,1-1-.06,11.57,11.57,0,0,0,6.29,1.85A11.59,11.59,0,0,0,20,8.45c0-.17,0-.35,0-.53A8.43,8.43,0,0,0,22,5.8Z"></path></svg></a>
                    </div>
                    <div class="mb-2 mt-4 flex items-center space-x-4 justify-center font-bold text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-auto" id="phone" x="0" y="0" version="1.1" viewBox="0 0 29 29" xml:space="preserve"><path fill="#4b5563" d="m20.914 17.743-2.091 1.178a1.319 1.319 0 0 1-1.58-.217l-6.979-6.979a1.32 1.32 0 0 1-.217-1.58l1.178-2.091a1.978 1.978 0 0 0-.325-2.37L7.766 2.55a1.978 1.978 0 0 0-2.798 0L3.545 3.972a5.276 5.276 0 0 0-.793 6.446l.714 1.19a41.36 41.36 0 0 0 14.946 14.631l.141.081c2.102 1.201 4.699.851 6.382-.831l1.486-1.486a1.978 1.978 0 0 0 0-2.798l-3.136-3.136a1.978 1.978 0 0 0-2.371-.326z"></path></svg>
                    {{company.phone}}
                    </div>
                </div>
                <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-9/12 px-4">
                        <p class="mb-4 text-lg leading-relaxed text-gray-700">
                        {{company.description}}
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full p-8 mb-6 shadow-xl rounded-lg mt-16">
                <h2 class="text-3xl font-bold mb-12 text-center">Najnoviji članci</h2>

                <div v-for="n in news" :key="n.id" class="flex flex-wrap mb-6">
                    <div class="grow-0 shrink-0 basis-auto w-full md:w-3/12 px-3 mb-6 md:mb-0 ml-auto">
                        <div
                        class="relative overflow-hidden bg-no-repeat bg-cover relative overflow-hidden bg-no-repeat bg-cover ripple shadow-lg rounded-lg mb-6"
                        data-mdb-ripple="true" data-mdb-ripple-color="light">
                        <img :src="n.image"
                            class="w-full" />
                        <a :href="route('view-news', n.id)">
                            <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
                            style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                        </div>
                    </div>

                    <div class="grow-0 shrink-0 basis-auto w-full md:w-9/12 xl:w-7/12 px-3 mb-6 md:mb-0 mr-auto">
                        <h5 class="text-lg font-bold mb-3">{{n.title}}</h5>
                        <p class="text-gray-500 mb-6">
                        <small>Objavljeno <u>{{format_date(n.created_at)}}</u></small>
                        </p>
                        <p class="text-gray-500">
                            {{ n.description.substring(0,100)+"..." }}
                        </p>
                    </div>
                </div>
            </div>
            </div>

            <div class="relative flex flex-col min-w-0 break-words bg-white mb-6 p-8 mx-20 shadow-xl rounded-lg mt-16">
                <h2 class="text-xl font-bold mb-2">Najnoviji događaji</h2>
                <hr class="bg-grey-400 mb-10">
                <div class="flex space-x-8">
                    <div v-for="event in events" :key="event.id"
                    class="block rounded-lg bg-white w-1/5 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                    <a href="#!" class="w-1/5 h-48">
                        <img
                        class="rounded-t-lg object-cover"
                        :src="event.image"
                        alt="" />
                    </a>
                    <div class="p-6">
                        <h5
                        class="mb-2 text-xl font-medium leading-tight text-gray-800">
                        {{event.name}}
                        </h5>
                        <p class="mb-4 text-base text-gray-600">
                            {{ event.description.substring(0,100)+"..." }}
                        </p>
                        <button
                        type="button"
                        class="inline-block rounded bg-blue-400 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"                    data-te-ripple-init
                        data-te-ripple-color="light">
                        VIŠE
                        </button>
                    </div>
                </div>
                </div>

            </div>


        </section>

    </MainLayout>
    
</template>