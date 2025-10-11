<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css';
import AppLayout from '@/layouts/AppLayout.vue';
import { Carousel, Slide } from 'vue3-carousel';
import heroImg1 from "../../images/hero-1.jpeg";
// import heroImg2 from "../../images/hero-2.jpeg";
// import heroImg3 from "../../images/hero-3.jpeg";
import img1Sm from "../../images/hero-sm.webp";
import img2Sm from "../../images/hero-2sm.webp";
import img3Sm from "../../images/hero-3sm.webp";
import Footer from '@/components/Footer.vue';
import { useHead } from '@vueuse/head';
import { Fa6Hotel, Fa6Leaf, Fa6Shield, Fa6Wifi } from 'vue-icons-plus/fa6';

// const images = [heroImg1, heroImg2, heroImg3];

const imagesSm = [img1Sm, img2Sm, img3Sm];

const keyFeatures = [
  {
    icon: Fa6Wifi,
    title: 'Smart Home Technology',
    desc: 'Connected living made simple',
    img: heroImg1
  },
  {
    icon: Fa6Leaf,
    title: 'Eco-Friendly Design',
    desc: 'Sustainable and green Spaces',
    img: heroImg1
  },
{
  icon: Fa6Hotel,
    title: 'Eco-Friendly Design',
    desc: '24/7 Security',
    img: heroImg1
},
{
  icon: Fa6Shield,
    title: '24/7 Security',
    desc: 'World-class facilities',
    img: heroImg1
}
];


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
      <div class="absolute inset-0 flex justify-center items-center p-8 lg:pb-16">
        <div class="z-10 p-6 text-white" data-aos="fade-right">
          <h1 class="text-6xl font-bold">Building Smart Homes <br> for Modern Living</h1>
          <p class="text-lg pt-4">Discover future-ready smart homes with elegant design, and modern features – all in
            the heart of Guwahati.</p>
        </div>
      </div>
    </div>

    <section class="py-14 px-4">
      <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center kanit-semibold">Our Signature Projects</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 py-8">
          <div v-for="image in imagesSm" :key="image">
            <img :src="image" alt="Hero Slide" class="w-full h-[300px] object-cover object-center shadow rounded hover:shadow-xl transition duration-300" />
          </div>
        </div>
        <h2 class="text-6xl font-bold text-center pt-12">Completed Projects</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 py-8">
          <div v-for="image in imagesSm.slice(0, 2)" :key="image">
            <img :src="image" alt="Hero Slide" class="w-full h-[300px] object-cover object-center" />
          </div>
        </div>
      </div>
    </section>

    <section class="text-3xl py-14 w-full bg-sky-100">
        <h2 class="mx-auto font-bold mb-8 kanit-medium text-center">Key Features</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
          <div v-for="keyFeature in keyFeatures" :key="keyFeature.title" class="bg-white p-4 py-8 shadow rounded-lg text-center hover:shadow-xl transition duration-300">
            <component :is="keyFeature.icon" class="w-12 h-12 mx-auto text-primary" />
              <!-- <img :src="keyFeature.icon as any" alt="Hero Slide" class="w-full h-[300px] object-cover object-center" /> -->
            <h3 class="mt-5 font-semibold text-xl">{{ keyFeature.title }}</h3>
            <p class="text-sm">{{ keyFeature.desc }}</p>
          </div>
        </div>
      </section>
    <Footer />
  </AppLayout>
</template>