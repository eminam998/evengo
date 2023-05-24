<script setup>
import MainLayout from '@/Layouts/Main.vue';
import { Head } from '@inertiajs/inertia-vue3';
import moment from 'moment';

const props = defineProps({
    companyCount: {
        type: Number,
        default: 0,
    },
    newsCount: {
        type: Number,
        default: 0,
    },
    eventCount: {
        type: Number,
        default: 0,
    },
    companies: {
    type: Object,
    default: () => ({}),
  },
  events: {
    type: Object,
    default: () => ({}),
  },
  news: {
    type: Object,
    default: () => ({}),
  },
});


function format_date(value){
         if (value) {
           return moment(String(value)).format('DD.MM.YYYY.')
          }
      }
</script>

<template>
    <Head title="Dashboard" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <!-- Jumbotron -->
            <div
            class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat p-12 text-center"
            style="background-image: url('https://media.istockphoto.com/id/1281724535/photo/large-group-of-business-people-in-convention-centre.jpg?b=1&s=170667a&w=0&k=20&c=4-Ui5X7T1C5NIuYYJA1tGtnuFGyXePhvbwDodx7wWUI=');background-position-y: center ; height: 500px; background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;">
            <div
                class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
                style="background-color: rgba(0, 0, 0, 0.6)">
                <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <h2 class="mb-4 text-4xl font-semibold">eveNGO™</h2>
                    <h4 class="mb-6 text-xl font-semibold">Svi događaji na jednom mjestu</h4>
                    <a
                    :href="route('all-events')"
                    type="button"
                    class="rounded border-2 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    Saznaj više
                </a>
                </div>
                </div>
            </div>
            </div>
            <!-- Jumbotron -->
            <!-- Container for demo purpose -->
<div class="container my-24 px-6 mx-auto">

