<script setup>
import MainLayout from '@/Layouts/Main.vue';
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { watch } from "vue";
import { ref } from "vue";
import Pagination from '@/Components/Pagination.vue';
import moment from 'moment';

  
const props = defineProps({
    news: {
        type: Object,
        default: () => ({}),
    },
    companies: {
        type: Object,
        default: () => ({}),
    },
    filters: Object,
});
const search = ref('');
const byCompany = ref('all');
watch(search, (value) => {
  Inertia.get(
    "/news",
    { search: value, byCompany: byCompany.value },
    {
      preserveState: true,
      replace: true,
    }
  );
});
function getTags() {
  Inertia.get(
    "/news",
    { byCompany: byCompany.value, search: search.value },
    {
      preserveState: true,
      replace: true,
    }
  );
}


function format_date(value){
         if (value) {
           return moment(String(value)).format('DD.MM.YYYY.')
          }
      }

</script>


<template>
    <Head title="Sve vijesti" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Vijesti
            </h2>
        </template>

        
            <!-- Container for demo purpose -->
            <div class="container py-24 px-6 mx-auto">

            <!-- Section: Design Block -->
            <section class="mb-32 text-gray-800 text-center md:text-left">

            <h2 class="text-3xl font-bold mb-12 text-center">Vijesti</h2>
            <div class='max-w-md mx-auto mb-8'>
                <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                    <div class="grid ml-2 place-items-center h-full w-12 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <input
                    class="peer h-full w-full border-none outline-none text-sm text-gray-700 pr-4"
                    type="text"
                    id="search"
                    v-model="search"
                    placeholder="Pretraži vijesti.." /> 
                    <select
                    v-model="byCompany"
                    @change="getTags"
                    class="
                        px-4
                        py-3
                        w-96
                        rounded-lg
                        bg-white
                        border-transparent
                        focus-within:shadow-lg
                        text-sm
                    "
                    >
                    <option value="all">Sve kompanije</option>
                    <option v-for="company in companies" :key="company.id" :value="company.id">{{company.name}}</option>
                    </select>
                </div>
            </div>

            <div v-for="n in news.data" :key="n.id" class="flex flex-wrap mb-6">
                <div class="grow-0 shrink-0 basis-auto w-full md:w-3/12 px-3 mb-6 md:mb-0 ml-auto">
                <div
                    class="relative overflow-hidden bg-no-repeat bg-cover relative overflow-hidden bg-no-repeat bg-cover ripple shadow-lg rounded-lg mb-6"
                    data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <img :src="n.image"
                    class="w-full" alt="" />
                    <a :href="route('view-news', n.id)">
                    <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
                        style="background-color: rgba(251, 251, 251, 0.2)"></div>
                    </a>
                </div>
                </div>

                <div class="grow-0 shrink-0 basis-auto w-full md:w-9/12 xl:w-7/12 px-3 mb-6 md:mb-0 mr-auto">
                <h5 class="text-lg font-bold mb-3">{{ n.title }}</h5>
                <p class="text-gray-500 mb-6">
                    <small>Objavio <u>{{format_date(n.created_at)}}    </u>  
                    <a :href="route('company.about', n.company.id)" class="text-gray-900">{{n.company.name}}</a></small>
                </p>
                <p class="text-gray-500">
                    {{ n.description.substring(0,100)+"..." }}
                </p>
                </div>
            </div>
            <Pagination class="mt-6" :links="news.links" />

            </section>
            <!-- Section: Design Block -->

            </div>
            <!-- Container for demo purpose -->


    </MainLayout>
</template>