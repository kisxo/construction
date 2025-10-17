<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css';
import AppLayout from '@/layouts/AppLayout.vue';
import { Carousel, Slide } from 'vue3-carousel';
import divineGreen from "../../images/divine_green/divine-green-640x480.avif";
import skyLinkHeight from "../../images/sky_link_heights/sky-link-heights-1-sm.avif";
import shivashree from "../../images/shivashree/shivashree_956x768.avif";
import horoGauri from "../../images/horo_gauri/HoroGauri_1_540x.avif";
import PBArcade from "../../images/pb_arcade/main_img_sm.avif";
import Kalyan from "../../images/Kalyan.avif";
import Saurabh from "../../images/Saurabh.avif";
// import clip1 from "../../images/clip1.mp4";
import Footer from '@/components/Footer.vue';
import { useHead } from '@vueuse/head';
import { Fa6Hotel, Fa6Leaf, Fa6Shield, Fa6Wifi } from 'vue-icons-plus/fa6';
import ImageCard from '@/components/ImageCard.vue';
import CountingCard from '@/components/CountingCard.vue';
import { Io5Call, Io5Mail } from 'vue-icons-plus/io5';
import { Link } from '@inertiajs/vue3';

// const images = [heroImg1, heroImg2, heroImg3];

const imagesSm = [horoGauri, PBArcade, divineGreen, shivashree, skyLinkHeight];

