<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css';
import AppLayout from '@/layouts/AppLayout.vue';
import { Carousel, Slide } from 'vue3-carousel';
import heroImg1 from "../../images/hero-1.jpeg";
import heroImg2 from "../../images/hero-2.jpeg";
import heroImg3 from "../../images/hero-3.jpeg";
import { Wifi, Leaf, Shield, Hotel } from 'lucide-vue-next';
import Footer from '@/components/Footer.vue';
import { useHead } from '@unhead/vue';

const images = [heroImg1, heroImg2, heroImg3];

const keyFeatures = [
  {
    icon: Wifi,
    title: 'Smart Home Technology',
    desc: 'Connected living made simple',
    img: heroImg1
  },
  {
    icon: Leaf,
    title: 'Eco-Friendly Design',
    desc: 'Sustainable and green Spaces',
    img: heroImg1
  },
{
  icon: Hotel,
    title: 'Eco-Friendly Design',
    desc: '24/7 Security',
    img: heroImg1
},
{
  icon: Shield,
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
        <Slide v-for="image in images" :key="image">
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

    <div class="py-12 px-6">
      <h2 class="text-6xl font-bold text-center">Our Signature Projects</h2>
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 py-8">
        <div v-for="image in images" :key="image">
          <img :src="image" alt="Hero Slide" class="w-full h-[300px] object-cover object-center" />
        </div>
      </div>
      <h2 class="text-6xl font-bold text-center pt-12">Completed Projects</h2>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 py-8">
        <div v-for="image in images.slice(0, 2)" :key="image">
          <img :src="image" alt="Hero Slide" class="w-full h-[300px] object-cover object-center" />
        </div>
      </div>

      <div class="text-4xl pt-12 w-full">
        <h2 class="mx-auto font-bold">Key Features</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3">
          <div v-for="keyFeature in keyFeatures" :key="keyFeature.title">
              <img :src="keyFeature.icon as any" alt="Hero Slide" class="w-full h-[300px] object-cover object-center" />
          </div>
        </div>
      </div>
    </div>
    <Footer/>
  </AppLayout>
</template>