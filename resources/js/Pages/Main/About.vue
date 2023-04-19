<script setup>
import MainLayout from '@/Layouts/Main.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="O nama" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                O nama
            </h2>
        </template>

        <!-- Container for demo purpose -->
<div class="container py-24 px-6 mx-auto">

<!-- Section: Design Block -->
<section class="mb-32 text-gray-800">
  <h2 class="text-2xl font-bold mb-12 text-center">O nama</h2>

  <div class="flex flex-wrap mb-12">
    <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 lg:pr-6 mb-6 lg:mb-0">
      <div class="relative overflow-hidden bg-no-repeat bg-cover ripple shadow-lg rounded-lg"
        style="background-position: 50%" data-mdb-ripple="true" data-mdb-ripple-color="light">
        <img src="https://media.istockphoto.com/id/1281724535/photo/large-group-of-business-people-in-convention-centre.jpg?b=1&s=170667a&w=0&k=20&c=4-Ui5X7T1C5NIuYYJA1tGtnuFGyXePhvbwDodx7wWUI=" class="w-full" alt="Louvre" />
        <a href="#!">
          <div
            class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
            style="background-color: rgba(251, 251, 251, 0.2)"></div>
        </a>
      </div>
    </div>

    <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 lg:pl-6">
      <h3 class="text-2xl font-bold mb-4">Ko smo mi?</h3>
      <p class="text-gray-500 mb-6">
        eveNGO™ je platforma koja omogućuje nevladinim registracijama objavljivanje sadržaja na jednom mjestu. Nevladine organizacije
        putem ove platforme mogu objavljivati vijesti i događaje vezane za njihovo poslovanje.
      </p>
      <p class="text-gray-500">
        eveNGO™ kao platforma je nastala 2023. godine kao diplomski projekat jedne studentice, te je iz toga izrasla 
        u veliku platformu sa preko 1000 nevladinih organizacija koje svakodnevno objavljuju željeni sadržaj.
      </p>
    </div>
  </div>

  <div class="flex flex-wrap lg:flex-row-reverse mb-12">
    <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 lg:pl-6 mb-6 lg:mb-0">
      <div class="relative overflow-hidden bg-no-repeat bg-cover ripple shadow-lg rounded-lg"
        style="background-position: 50%" data-mdb-ripple="true" data-mdb-ripple-color="light">
        <img src="https://st2.depositphotos.com/3591429/10249/i/600/depositphotos_102495190-stock-photo-diversity-people-at-meeting.jpg" class="w-full" alt="Louvre" />
        <a href="#!">
          <div
            class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out"
            style="background-color: rgba(251, 251, 251, 0.2)"></div>
        </a>
      </div>
    </div>

    <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 lg:pr-6">
      <h3 class="text-2xl font-bold mb-4">Naš cilj</h3>
      <p class="text-gray-500">
        Cilj eveNGO™ platforme jeste omogućiti krajnjem korisniku pregled svih nevladinih organizacija unutar teritorija Bosne i Hercegovine
        na jednom mjestu. Također, eveNGO™ platforma krajnjem događaju omogućuje pregled najnovijih događaja koje organizuju nevladine organizacije
        u ovisnosti od kategorije i lokacije koja ih zanima. Na iste događaje korisnik se može jednostavno i besplatno prijaviti. Također, korisnik može pročitati
        nešto više o svakoj organizaciji koja surađuje sa eveNGO™ platformom, te pročitati i novosti, kako bi se više informirao o radu i cilju svake organizacije.
      </p>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

</div>
<!-- Container for demo purpose -->
    </MainLayout>
</template>


