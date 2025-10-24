<script setup lang="ts">
import { useHead } from '@vueuse/head';
import SkyLink from "../../../images/sky_link_heights/sky-link-heights-1-sm.avif";
import skyLinkHeight from "../../../images/sky_link_heights/sdimg_sm.png";
import AppLayout from '@/layouts/AppLayout.vue';
import Footer from '@/components/Footer.vue';
import { Building, Bus, Hospital, Leaf, Mail, Phone, PhoneCall, Plane, School, Shield, ShoppingBasket, Train, Wifi } from 'lucide-vue-next';
import { Link } from '@inertiajs/vue3';

const locationBenefits = [
  {
    icon: Train,
    title: "1 km",
    desc: "Railway Stations",
  },
  {
    icon: Plane,
    title: "5 km",
    desc: "Airports",
  },
  {
    icon: Bus,
    title: "2.8 km",
    desc: "Public Transport",
  },
  {
    icon: Hospital,
    title: "2.2 km",
    desc: "Medical & Hospitals",
  },
  {
    icon: School,
    title: "5.8 km",
    desc: "Educational Institutes",
  },
  {
    icon: ShoppingBasket,
    title: "1.7 km",
    desc: "Shopping Marts",
  },
];
const skyLinkFeatures = [
  'Solar Panels','Smart Lighting System','WiFi-enabled Security Cameras','Gym & Fitness Studio','Multi-purpose Hall','Motion Sensors'
]

const pageTitle = "2 BHK Flats available at Sky Link Heights, Jorhat | Sundaram Developers";
const pageDescription = "Explore affordable and spacious flats in Jorhat with modern amenities. Find your perfect flat in Jorhat today with flexible pricing and great locations.";

useHead({
  title: pageTitle,
  meta: [
    { name: 'description', content: pageDescription },
    { name: 'keywords', content: 'flat in Jorhat, Jorhat apartments, Sundaram Developers, residential flats Assam, buy flat Jorhat, Jorhat real estate, new flats Jorhat, affordable flats Jorhat, premium apartments Jorhat, Jorhat property developers' },
    { property: 'og:title', content: pageTitle },
    { property: 'og:url', content: "https://wwww.sundaramdevelopers.in/2-bhk-flats-available-at-sky-link-heights-jorhat" },
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
                <h1 class="z-50 font-bold text-[150%] md:text-[220%] lg:text-[60px] text-white text-center">2 BHK Flats available at Sky Link Heights, Jorhat</h1>
                <p class="max-w-4xl mx-auto text-md text-center md:text-xl text-zinc-100">
                    Discover cozy and spacious flats in the heart of Jorhat with modern amenities and flexible pricing.
                </p>
                <Link href="/contact" class="mt-10 px-8 py-3 font-semibold bg-orange-600 hover:bg-orange-700 shadow text-white rounded-lg hover:scale-95 transition">
                    Contact Us
                </Link>
            </div>
        </div>
    </section>

    <section class="bg-white p-4 py-14">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Prime Location Benefits</h2>
      <div class="container mx-auto mt-6">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6 md:gap-8 py-8">
          <div v-for="benefit in locationBenefits" :key="benefit.title" class="bg-white p-4 py-8 rounded-lg text-center hover:shadow-xl transition shadow-xs duration-300">
            <component :is="benefit.icon" class="w-10 h-10 mx-auto text-sky-600" />
            <!-- <h3 class="mt-5 font-semibold text-xl text-blue-800 mb-1 kanit-medium">{{ benefit.title }}</h3> -->
            <p class="text-zinc-600">{{ benefit.desc }}</p>
          </div>
        </div>
      </div>
    </section>

    <section class="mb-16 bg-zinc-100 py-14">
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

    <!-- <section class="my-16">
      <div class="container mx-auto grid grid-cols-3">
        <div>
          <img :src="Family" class="max-w-[300px] mx-auto" />
        </div>
        <div>
          <img :src="SkyLink" class="" />
        </div>
      </div>
    </section> -->


    <section class="p-8 lg:px-16">
      <div class="container mx-auto">
        <div class="grid lg:grid-cols-5 md:grid-cols-7 grid-cols-1 gap-6">
          <div class="lg:col-span-2 md:col-span-3">
            <img :src="skyLinkHeight" class="rounded-md shadow md:max-w-[400px] h-auto w-full" />
          </div>
          <div class="lg:col-span-3 md:col-span-4 ">
            <h3>Sky Link Heights</h3>
            <p class="my-2 text-lg">Atilagaon, Jorhat.</p>
            <div class="flex gap-1.5 flex-wrap my-3">
              <div v-for="fet in skyLinkFeatures" :key="fet" class="rounded-2xl text-xs px-2 py-1 font-medium text-white bg-zinc-500 shadow">
                {{ fet }}
              </div>
            </div>
            <div class="mt-10">
              <a href="./sky-link-heights" class="bg-red-500 text-white font-semibold px-4 py-2 rounded-xl text-lg shadow hover:scale-95 hover:bg-red-600 hover:shadow-xl" prefetch="hover" >Book Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="my-16 bg-zinc-100 py-10">
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
        <div class="flex justify-center mt-8">
          <Link href="/contact"
            class="flex gap-2 bg-[#ff4c4c] text-white font-semibold items-center rounded px-5 py-2 shadow cursor-pointer hover:shadow-lg hover:scale-95 transition duration-150">
            <span>Contact Us</span>
            <PhoneCall class="w-4" />
          </Link>
        </div>
    </section>

    <Footer />
  </AppLayout>
</template>
