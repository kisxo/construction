<script setup lang="ts">
import { useHead } from '@vueuse/head';
import SkyLink from "../../../images/sky_link_heights/sky-link-heights-1-sm.avif";
import Family from "../../../images/family.webp";
import AppLayout from '@/layouts/AppLayout.vue';
import Footer from '@/components/Footer.vue';
import { Building, Leaf, Mail, Phone, Shield, Wifi } from 'lucide-vue-next';
import { Link } from '@inertiajs/vue3';

const pageTitle = "Affordable Flats for Sale in Jorhat - Your Dream Home Awaits | Sundaram Developers";
const pageDescription = "Explore affordable and spacious flats in Jorhat with modern amenities. Find your perfect flat in Jorhat today with flexible pricing and great locations.";

useHead({
  title: pageTitle,
  meta: [
    { name: 'description', content: pageDescription },
    { name: 'keywords', content: 'flat in Jorhat, Jorhat apartments, Sundaram Developers, residential flats Assam, buy flat Jorhat, Jorhat real estate, new flats Jorhat, affordable flats Jorhat, premium apartments Jorhat, Jorhat property developers' },
    { property: 'og:title', content: pageTitle },
    { property: 'og:url', content: "https://wwww.sundaramdevelopers.in/flat-in-jorhat" },
    { property: 'og:description', content: pageDescription },
    { property: 'og:type', content: 'website' },
    { property: 'og:image', content: 'https://wwww.sundaramdevelopers.in/resources/images/hero-3.jpeg' },
  ],
});

// function knowMore() {
//   alert("Thank you for your interest! Please contact us for more details.");
// }
</script>

<template>
  <AppLayout>
    <section class="mb-16">
        <div class="relative group">
            <div class="p-6">
                <div class="rounded-xl bg-zinc-950">
                    <img :src="SkyLink" alt="Modern apartment exterior" class=" rounded-xl w-full object-cover lg:aspect-[20/7] md:aspect-[9/4] aspect-[3/2] opacity-35 transition group-hover:opacity-25 group-hover:scale-[97%]" />
                </div>
            </div>
            <div class="absolute bottom-10 w-full flex flex-col items-center p-8 ">
                <h1 class="z-50 font-bold text-[150%] md:text-[220%] lg:text-[60px] text-white text-center">Affordable Flats for Sale in Jorhat</h1>
                <p class="max-w-4xl mx-auto text-md text-center md:text-xl text-zinc-100">
                    Discover cozy and spacious flats in the heart of Jorhat with modern amenities and flexible pricing.
                </p>
                <Link href="/contact" class="mt-10 px-8 py-3 font-semibold bg-orange-600 hover:bg-orange-700 shadow text-white rounded-lg hover:scale-95 transition">
                    Contact Us
                </Link>
            </div>
        </div>
    </section>

    <section class="mb-16">
      <div class="container mx-auto">
        <h2 class="text-3xl font-semibold mb-6 text-center text-blue-900">Key Features</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 text-center gap-8 p-4">
            <div class="flex flex-col items-center bg-blue-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                <i>
                    <Wifi class="text-blue-900 font-bold text-4xl" />
                </i>
                <h3 class="font-bold text-xl mt-4 text-blue-900">Smart Home Technology</h3>
                <p class="text-gray-600 text-sm tracking-wider">
                    Connected living made simple
                </p>
            </div>
            <div class="flex flex-col items-center bg-indigo-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                <i>
                    <Leaf class="text-blue-900 font-bold text-4xl" />
                </i> 
                <h3 class="font-bold text-xl mt-4 text-blue-900">Eco-Friendly Design</h3>
                <p class="text-gray-600 text-sm tracking-wider">
                    Sustainable and green spaces
                </p>
            </div>
            <div class="flex flex-col items-center bg-violet-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                <i>
                    <Shield class="text-blue-900 font-bold text-4xl" />
                </i>
                <h3 class="font-bold text-xl mt-4 text-blue-900">24/7 Security</h3>
                <p class="text-gray-600 text-sm tracking-wider">
                    Rounded-the-clock surveillance
                </p>
            </div>
            <div class="flex flex-col items-center bg-sky-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                <i>
                    <Building class="text-blue-900 font-bold text-4xl" />
                </i>
                <h3 class="font-bold text-xl mt-4 text-blue-900">Premium Amenities</h3>
                <p class="text-gray-600 text-sm tracking-wider">
                    World-class facilities
                </p>
            </div>
        </div>
      </div>
    </section>

    <section class="my-16">
      <div class="container mx-auto grid grid-cols-3">
        <div>
          <img :src="Family" class="max-w-[300px] mx-auto" />
        </div>
        <div>
          <img :src="SkyLink" class="" />
        </div>
      </div>
    </section>

    <section class="my-16">
        <div class="container mx-auto flex flex-col items-center">
            <h2 class="font-bold text-3xl text-blue-900">Ready to Find Your Dream Home?</h2>
            <div class="flex gap-12 my-4 mx-auto">
                <a class="flex gap-2">
                    <i>
                        <Phone />
                    </i>
                    <span>9886847886</span>
                </a>
                <a class="flex gap-2">
                    <i>
                        <Mail />
                    </i>
                    <span>contact@sundaramdevelopers.in</span>
                </a>
            </div>
        </div>
    </section>

    <Footer />
  </AppLayout>
</template>
