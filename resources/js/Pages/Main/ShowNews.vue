<script setup>
import MainLayout from '@/Layouts/Main.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import moment from 'moment';


const props = defineProps({
  news: {
    type: Object,
    default: () => ({}),
  },
  allNews: {
    type: Object,
    default: () => ({}),
  },
  images: {
    type: Object,
    default: () => ({}),
  },
})


function format_date(value){
         if (value) {
           return moment(String(value)).format('DD.MM.YYYY.')
          }
      }


</script>

<template>
    <Head title="Pregled novosti" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pregled novosti - {{ news.title }}
            </h2>
        </template>

        <div class="container py-24 px-6 mx-auto">

            <!-- Section: Design Block -->
            <section class="mb-32 text-gray-800">
            <h2 class="text-2xl font-bold mb-12 text-center">{{ news.title }}</h2>
            <p class="text-gray-500 mb-6 text-center">
                    Objavio <u class="mr-2">{{format_date(news.created_at)}}    </u>  
                    <a :href="route('company.about', news.company.id)" class="text-gray-900">  {{news.company.name}}</a>
                </p>

            <div class="flex flex-wrap mb-12">
                <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 lg:pr-6 mb-6 lg:mb-0">
                <div class="relative overflow-hidden bg-no-repeat bg-cover ripple shadow-lg rounded-lg"
                    style="background-position: 50%" data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <img :src="news.image" class="w-full" alt="Louvre" />
                    <a href="#!">
                    <div
                        class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
                        style="background-color: rgba(251, 251, 251, 0.2)"></div>
                    </a>
                </div>
                </div>

                <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 lg:pl-6">
                <p class="text-gray-500 mb-6">
                    {{news.description}}
                </p>
                </div>
            </div>
            <h2 class="text-2xl font-bold mb-12 text-center">Galerija</h2>
            <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
                <div class="-m-1 flex flex-wrap md:-m-2">
                    <div v-for="image in news.images" :key="image" class="flex w-1/3 flex-wrap">
                    <div class="w-full p-1 md:p-2">
                        <img
                        alt="gallery"
                        class="block h-full w-full rounded-lg object-cover object-center"
                        :src="image" />
                    </div>
                    </div>
                </div>
                </div>
                <div class="relative flex flex-col min-w-0 break-words mb-6 p-8 mx-20 mt-16">
                <h2 class="text-xl font-bold mb-2">Ostale vijesti od kompanije - {{ news.company.name }}</h2>
                <hr class="bg-grey-400 mb-10">
                <div class="flex space-x-8">
                    <div v-for="n in allNews" :key="n.id"
                    class="block rounded-lg bg-white w-1/5 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                    <a :href="route('view-news', n.id)" class="w-1/5 h-48">
                        <img
                        class="rounded-t-lg object-cover"
                        :src="n.image"
                        alt="" />
                    </a>
                    <div class="p-6">
                        <h5
                        class="mb-2 text-xl font-medium leading-tight text-gray-800">
                        {{n.title}}
                        </h5>
                        <p class="mb-4 text-base text-gray-600">
                            {{ n.description.substring(0,100)+"..." }}
                        </p>
                    </div>
                </div>
                </div>

            </div>

            </section>
            <!-- Section: Design Block -->

        </div>
    </MainLayout>
</template>