<!-- Section: Design Block -->
<section class="mb-32 text-gray-800 text-center">
  <h2 class="text-3xl font-bold mb-20">Šta nudimo?</h2>

  <div class="grid lg:gap-x-12 lg:grid-cols-3">
    <div class="mb-12 lg:mb-0">
      <div class="rounded-lg shadow-lg h-full block bg-white">
        <div class="flex justify-center">
          <div class="p-4 bg-blue-600 rounded-full shadow-lg inline-block -mt-8">
            <svg width="64px" height="64px" viewBox="0 0 24 24" id="company-small-24px" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="company-small-24px-2" data-name="company-small-24px" d="M16,4H2A2.006,2.006,0,0,0,0,6V24H18V6A2.006,2.006,0,0,0,16,4ZM8,22V18h2v4Zm8,0H12V17a.945.945,0,0,0-1-1H7a.945.945,0,0,0-1,1v5H2V6H16ZM8,10H6V8H8Zm4,0H10V8h2ZM8,14H6V12H8Zm4,0H10V12h2Z" transform="translate(3 -2)"></path> <rect id="Retângulo_222" data-name="Retângulo 222" width="24" height="24" fill="none" opacity="0"></rect> </g></svg>
          </div>
        </div>
        <div class="p-6">
          <h3 class="text-2xl font-bold text-blue-600 mb-4">{{companyCount}}</h3>
          <h5 class="text-lg font-medium mb-4">Organizacije</h5>
          <p class="text-gray-500">
            Broj organizacija registriranih na eveNGO™
          </p>
        </div>
      </div>
    </div>

    <div class="mb-12 lg:mb-0">
      <div class="rounded-lg shadow-lg h-full block bg-white">
        <div class="flex justify-center">
          <div class="p-4 bg-blue-600 rounded-full shadow-lg inline-block -mt-8">
            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_429_11031)"> <path d="M3 4V18C3 19.1046 3.89543 20 5 20H17H19C20.1046 20 21 19.1046 21 18V8H17" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M3 4H17V18C17 19.1046 17.8954 20 19 20V20" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 8L7 8" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 12L9 12" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> </g> <defs> <clipPath id="clip0_429_11031"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g></svg>
          </div>
        </div>
        <div class="p-6">
          <h3 class="text-2xl font-bold text-blue-600 mb-4">{{ newsCount }}</h3>
          <h5 class="text-lg font-medium mb-4">Novosti</h5>
          <p class="text-gray-500">
            Ukupan broj novosti koji su organizacije napisale
          </p>
        </div>
      </div>
    </div>

    <div class="">
      <div class="rounded-lg shadow-lg h-full block bg-white">
        <div class="flex justify-center">
          <div class="p-4 bg-blue-600 rounded-full shadow-lg inline-block -mt-8">
            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" width="64px" height="64px" viewBox="0 0 30 30" version="1.1" id="svg822" inkscape:version="0.92.4 (f8dce91, 2019-08-02)" sodipodi:docname="event.svg" fill="#ffffff" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs id="defs816"></defs> <sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#ffffff" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="17.833333" inkscape:cx="4.4733517" inkscape:cy="14.994233" inkscape:document-units="px" inkscape:current-layer="layer1" showgrid="true" units="px" inkscape:window-width="1366" inkscape:window-height="713" inkscape:window-x="0" inkscape:window-y="0" inkscape:window-maximized="1" inkscape:lockguides="true"> <inkscape:grid type="xygrid" id="grid816"></inkscape:grid> </sodipodi:namedview> <metadata id="metadata819"> <rdf:rdf> <cc:work rdf:about=""> <dc:format>image/svg+xml</dc:format> <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type> <dc:title> </dc:title> </cc:work> </rdf:rdf> </metadata> <g inkscape:label="Layer 1" inkscape:groupmode="layer" id="layer1" transform="translate(0,-289.0625)"> <path style="color:#ffffff;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#ffffff;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;opacity:1;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#ffffff;solid-opacity:1;vector-effect:none;fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.99999976;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate" d="M 9 4 L 9 7 L 7 7 C 5.3552974 7 4 8.3553 4 10 L 4 24 C 4 25.6447 5.3552974 27 7 27 L 23 27 C 24.644703 27 26 25.6447 26 24 L 26 10 C 26 8.3553 24.644703 7 23 7 L 21 7 L 21 4 L 19 4 L 19 7 L 11 7 L 11 4 L 9 4 z M 7 9 L 23 9 C 23.571297 9 24 9.4287 24 10 L 24 24 C 24 24.5713 23.571297 25 23 25 L 7 25 C 6.4287028 25 6 24.5713 6 24 L 6 10 C 6 9.4287 6.4287028 9 7 9 z M 17 17 C 16.446 17 16 17.446 16 18 L 16 22 C 16 22.554 16.446 23 17 23 L 21 23 C 21.554 23 22 22.554 22 22 L 22 18 C 22 17.446 21.554 17 21 17 L 17 17 z " transform="translate(0,289.0625)" id="rect894"></path> <g id="g825" transform="translate(0,1)" style="fill:#ffffff"></g> </g> </g></svg>
          </div>
        </div>
        <div class="p-6">
          <h3 class="text-2xl font-bold text-blue-600 mb-4">{{eventCount}}</h3>
          <h5 class="text-lg font-medium mb-4">Događaja</h5>
          <p class="text-gray-500">
            Ukupan broj događaja koji organizacije organizuju
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

 <!-- Section: Design Block -->
 <section class="mb-32 text-gray-800">
    <div class="block rounded-lg shadow-lg bg-white">
      <div class="flex flex-wrap items-center">
        <div class="hidden lg:flex grow-0 shrink-0 basis-auto lg:w-6/12 xl:w-4/12">
          <img src="https://localist-images.azureedge.net/photos/42774580636891/huge/128dde5169e6656d36d709fc65911724748cf921.jpg" alt="Trendy Pants and Shoes"
            class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />
        </div>
        <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 xl:w-8/12">
          <div class="px-6 py-12 md:px-12">
            <h2 class="text-2xl font-bold mb-4">Ko smo mi?</h2>
            <p class="text-gray-500 mb-6">
              eveNGO™ je platforma koja omogućuje nevladinim organizacijama objavljivanje sadržaja na jednom mjestu. Nevladine organizacije
        putem ove platforme mogu objavljivati novosti i događaje vezane za njihovo poslovanje. eveNGO™ kao platforma je nastala 2023. godine kao diplomski projekat jedne studentice, te je iz toga izrasla 
        u veliku platformu sa preko 1000 nevladinih organizacija koje svakodnevno objavljuju željeni sadržaj.
            </p>
            <p class="text-gray-500">
              Cilj eveNGO™ platforme jeste omogućiti krajnjem korisniku pregled svih nevladinih organizacija unutar teritorija Bosne i Hercegovine
        na jednom mjestu. Također, eveNGO™ platforma krajnjem događaju omogućuje pregled najnovijih događaja koje organizuju nevladine organizacije
        u ovisnosti od kategorije i lokacije koja ih zanima. Na iste događaje korisnik se može jednostavno i besplatno prijaviti. Također, korisnik može pročitati
        nešto više o svakoj organizaciji koja surađuje sa eveNGO™ platformom, te pročitati i novosti, kako bi se više informirao o radu i cilju svake organizacije.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->

  <section class="my-32 pb-32 text-gray-800 text-center">
    <h2 class="text-3xl font-bold mb-12">Organizacije koje nam vjeruju</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 items-center">
      <div class="mb-12 lg:mb-0" v-for="company in companies" :key="company.id">
        <img
          :src="company.logo"
          class="img-fluid grayscale px-6 md:px-12"
          alt="Nasa - logo"
        />
      </div>
    </div>
  </section>

