<script setup>
import MainLayout from '@/Layouts/Main.vue';
import { Head } from '@inertiajs/inertia-vue3';
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
            style="background-image: url('https://media.istockphoto.com/id/1281724535/photo/large-group-of-business-people-in-convention-centre.jpg?b=1&s=170667a&w=0&k=20&c=4-Ui5X7T1C5NIuYYJA1tGtnuFGyXePhvbwDodx7wWUI=');background-position-y: center ; height: 500px">
            <div
                class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
                style="background-color: rgba(0, 0, 0, 0.6)">
                <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <h2 class="mb-4 text-4xl font-semibold">eveNGO™</h2>
                    <h4 class="mb-6 text-xl font-semibold">Ne znam šta da ovdje napišem</h4>
                    <button
                    type="button"
                    class="rounded border-2 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    Call to action
                    </button>
                </div>
                </div>
            </div>
            </div>
            <!-- Jumbotron -->
            <!-- Container for demo purpose -->
<div class="container my-24 px-6 mx-auto">

<!-- Section: Design Block -->
<section class="mb-32 text-gray-800 text-center">
  <h2 class="text-3xl font-bold mb-20">Why is it so great?</h2>

  <div class="grid lg:gap-x-12 lg:grid-cols-3">
    <div class="mb-12 lg:mb-0">
      <div class="rounded-lg shadow-lg h-full block bg-white">
        <div class="flex justify-center">
          <div class="p-4 bg-blue-600 rounded-full shadow-lg inline-block -mt-8">
            <svg
              class="w-7 h-7 text-white"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512"
            >
              <path
                fill="currentColor"
                d="M488.6 250.2L392 214V105.5c0-15-9.3-28.4-23.4-33.7l-100-37.5c-8.1-3.1-17.1-3.1-25.3 0l-100 37.5c-14.1 5.3-23.4 18.7-23.4 33.7V214l-96.6 36.2C9.3 255.5 0 268.9 0 283.9V394c0 13.6 7.7 26.1 19.9 32.2l100 50c10.1 5.1 22.1 5.1 32.2 0l103.9-52 103.9 52c10.1 5.1 22.1 5.1 32.2 0l100-50c12.2-6.1 19.9-18.6 19.9-32.2V283.9c0-15-9.3-28.4-23.4-33.7zM358 214.8l-85 31.9v-68.2l85-37v73.3zM154 104.1l102-38.2 102 38.2v.6l-102 41.4-102-41.4v-.6zm84 291.1l-85 42.5v-79.1l85-38.8v75.4zm0-112l-102 41.4-102-41.4v-.6l102-38.2 102 38.2v.6zm240 112l-85 42.5v-79.1l85-38.8v75.4zm0-112l-102 41.4-102-41.4v-.6l102-38.2 102 38.2v.6z"
              ></path>
            </svg>
          </div>
        </div>
        <div class="p-6">
          <h3 class="text-2xl font-bold text-blue-600 mb-4">1000</h3>
          <h5 class="text-lg font-medium mb-4">Components</h5>
          <p class="text-gray-500">
            Laudantium totam quas cumque pariatur at doloremque hic quos quia eius
          </p>
        </div>
      </div>
    </div>

    <div class="mb-12 lg:mb-0">
      <div class="rounded-lg shadow-lg h-full block bg-white">
        <div class="flex justify-center">
          <div class="p-4 bg-blue-600 rounded-full shadow-lg inline-block -mt-8">
            <svg
              class="w-7 h-7 text-white"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 544 512"
            >
              <path
                fill="currentColor"
                d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"
              ></path>
            </svg>
          </div>
        </div>
        <div class="p-6">
          <h3 class="text-2xl font-bold text-blue-600 mb-4">70%</h3>
          <h5 class="text-lg font-medium mb-4">Growth</h5>
          <p class="text-gray-500">
            Eum nostrum fugit numquam, voluptates veniam neque quibusdam ullam
          </p>
        </div>
      </div>
    </div>

    <div class="">
      <div class="rounded-lg shadow-lg h-full block bg-white">
        <div class="flex justify-center">
          <div class="p-4 bg-blue-600 rounded-full shadow-lg inline-block -mt-8">
            <svg
              class="w-7 h-7 text-white"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 640 512"
            >
              <path
                fill="currentColor"
                d="M512.1 191l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0L552 6.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zm-10.5-58.8c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.7-82.4 14.3-52.8 52.8zM386.3 286.1l33.7 16.8c10.1 5.8 14.5 18.1 10.5 29.1-8.9 24.2-26.4 46.4-42.6 65.8-7.4 8.9-20.2 11.1-30.3 5.3l-29.1-16.8c-16 13.7-34.6 24.6-54.9 31.7v33.6c0 11.6-8.3 21.6-19.7 23.6-24.6 4.2-50.4 4.4-75.9 0-11.5-2-20-11.9-20-23.6V418c-20.3-7.2-38.9-18-54.9-31.7L74 403c-10 5.8-22.9 3.6-30.3-5.3-16.2-19.4-33.3-41.6-42.2-65.7-4-10.9.4-23.2 10.5-29.1l33.3-16.8c-3.9-20.9-3.9-42.4 0-63.4L12 205.8c-10.1-5.8-14.6-18.1-10.5-29 8.9-24.2 26-46.4 42.2-65.8 7.4-8.9 20.2-11.1 30.3-5.3l29.1 16.8c16-13.7 34.6-24.6 54.9-31.7V57.1c0-11.5 8.2-21.5 19.6-23.5 24.6-4.2 50.5-4.4 76-.1 11.5 2 20 11.9 20 23.6v33.6c20.3 7.2 38.9 18 54.9 31.7l29.1-16.8c10-5.8 22.9-3.6 30.3 5.3 16.2 19.4 33.2 41.6 42.1 65.8 4 10.9.1 23.2-10 29.1l-33.7 16.8c3.9 21 3.9 42.5 0 63.5zm-117.6 21.1c59.2-77-28.7-164.9-105.7-105.7-59.2 77 28.7 164.9 105.7 105.7zm243.4 182.7l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0l8.2-14.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zM501.6 431c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.6-82.4 14.3-52.8 52.8z"
              />
            </svg>
          </div>
        </div>
        <div class="p-6">
          <h3 class="text-2xl font-bold text-blue-600 mb-4">49</h3>
          <h5 class="text-lg font-medium mb-4">Projects</h5>
          <p class="text-gray-500">
            Cupiditate enim, minus nulla dolor cumque iure eveniet facere ullam
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
          <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/088.jpg" alt="Trendy Pants and Shoes"
            class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />
        </div>
        <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 xl:w-8/12">
          <div class="px-6 py-12 md:px-12">
            <h2 class="text-2xl font-bold mb-4">What's the secret of the great taste?</h2>
            <p class="uppercase text-red-600 font-bold mb-6 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 h-4 mr-2">
                <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                <path fill="currentColor"
                  d="M216 23.86c0-23.8-30.65-32.77-44.15-13.04C48 191.85 224 200 224 288c0 35.63-29.11 64.46-64.85 63.99-35.17-.45-63.15-29.77-63.15-64.94v-85.51c0-21.7-26.47-32.23-41.43-16.5C27.8 213.16 0 261.33 0 320c0 105.87 86.13 192 192 192s192-86.13 192-192c0-170.29-168-193-168-296.14z" />
                </svg>Hot news
            </p>
            <p class="text-gray-500 mb-6">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum maxime voluptas
              ipsam aliquam itaque cupiditate provident architecto expedita harum culpa odit,
              inventore rem molestias laborum repudiandae corporis pariatur quo eius iste!
              Quaerat, assumenda voluptates! Molestias, recusandae? Maxime fuga omnis ducimus.
            </p>
            <p class="text-gray-500">
              Commodi ut nisi assumenda alias maxime necessitatibus ad rem repellat explicabo,
              reiciendis illum suscipit iusto? Provident dignissimos similique, reiciendis
              inventore accusantium unde mollitia, deleniti quae atque error id perspiciatis
              illum. Laboriosam aperiam ab illo dignissimos obcaecati corporis similique a odio,
              optio iste quis placeat alias amet rerum sint quos dolor pariatur inventore
              possimus ad consequuntur fugiat perferendis consectetur laudantium.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->

  <section class="mb-32 text-gray-800 text-center">
    <h2 class="text-3xl font-bold mb-12">Trusted by <u class="">2,000,000+</u> users</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 items-center">
      <div class="mb-12 lg:mb-0">
        <img
          src="https://mdbootstrap.com/img/Photos/new-templates/landing-page/2.png"
          class="img-fluid grayscale px-6 md:px-12"
          alt="Nasa - logo"
        />
      </div>

      <div class="mb-12 lg:mb-0">
        <img
          src="https://mdbootstrap.com/img/Photos/new-templates/landing-page/1.png"
          class="img-fluid grayscale px-6 md:px-12"
          alt="Amazon - logo"
        />
      </div>

      <div class="mb-12 lg:mb-0">
        <img
          src="https://mdbootstrap.com/img/Photos/new-templates/landing-page/3.png"
          class="img-fluid grayscale px-6 md:px-12"
          alt="Nike - logo"
        />
      </div>

      <div class="mb-12 lg:mb-0">
        <img
          src="https://mdbootstrap.com/img/Photos/new-templates/landing-page/4.png"
          class="img-fluid grayscale px-6 md:px-12"
          alt="Ikea - logo"
        />
      </div>
    </div>
  </section>

</div>
<!-- Container for demo purpose -->
    </MainLayout>
</template>

<style scoped>
.grayscale {
  filter: grayscale(100%);
}
</style>