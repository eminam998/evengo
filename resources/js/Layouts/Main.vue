<script setup>
import { ref } from 'vue';
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import BreezeNavLink from '@/Components/NavLink.vue';
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/inertia-vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="bg-blue-100">
            <nav class="bg-white border-b py-6 border-blue-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto p-2 sm:p-6 lg:p-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex justify-between">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('home')">
                                    <BreezeApplicationLogo class="block h-24 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <BreezeNavLink :href="route('home')" :active="route().current('home')">
                                    Početna
                                </BreezeNavLink>
                                <BreezeNavLink :href="route('user.index')" :active="route().current('user.index')">
                                    Korisnici
                                </BreezeNavLink>	
                                <BreezeNavLink :href="route('category.index')" :active="route().current('category.index')">
                                    Kategorije
                                </BreezeNavLink>
                                <BreezeNavLink :href="route('location.index')" :active="route().current('location.index')">
                                    Lokacije
                                </BreezeNavLink>
                            </div> -->
                        </div>

                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex h-16">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 space-x-8 sm:-my-px sm:ml-10 sm:flex h-16">
                                <BreezeNavLink :href="route('all-companies')" :active="route().current('all-companies')">
                                    Kompanije
                                </BreezeNavLink>
                                <BreezeNavLink :href="route('all-news')" :active="route().current('all-news')">
                                    Vijesti
                                </BreezeNavLink>	
                                <BreezeNavLink :href="route('all-events')" :active="route().current('all-events')">
                                    Događaji
                                </BreezeNavLink>
                                <BreezeNavLink :href="route('about')" :active="route().current('about')">
                                    O nama
                                </BreezeNavLink>
                                <BreezeNavLink :href="route('contact')" :active="route().current('contact')">
                                    Kontakt
                                </BreezeNavLink>
                                <div
                                class="simple"
                            >
                            <a :href="route('sign-in')">Registracija</a>
                            </div>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <BreezeResponsiveNavLink :href="route('superadmin')" :active="route().current('superadmin')">
                            Dashboard
                        </BreezeResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800"></div>
                            <div class="font-medium text-sm text-gray-500"></div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </BreezeResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            

            <!-- Page Content -->
            <main class="bg-blue-100">
                <slot />
            </main>
            
            


        </div>
        <footer class="bg-white">
                <div class="w-full max-w-screen-xl mt-8 mx-auto p-4 md:py-8">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <a href="/" class="flex items-center mb-4 sm:mb-0">
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('home')">
                                    <BreezeApplicationLogo class="block h-24 w-auto" />
                                </Link>
                            </div>
                        </a>
                        <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-blue-500 sm:mb-0 ">
                            <li>
                                <a :href="route('about')" class="mr-4 hover:underline md:mr-6 ">O nama</a>
                            </li>
                            <li>
                                <a :href="route('all-events')" class="mr-4 hover:underline md:mr-6">Događaji</a>
                            </li>
                            <li>
                                <a :href="route('all-news')" class="mr-4 hover:underline md:mr-6 ">Vijesti</a>
                            </li>
                            <li>
                                <a :href="route('contact')" class="hover:underline">Kontakt</a>
                            </li>
                        </ul>
                    </div>
                    <hr class="my-6 border-blue-200 sm:mx-auto lg:my-8" />
                    <span class="block text-sm text-blue-500 sm:text-center">© 2023 <a href="https://flowbite.com/" class="hover:underline">eveNGO™</a>. Sva prava zadržana.</span>
                </div>
            </footer>
    </div>
</template>

<style lang="css" scoped>
.simple {
  font-size: 20px;
  font-weight: 200;
  letter-spacing: 1px;
  padding: 13px 50px 13px;
  outline: 0;
  border: 2px solid #c6d01e;
  cursor: pointer;
  position: relative;
  width:180px;
  background-color: rgba(0, 0, 0, 0);
}

.simple a{
    position: absolute;
    z-index: 99;
    left:20px;
    top:23px;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
}

.simple::after {
  content: "";
  background-color: #5882bc;
  width: 100%;
  z-index: 1;
  position: absolute;
  height: 100%;
  top: 7px;
  left: 7px;
}
</style>
