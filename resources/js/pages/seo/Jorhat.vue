<script setup lang="ts">
import { useHead } from '@vueuse/head';
import image3 from "../../../images/hero-3.jpeg";
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
                    <img :src="image3" alt="Modern apartment exterior" class=" rounded-xl w-full object-cover lg:aspect-[20/7] md:aspect-[9/4] aspect-[3/2] opacity-35 transition group-hover:opacity-25 group-hover:scale-[97%]" />
                </div>
            </div>
            <div class="absolute bottom-10 w-full flex flex-col items-center p-8 ">
                <h1 class="z-50 font-bold text-[150%] md:text-[220%] lg:text-[60px] text-white text-center">Affordable Flats for Sale in Jorhat</h1>
                <p class="max-w-4xl mx-auto text-md text-center md:text-xl text-zinc-100">
                    Discover cozy and spacious flats in the heart of Jorhat with modern amenities and flexible pricing.
                </p>
                <Link href="/contact" class="mt-10 px-8 py-3 bg-teal-700 hover:bg-teal-800 shadow text-white rounded-lg hover:scale-95 transition">
                    Contact Us
                </Link>
            </div>
        </div>
    </section>

    <!-- <section class=" mb-16 ">
      <div class="container mx-auto items-center">
        <div>
            <h2 class="text-3xl text-center font-semibold mb-12">Why Buy a Flat in Jorhat?</h2>
            <ul class=" list-inside space-y-2 text-gray-700 text-lg text-center">
                <li>Strategic location with excellent connectivity across Assam.</li>
                <li>Growing real estate market with promising investment returns.</li>
                <li>Close to quality schools, hospitals, and shopping centers.</li>
                <li>Peaceful & green environment ideal for families and professionals.</li>
            </ul>
        </div>
      </div>
    </section> -->

    <!-- <section class="mb-16">
      <div class="container mx-auto">
        <h2 class="text-3xl font-semibold mb-6 text-center">Popular Areas for Flats in Jorhat</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" alt="Sonari" class="rounded mb-4 h-40 w-full object-cover" />
            <h3 class="font-bold text-xl mb-2">Sonari</h3>
            <p class="text-gray-600">
                A vibrant locality known for its connectivity and community feel.
            </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=400&q=80" alt="Boiragimoth" class="rounded mb-4 h-40 w-full object-cover" />
            <h3 class="font-bold text-xl mb-2">Boiragimoth</h3>
            <p class="text-gray-600">
                Known for peaceful residences with nearby markets and parks.
            </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1505692952046-65e6ad3a9bcd?auto=format&fit=crop&w=400&q=80" alt="Rupai" class="rounded mb-4 h-40 w-full object-cover" />
            <h3 class="font-bold text-xl mb-2">Rupai</h3>
            <p class="text-gray-600">
                Emerging area with new housing projects and great connectivity.
            </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1461716902560-c81068a0a7b2?auto=format&fit=crop&w=400&q=80" alt="Jugijan" class="rounded mb-4 h-40 w-full object-cover" />
            <h3 class="font-bold text-xl mb-2">Jugijan</h3>
            <p class="text-gray-600">
                A quiet and green neighborhood perfect for families.
            </p>
            </div>
        </div>
      </div>
    </section> -->

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

    <!-- <section class="bg-teal-50 p-8 rounded-lg max-w-3xl mx-auto">
      <h2 class="text-3xl font-semibold mb-6 text-center">Contact Us</h2>
      <form @submit.prevent="knowMore" class="grid gap-6">
        <input
          type="text"
          placeholder="Your Name"
          required
          class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400"
        />
        <input
          type="email"
          placeholder="Your Email"
          required
          class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400"
        />
        <textarea
          placeholder="Your Message"
          required
          rows="4"
          class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400"
        ></textarea>
        <button
          type="submit"
          class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 rounded-lg transition"
        >
          Send Message
        </button>
      </form>
    </section> -->

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