</div>

  <!-- Container for demo purpose -->
  <div class="mb-24 w-full">

<!-- Section: Design Block -->
<section class="text-gray-800 text-center lg:text-left background-radial-gradient">

  <div class="relative overflow-hidden bg-no-repeat bg-cover" style="
        background-position: 50%;
        background-image: url('https://images.unsplash.com/photo-1565130936029-a26a11ecc813?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fGJ1c2luZXNzJTIwZXZlbnR8ZW58MHx8MHx8&w=1000&q=80');
        height: 500px;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      ">
    <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
      style="background-color: rgba(0, 0, 0, 0.75)">
      <div class="flex justify-center items-center h-full">
        <div class="text-center text-white px-6 py-6 md:py-0 md:px-12 max-w-[800px]">
          <h2 class="text-5xl md:text-6xl xl:text-7xl font-bold tracking-tight leading-tight mb-12">
            Prijavite se <br /><span>na događaje
            </span>
          </h2>
          <p class="text-lg">
            eveNGO™ nudi događaje različitih tematika širom Bosne i Hercegovine
          </p>

        </div>
      </div>
    </div>
  </div>

</section>
<!-- Section: Design Block -->

</div>

<div class="container py-12 px-6 mx-auto">
  <div class="flex justify-between items-center">
    <h2 class="text-3xl font-bold mb-10">Najnoviji događaji</h2>
    <a :href="route('all-events')" class="text-lg font-bold text-blue-500 mb-10">Pogledaj sve</a>

  </div>
  <div class="grid lg:grid-cols-3 gap-6">
  <div v-for="n in events" :key="n.id"  class="relative w-full h-full overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-lg"
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
</div>

<div class="mb-24 w-full">

