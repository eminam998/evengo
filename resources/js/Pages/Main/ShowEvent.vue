<script setup>
import MainLayout from '@/Layouts/Main.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import moment from 'moment';


const props = defineProps({
  event: {
    type: Object,
    default: () => ({}),
  },
})

const form = useForm({
    email: '',

});
const submit = () => {
    form.put(route('subscribe', props.event.id));
};

function format_date(value){
         if (value) {
           return moment(String(value)).format('DD.MM.YYYY.')
          }
      }


</script>

<template>
    <Head title="Pregled događaja" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pregled događaja - {{ event.name }}
            </h2>
        </template>

        <div class="flex justify-between space-x-8 px-20">
            <div class="relative flex flex-col min-w-0 break-words w-1/2 bg-white mb-6 p-8 mx-20 shadow-xl rounded-lg mt-16">
                <img :src="event.image" class="w-full" />
            </div>
            <div class="relative flex w-1/2 flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
                <div class="px-6">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4 flex justify-center">
                    </div>
                    <div class="w-full px-4 text-center mt-8">
                    </div>
                </div>
                <div class="text-center mt-12">
                    <h3 class="text-xl font-semibold leading-normal mb-2 text-gray-700 mb-2">
                    {{event.name}}
                    </h3>
                    <hr>
                    <div class="text-sm pt-12 flex justify-center items-center space-x-4 leading-normal mt-0 mb-2 text-gray-400 font-bold uppercase">
                        <svg class="w-6 h-auto" xmlns="http://www.w3.org/2000/svg" data-name="Layer 3" viewBox="0 0 24 24" id="location"><path fill="#9ca3af" d="M12,2a8.009,8.009,0,0,0-8,8c0,3.255,2.363,5.958,4.866,8.819,0.792,0.906,1.612,1.843,2.342,2.791a1,1,0,0,0,1.584,0c0.73-.948,1.55-1.885,2.342-2.791C17.637,15.958,20,13.255,20,10A8.009,8.009,0,0,0,12,2Zm0,11a3,3,0,1,1,3-3A3,3,0,0,1,12,13Z"></path></svg>
                        {{ event.address }}, {{ event.location.name }}
                    </div>
                    <div class="mb-2 mt-4 flex items-center space-x-4 justify-center font-bold text-gray-600">
                        <svg width="25px" height="25px" class="mr-2" viewBox="-0.5 0 15 15" xmlns="http://www.w3.org/2000/svg" fill="#4b5563"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#4b5563" fill-rule="evenodd" d="M107,154.006845 C107,153.45078 107.449949,153 108.006845,153 L119.993155,153 C120.54922,153 121,153.449949 121,154.006845 L121,165.993155 C121,166.54922 120.550051,167 119.993155,167 L108.006845,167 C107.45078,167 107,166.550051 107,165.993155 L107,154.006845 Z M108,157 L120,157 L120,166 L108,166 L108,157 Z M116.5,163.5 L116.5,159.5 L115.757485,159.5 L114.5,160.765367 L114.98503,161.275112 L115.649701,160.597451 L115.649701,163.5 L116.5,163.5 Z M112.5,163.5 C113.412548,163.5 114,163.029753 114,162.362119 C114,161.781567 113.498099,161.473875 113.110266,161.433237 C113.532319,161.357765 113.942966,161.038462 113.942966,160.550798 C113.942966,159.906386 113.395437,159.5 112.505703,159.5 C111.838403,159.5 111.359316,159.761248 111.051331,160.115385 L111.456274,160.632075 C111.724335,160.370827 112.055133,160.231495 112.425856,160.231495 C112.819392,160.231495 113.13308,160.382438 113.13308,160.690131 C113.13308,160.974601 112.847909,161.102322 112.425856,161.102322 C112.28327,161.102322 112.020913,161.102322 111.952471,161.096517 L111.952471,161.839623 C112.009506,161.833817 112.26616,161.828012 112.425856,161.828012 C112.956274,161.828012 113.190114,161.967344 113.190114,162.275036 C113.190114,162.565312 112.93346,162.768505 112.471483,162.768505 C112.10076,162.768505 111.684411,162.605951 111.427757,162.327286 L111,162.87881 C111.279468,163.227141 111.804183,163.5 112.5,163.5 Z M110,152.5 C110,152.223858 110.214035,152 110.504684,152 L111.495316,152 C111.774045,152 112,152.231934 112,152.5 L112,153 L110,153 L110,152.5 Z M116,152.5 C116,152.223858 116.214035,152 116.504684,152 L117.495316,152 C117.774045,152 118,152.231934 118,152.5 L118,153 L116,153 L116,152.5 Z" transform="translate(-107 -152)"></path> </g></svg>
                        {{format_date(event.date)}}

                    </div>
                    <div class="text-sm flex justify-center items-center space-x-4 leading-normal mt-4 mb-2 text-gray-400 font-bold uppercase">
                        <svg fill="#9ca3af" width="25px" height="25px" class="mr-2" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#9ca3af"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>time</title> <path d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z"></path> </g></svg>
                        {{ event.time }}
                    </div>
                </div>
                <div class="mt-10 py-10 border-t border-gray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-9/12 px-4">
                        <p class="mb-4 text-lg leading-relaxed text-gray-700">
                            {{ event.description }}
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Container for demo purpose -->
        <div class="mb-12 pb-12">
            <div class="container my-24 mx-auto py-6 rounded-xl bg-white shadow-lg">

<!-- Section: Design Block -->
<section class="mb-4 text-gray-800 text-center">
  <div class="flex flex-wrap justify-center">
    <div class="grow-0 shrink-0 flex-basis w-full lg:w-6/12 px-3">
      <div class="p-4 bg-blue-600 rounded-full shadow-lg inline-block mb-2">
        <svg
          aria-hidden="true"
          focusable="false"
          data-prefix="fas"
          data-icon="envelope"
          class="w-5 h-5 text-white"
          role="img"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 512 512"
        >
          <path
            fill="currentColor"
            d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"
          ></path>
        </svg>
      </div>

      <h2 class="text-3xl font-bold mb-6">Prijavi se!</h2>

      <p class="text-gray-500 mb-12">Upiši svoju email adresu i dobit ćeš ulaznicu.</p>

      <form class="md:flex flex-row"  @submit.prevent="submit">
        <input
          type="text"
          class="form-control block w-full px-4 py-2 mb-2 md:mb-0 md:mr-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
          placeholder="Email adresa"
          v-model="form.email" 

        />
        <button
          type="submit"
          class="inline-block px-4 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
          data-mdb-ripple="true"
          data-mdb-ripple-color="light"
        >
          Prijava
        </button>
    </form>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

</div>

        </div>
<!-- Container for demo purpose -->
    </MainLayout>
</template>