const keyFeatures = [
  {
    icon: Fa6Wifi,
    title: 'Smart Home Technology',
    desc: 'Connected living made simple',
    // img: heroImg1
  },
  {
    icon: Fa6Leaf,
    title: 'Eco-Friendly Design',
    desc: 'Sustainable and green Spaces',
    // img: heroImg1
  },
  {
    icon: Fa6Hotel,
    title: 'Eco-Friendly Design',
    desc: '24/7 Security',
    // img: heroImg1
  },
  {
    icon: Fa6Shield,
    title: '24/7 Security',
    desc: 'World-class facilities',
    // img: heroImg1
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
    link: "/sky-link-heights"
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

// const countscard = [
//   {
//     to: 1999,
//     label: "Since",
//     isPlus: false
//   },
//   {
//     to: 5405,
//     label: "Clients",
//     isPlus: true
//   },
//   {
//     to: 53,
//     label: "Projects",
//     isPlus: true
//   }
// ];


const carouselConfig = {
  itemsToShow: 1,
  wrapAround: true,
  autoplay: 3000,
}

// SEO
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
    { property: 'og:url', content: 'https://www.sundaramdevelopers.in/'}
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
            <img 
            :src="image" 
            alt="Hero Slide" 
            class="w-full h-full object-cover object-center brightness-40" 
            loading="eager" />
          </div>
        </Slide>
      </Carousel>

      <!-- ✅ Centered Overlay Content -->
      <div class="absolute inset-0 flex justify-center items-center p-8 lg:pb-16">
        <div class="z-10 p-6 text-white" data-aos="fade-right">
          <h1 class="text-5xl sm:text-6xl font-bold">Building Smart Homes <br> for Modern Living</h1>
          <p class="text-lg pt-4">Discover future-ready smart homes with elegant design, and modern features – all in
            the heart of Guwahati.</p>
        </div>
      </div>
    </section>

    <section class="p-8 lg:px-16 pt-16 bg-neutral-100">
      <div class="">
        <h2 class="text-center ">Our Signature Projects</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 py-8">
          <div v-for="signature in signatureProjects" :key="signature.title">
            <!-- <img :src="image" alt="Hero Slide" class="w-full h-[300px] object-cover object-center shadow rounded hover:shadow-xl transition duration-300" /> -->
            <ImageCard className="hover:border border-black shadow h-[300px]" :image="signature.image"
              :title="signature.title" :link="signature.link" />
          </div>
        </div>
      </div>
    </section>

    <section class="p-8 lg:px-16 bg-neutral-100">
      <div class="">
        <h2 class="text-center">Completed Projects</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 py-8">
          <div v-for="completed in completedProjects" :key="completed.title">
            <!-- <img :src="image" alt="Hero Slide" class="w-full h-[300px] object-cover object-center" /> -->
            <ImageCard className="shadow h-[300px]" :image="completed.image" :title="completed.title"
              :link="completed.link" />
          </div>
        </div>
      </div>
    </section>

    <section class="p-8 lg:px-16 bg-neutral-100">
      <h2 class="mx-auto text-center">Key Features</h2>
      <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 p-4 py-8">
        <div v-for="keyFeature in keyFeatures" :key="keyFeature.title" class=" p-4 py-8 rounded-lg text-center">
          <component :is="keyFeature.icon" class="size-16 mx-auto text-blue-500" />
          <!-- <img :src="keyFeature.icon as any" alt="Hero Slide" class="w-full h-[300px] object-cover object-center" /> -->
          <h3 class="mt-5 text-xl">{{ keyFeature.title }}</h3>
          <p class="">{{ keyFeature.desc }}</p>
        </div>
      </div>
    </section>

    <section class="p-8 lg:px-16 w-full pt-16">
      <h2 class="text-center">About Us</h2>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 py-8">
        <div style="position: relative; width: 100%; max-width: 560px; aspect-ratio: 16/9; overflow: hidden;">
          <iframe src="https://www.youtube.com/embed/EEIYufLHfso?autoplay=1&amp;mute=1&amp;loop=1&amp;playlist=EEIYufLHfso&amp;controls=0&amp;showinfo=0&amp;modestbranding=1&amp;rel=0" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media" allowfullscreen="true" title="Video" style="width:100%; height:100%; border:0; display:block; object-fit:cover; pointer-events: none; cursor: default;" loading="lazy"> </iframe>
        </div>


        <div class="flex flex-col justify-center gap-10">
          <h3 class="text-4xl">Welcome to Sundaram Developers</h3>
          <p>Sundaram Developers is a steadily-growing real estate company engaged in construction of several real
            estate projects across the Upper Assam to meet the growing demand of an emergent India’s Look East Policy.
          </p>
        </div>
      </div>
    </section>

    <section class="p-8 lg:px-16 bg-white">
      <h2 class="text-center">
        Board Of Directors
      </h2>
      <div class="space-y-6">
        <div v-for="director in directors" class="grid lg:grid-cols-2" :key="director.name">
          <div class="flex justify-center">
            <img 
            :src="director.img" 
            :alt="director.name" 
            loading="lazy" />
          </div>
          <div class="flex justify-center flex-col text-center gap-3">
            <h2 class="text-3xl font-medium border-e-4 border-black py-2 border-b-1">{{ director.name }}</h2>
            <p>{{ director.desc }}</p>
          </div>
        </div>
      </div>
    </section>

        <section class="p-8 lg:px-16">
      <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-5 bg-blue-600 py-5">
        <CountingCard :to="1999" :duration="1000" label="Since" />
        <CountingCard :to="405" :duration="1250" label="Clients" postfix="+" class="md:border-x-3 border-white"/>
        <CountingCard :to="53" :duration="1500" label="Projects" postfix="+"/>
      </div>
    </section>


    <section class="p-8 lg:px-16 text-zinc-900">
      <h2 class="text-center">Ready to Find Your dream Home?</h2>
      <div class="container max-w-8xl mx-auto p-4">
        <div class="flex flex-col md:flex-row items-center justify-center gap-6 text-lg mb-6">
          <div class="flex gap-2">
            <Io5Call />
            <span>9886847886</span>
          </div>
          <div class="flex gap-2">
            <Io5Mail />
            <span>sundaramconstjrt15@gmail.com</span>
          </div>
        </div>
        <div class="flex justify-center ">
          <Link href="/contact"
            class="flex gap-2 bg-[#ff4c4c] text-white font-semibold items-center rounded px-5 py-2 shadow cursor-pointer hover:shadow-lg hover:scale-95 transition duration-150">
            <span>Contact Us</span>
            <Io5Call class="w-4" />
          </Link>
        </div>
      </div>
    </section>
    <Footer />
  </AppLayout>
</template>