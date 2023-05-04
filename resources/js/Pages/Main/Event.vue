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
    events: {
        type: Object,
        default: () => ({}),
    },
    categories: {
        type: Object,
        default: () => ({}),
    },
    locations: {
        type: Object,
        default: () => ({}),
    },
    filters: Object,
});
const search = ref('');
const byCategory = ref('all');
const byLocation = ref('');
watch(search, (value) => {
  Inertia.get(
    "/event",
    { search: value, byCategory: byCategory.value, byLocation: byLocation.value },
    {
      preserveState: true,
      replace: true,
    }
  );
});
function getTags() {
  Inertia.get(
    "/event",
    { byCategory: byCategory.value, byLocation: byLocation.value, search: search.value },
    {
      preserveState: true,
      replace: true,
    }
  );
}

function getByLocation() {
  Inertia.get(
    "/event",
    { byCategory: byCategory.value, byLocation: byLocation.value, search: search.value },
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
    <Head title="Svi događaji" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Događaji
            </h2>
        </template>

        
            <!-- Container for demo purpose -->
            <div class="container py-24 px-6 mx-auto">

            <!-- Section: Design Block -->
            <section class="mb-32 text-gray-800 text-center md:text-left">

            <h2 class="text-3xl font-bold mb-12 text-center">Događaji</h2>
            <div class='mx-auto mb-8'>
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
                    placeholder="Pretraži događaje.." /> 
                    <select
                    v-model="byLocation"
                    @change="getByLocation"
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
                    <option value="">Sve lokacije</option>
                    <option v-for="location in locations" :key="location.id" :value="location.id">{{location.name}}</option>
                    </select>
                    <select
                    v-model="byCategory"
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
                    <option value="all">Sve kategorije</option>
                    <option v-for="category in categories" :key="category.id" :value="category.id">{{category.title}}</option>
                    </select>
                </div>
            </div>

<div class="grid lg:grid-cols-3 gap-6">
  <div v-for="n in events.data" :key="n.id"  class="relative overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-lg"
    style="background-position: 50%;" data-mdb-ripple="true" data-mdb-ripple-color="light">
    <img :src="n.image" class="w-full" />
    <a :href="route('view-event', n.id)">
      <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
        style="background-color: rgba(0, 0, 0, 0.4)">
        <div class="flex justify-start items-end h-full">
          <div class="text-white m-6">
            <h5 class="font-bold text-lg mb-3">{{n.name}}</h5>
            <p>
              <small>Održava se <u>{{n.date}}</u></small>
            </p>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>
<Pagination class="mt-6" :links="events.links" />

</section>
            </div>
            <!-- Container for demo purpose -->


    </MainLayout>
</template>