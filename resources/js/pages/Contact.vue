<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css';
import AppLayout from '@/layouts/AppLayout.vue';
import { Carousel, Slide } from 'vue3-carousel';
// import heroImg1 from "../../images/hero-1.jpeg";
// import heroImg2 from "../../images/hero-2.jpeg";
// import heroImg3 from "../../images/hero-3.jpeg";
import img1Sm from "../../images/hero-sm.webp";
import img2Sm from "../../images/hero-2sm.webp";
import img3Sm from "../../images/hero-3sm.webp";
import Footer from '@/components/Footer.vue';
import { useHead } from '@vueuse/head';

// const images = [heroImg1, heroImg2, heroImg3];

const imagesSm = [img1Sm, img2Sm, img3Sm];

const carouselConfig = {
  itemsToShow: 1,
  wrapAround: true,
  autoplay: 3000,
}

const pageTitle = "Home | Sundaram Developers";
const pageDescription = "Explore affordable and spacious flats in Jorhat with modern amenities. Find your perfect flat in Jorhat today with flexible pricing and great locations.";

useHead({
  title: pageTitle,
  meta: [
    { name: 'description', content: pageDescription },
    { name: 'keywords', content: 'flat in Jorhat, Jorhat apartments, Sundaram Developers, residential flats Assam, buy flat Jorhat, Jorhat real estate, new flats Jorhat, affordable flats Jorhat, premium apartments Jorhat, Jorhat property developers' },
    { property: 'og:title', content: pageTitle },
    { property: 'og:description', content: pageDescription },
    { property: 'og:type', content: 'website' },
  ],
});


</script>

<template>
  <AppLayout>
    <!-- hero Section -->
    <div class="relative w-full h-[70vh] overflow-hidden">
      <Carousel v-bind="carouselConfig" class="w-full h-full">
        <Slide v-for="image in imagesSm" :key="image">
          <div class="w-full h-[70vh] relative">
            <img :src="image" alt="Hero Slide" class="w-full h-full object-cover object-center brightness-40" />
          </div>
        </Slide>
      </Carousel>

      <!-- ✅ Centered Overlay Content -->
      <div class="container mx-auto absolute inset-0 flex justify-start px-10 items-center">
        <div class="z-10 p-6 text-white" data-aos="fade-right">
          <h1 class="text-6xl kanit-bold">Divine Green</h1>
          <p class="text-2xl pt-4 kanit-medium">Luxury Living in the Heart of Guwahati.</p>
        </div>
      </div>
    </div>

    <section class="bg-sky-100 py-16 px-4">
      <h2 class="text-3xl font-bold text-center kanit-semibold">Welcome to Divine Green</h2>
      <div class="container mx-auto grid md:grid-cols-2 gap-6 my-8">
        <div>
            <p>The name Divine Green signifies purity and flawlessness, rightfully signifying the commitment that the Divine Developers has to ensure a modern habitat for Guwahati. Divine Green was conceived with the idea of creating a home that was perfect in all respects. What you need is compact living space, where room sizes are spacious and where life can be comfortable and convenient. The project is located in the fast-developing residential hub of Guwahati, making it a sought-after place to reside.</p>
        </div>
        <div class="grid grid-cols-2 gap-6 text-green-700">
            <div v-for="index in 4" :key="index" class="bg-white rounded shadow p-4 gap-5 hover:shadow-lg transition duration-300">
                <p class="font-extrabold text-xl">200+</p>
                <p class="text-zinc-600">Premium Units</p>
            </div>
        </div>
      </div>
    </section>

    <Footer />
  </AppLayout>
</template>