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
import divineGreen from "../../images/divine-green.jpg";
import skyLinkHeight from "../../images/sky-link-land.webp";
import shivashree from "../../images/Shivashree.webp";
import horoGauri from "../../images/HoroGauri.webp";
import PBArcade from "../../images/PBArcade.webp";
import Kalyan from "../../images/kalyan.jpg";
import Saurabh from "../../images/saurabh.jpg";
// import clip1 from "../../images/clip1.mp4";
import Footer from '@/components/Footer.vue';
import { useHead } from '@vueuse/head';
import { Fa6Hotel, Fa6Leaf, Fa6Shield, Fa6Wifi } from 'vue-icons-plus/fa6';
import ImageCard from '@/components/ImageCard.vue';
import CountingCard from '@/components/CountingCard.vue';
import { Io5Call, Io5Mail } from 'vue-icons-plus/io5';

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

const signatureProjects = [
  {
    image: divineGreen,
    title: "Divine Green",
    link: "/divine-green"
  },
  {
    image: skyLinkHeight,
    title: "Sky Link Height",
    link: "/sky-link-height"
  },
  {
    image: shivashree,
    title: "Shivashree",
    link: "/shivashree"
  }
];

const completedProjects = [
  {
    image: horoGauri,
    title: "Horo Gauri",
    link: "/horo-gauri"
  },
  {
    image: PBArcade,
    title: "P.B. Arcade",
    link: "/pb-arcade"
  }
];

const directors = [
  {
    img: Kalyan,
    name: "Mr. Kalyan Kumar Changkakoti",
    desc: "A Civil Engineer having involved many years in constructions."
  },
  {
    img: Saurabh,
    name: "Mr. Saurabh Pran Tamuli",
    desc: "A Govt. contractor and a real state businessman."
  }
];

const countscard = [
  {
    to: 1999,
    label: "Since",
    isPlus: false
  },
  {
    to: 5405,
    label: "Clients",
    isPlus: true
  },
  {
    to: 53,
    label: "Projects",
    isPlus: true
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
    <section class="relative w-full h-[70vh] overflow-hidden" id="herotop">
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
    </section>

    <section class="py-14 px-4 bg-zinc-100">
      <div class="container mx-auto">
        <h2 class="text-5xl text-center kanit-medium">Our Signature Projects</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 py-14">
          <div v-for="signature in signatureProjects" :key="signature.title">
            <!-- <img :src="image" alt="Hero Slide" class="w-full h-[300px] object-cover object-center shadow rounded hover:shadow-xl transition duration-300" /> -->
            <ImageCard
              className="rounded-lg shadow h-[300px]"
              :image="signature.image"
              :title="signature.title"
              :link="signature.link"
            />
          </div>
        </div>
      </div>
    </section>

    <section class="text-5xl py-14 px-4 w-full">
      <div class="container mx-auto">
        <h2 class="text-center kanit-medium">Completed Projects</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 py-14">
          <div v-for="completed in completedProjects" :key="completed.title">
            <!-- <img :src="image" alt="Hero Slide" class="w-full h-[300px] object-cover object-center" /> -->
            <ImageCard
              className="rounded-lg shadow h-[300px]"
              :image="completed.image"
              :title="completed.title"
              :link="completed.link"
            />
          </div>
        </div>
      </div>
    </section>

    <section class="text-5xl py-14 w-full bg-zinc-100">
        <h2 class="mx-auto font-bold kanit-medium text-center">Key Features</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 p-4 py-14">
          <div v-for="keyFeature in keyFeatures" :key="keyFeature.title" class="bg-white p-4 border py-8 shadow-md rounded-lg text-center hover:shadow-xl transition duration-300">
            <component :is="keyFeature.icon" class="w-8 h-8 mx-auto text-green-600" />
              <!-- <img :src="keyFeature.icon as any" alt="Hero Slide" class="w-full h-[300px] object-cover object-center" /> -->
            <h3 class="mt-5 font-semibold text-xl">{{ keyFeature.title }}</h3>
            <p class="text-sm">{{ keyFeature.desc }}</p>
          </div>
        </div>
      </section>
      <section class="text-5xl py-14 w-full">
        <h2 class="mx-auto font-bold mb-8 kanit-medium text-center">About Us</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-5 p-4">
          <div class="p-4">
            <!-- <video controls="false" autoplay class="max-h-[320px]"><source :src="clip1" type="video/mp4"></video> -->
            <div style="position: relative; width: 100%; max-width: 560px; aspect-ratio: 16/9; overflow: hidden;">
              <iframe src="https://www.youtube.com/embed/EEIYufLHfso?autoplay=1&amp;mute=1&amp;loop=1&amp;playlist=EEIYufLHfso&amp;controls=0&amp;showinfo=0&amp;modestbranding=1&amp;rel=0" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media" allowfullscreen="false" title="Video" style="width:100%; height:100%; border:0; display:block; object-fit:cover; pointer-events: none; cursor: default;">
              </iframe>
            </div>
          </div>
          <div class="p-4 flex flex-col justify-center">
            <h3 class="text-3xl kanit-medium mb-4 lg:mb-8">Welcome to Sundaram Developers</h3>
            <p class="text-lg">Sundaram Developers is a steadily-growing real estate company engaged in construction of several real estate projects across the Upper Assam to meet the growing demand of an emergent India’s Look East Policy.</p>
          </div>
        </div>
      </section>
      <section class="text-5xl py-14 w-full">
        <h2 class="mx-auto font-bold mb-8 kanit-medium text-center">Board Of Directors</h2>
        <div class="container max-w-8xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-18 p-4">
          <div v-for="director in directors" :key="director.name" class="flex flex-col xl:flex-row justify-center items-center xl:items-end gap-4">
            <div>
              <img :src="director.img" class="max-h-[280px] max-w-[200] object-cover" :alt="director.name"/>
            </div>
            <div class="text-center xl:text-left">
              <h3 class="text-2xl kanit-semibold mb-2">{{ director.name }}</h3>
              <p class="text-lg text-zinc-700">{{ director.desc }}</p>
            </div>
          </div>
        </div>
      </section>
      <section class="text-5xl py-14 w-full bg-zinc-100">
        <div class="container max-w-8xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-1 p-4">
          <CountingCard :to="cc.to" :duration="2000" :isPlus="cc.isPlus" :label="cc.label" v-for="cc in countscard" :key="cc.to"/>
        </div>
      </section>
      <section class="text-5xl py-14 w-full">
        <h2 class="mx-auto font-bold mb-8 kanit-medium text-center">Ready to Find Your dream Home?</h2>
        <div class="container max-w-8xl mx-auto p-4">
          <div class="flex justify-center gap-6 text-lg mb-6">
            <div class="flex gap-2">
              <Io5Call />
              <span>9886847886</span>
            </div>
            <div class="flex gap-2">
              <Io5Mail />
              <span>sundaramconstjrt15@gmail.com</span>
            </div>
          </div>
          <div class="flex justify-center text-sm">
            <button class="flex gap-2 bg-orange-600 text-white font-semibold items-center rounded-lg px-5 py-2 shadow cursor-pointer hover:shadow-lg">
              <span>Contact Us</span>
              <Io5Call class="w-4"/>
            </button>
          </div>
        </div>
      </section>
    <Footer />
  </AppLayout>
</template>