<!-- Section: Design Block -->
<section class="text-gray-800 text-center lg:text-left background-radial-gradient">

  <div class="relative overflow-hidden bg-no-repeat bg-cover" style="
        background-position: 50%;
        background-image: url('https://www.wealthmanagement.com/sites/wealthmanagement.com/files/styles/article_featured_retina/public/uploads/2016/10/stock-traders-blur-spencer-platt-gettyimages-459378734.jpg?itok=8Vj--D23');
        height: 500px;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      ">
    <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
      style="background-color: rgba(0, 0, 0, 0.75)">
      <div class="flex justify-center items-center h-full">
        <div class="text-center text-white px-6 py-6 md:py-0 md:px-12 max-w-[800px]">
          <h2 class="text-5xl md:text-6xl xl:text-7xl font-bold tracking-tight leading-tight mb-12">
            Najzanimljivije <br /><span>novosti
            </span>
          </h2>
          <p class="text-lg">
            Na eveNGO™ platformi možete pročitati najzanimljivije novosti koje svakodnevno pišu naši saradnici
          </p>

        </div>
      </div>
    </div>
  </div>

</section>
<!-- Section: Design Block -->

</div>

<!-- Container for demo purpose -->
<div class="container my-24 px-6 mx-auto">

<!-- Section: Design Block -->
<section class="mb-32 text-gray-800 text-center">

  <div class="flex justify-between items-center">
    <h2 class="text-3xl font-bold mb-10">Izdvojene novosti</h2>
    <a :href="route('all-news')" class="text-lg font-bold text-blue-500 mb-10">Pogledaj sve</a>

  </div>

  <div class="grid lg:grid-cols-3 gap-6 xl:gap-x-12">
    <div v-for="n in news" :key="n.id" class="mb-6 lg:mb-0">
      <div class="relative block bg-white rounded-lg shadow-lg">
        <div class="flex">
          <div
            class="relative  h-64 overflow-hidden bg-no-repeat bg-cover relative overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-lg mx-4 -mt-4"
            data-mdb-ripple="true" data-mdb-ripple-color="light">
            <img :src="n.image" class="w-full" />
            <a href="#!">
              <div
                class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
                style="background-color: rgba(251, 251, 251, 0.15)"></div>
            </a>
          </div>
        </div>
        <div class="p-6">
          <h5 class="font-bold text-lg mb-3">{{ n.title }}</h5>
          <p class="text-gray-500 mb-4">
            <small>Objavljeno <u>{{format_date(n.created_at)}} </u> <br> 
              <a :href="route('company.about', n.company.id)" class="text-gray-900">{{n.company.name}}</a></small>

          </p>
          <p class="mb-4 pb-2">
            {{ n.description.substring(0,100)+"..." }}
          </p>
          <a :href="route('view-news', n.id)" data-mdb-ripple="true" data-mdb-ripple-color="light"
            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Pročitaj više</a>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- Section: Design Block -->

</div>
<!-- Container for demo purpose -->
<div class="my-24 mx-auto">

<!-- Section: Design Block -->
<section class="mb-32">
  <div class="relative overflow-hidden bg-no-repeat bg-cover" style="
        background-position: 50%;
        background-image: url('https://fourwaves.com/media/kzqjw1wp/samuel-pereira-uf2nnanwa8q-unsplash.jpg?quality=100&rnd=132980483087000000');
        height: 500px;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      ">
    <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
      style="background-color: rgba(0, 0, 0, 0.75)">
      <div class="flex justify-center items-center h-full">
        <div class="text-center text-white px-6 md:px-12">
          <h2 class="text-5xl font-bold tracking-tight leading-tight mb-12">
            Ukoliko imate <br /><span>pitanja</span>
          </h2>
          <a type="button"
          :href="route('contact')"
            class="inline-block px-7 py-3 border-2 border-white text-white font-medium text-sm leading-snug uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
            data-mdb-ripple="true" data-mdb-ripple-color="light">
            Kontaktirajte nas
        </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

</div>
<!-- Container for demo purpose -->
<!-- Container for demo purpose -->
<!-- Container for demo purpose -->
<!-- Container for demo purpose -->
    </MainLayout>
</template>

<style scoped>
.grayscale {
  filter: grayscale(100%);
}
</style>