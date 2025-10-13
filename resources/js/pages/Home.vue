<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css';
import AppLayout from '@/layouts/AppLayout.vue';
import { Carousel, Slide } from 'vue3-carousel';
import heroImg1 from "../../images/hero-1.jpeg";
import heroImg2 from "../../images/hero-2.jpeg";
import heroImg3 from "../../images/hero-3.jpeg";
import { Wifi, Leaf, Shield, Hotel, Mail, Phone } from 'lucide-vue-next';
import Footer from '@/components/Footer.vue';
import { useHead } from '@unhead/vue';
import kalyanImg from "../../images/Kalyan.png";
import saurabhImg from "../../images/Saurabh.png";

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

const bodList = [
  {
    name: 'Mr. Kalyan Kumar Changkakoti',
    desc: 'A Civil Engineer having involved many years in constructions.',
    img: kalyanImg
  },
  {
    name: 'Mr. Saurabh Pran Tamuli',
    desc: 'A Govt. contractor and a real state businessman.',
    img: saurabhImg
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
      </div>

      <h2 class=" font-extrabold text-6xl text-center pb-16">About Us</h2>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div style="position: relative; width: 100%; max-width: 560px; aspect-ratio: 16/9; overflow: hidden;">
          <iframe
            src="https://www.youtube.com/embed/EEIYufLHfso?autoplay=1&amp;mute=1&amp;loop=1&amp;playlist=EEIYufLHfso&amp;controls=0&amp;showinfo=0&amp;modestbranding=1&amp;rel=0"
            frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media"
            allowfullscreen="" title="Video"
            style="width:100%; height:100%; border:0; display:block; object-fit:cover; pointer-events: none; cursor: default;">
          </iframe>
        </div>
        <div class="flex flex-col justify-center gap-10">
          <h3 class="font-bold text-4xl">Welcome to Sundaram Developers</h3>
          <p>Sundaram Developers is a steadily-growing real estate company engaged in construction of several real
            estate projects across the Upper Assam to meet the growing demand of an emergent India’s Look East Policy.
          </p>
        </div>
      </div>
    </div>
    <div class="px-6">
      <h2 class="text-6xl font-extrabold text-center mt-12 mb-12">
        Board Of Directors
      </h2>
      <div class="space-y-6">
        <div v-for="list in bodList" class="grid lg:grid-cols-2">
          <div class="flex justify-center">
            <img :src="list.img" alt=""></img>
          </div>
          <div class="flex justify-center flex-col text-center gap-3">
            <h2 class="text-3xl font-medium border-e-4 border-black py-2 border-b-1">{{ list.name }}</h2>
            <p>{{ list.desc }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-blue-500 m-6 p-8 grid grid-cols-1 gap-y-6 lg:grid-cols-3 text-white text-center">
      <div>
        <div class="font-bold text-6xl">1999</div>
        <div class="text-xl">Since</div>
      </div>
      <div class="lg:border-x-2 border-white">
        <div class="font-bold text-6xl">5,408+</div>
        <div class="text-xl">Clients</div>
      </div>
      <div>
        <div class="font-bold text-6xl">53+</div>
        <div class="text-xl">Projects</div>
      </div>
    </div>
    <section class="my-16 mx-6">
      <div class="container mx-auto flex flex-col items-center">
        <h2 class="font-bold text-3xl text-blue-900">Ready to Find Your Dream Home?</h2>
        <div class="flex gap-6 my-4 mx-auto py-4">
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
        <a class=" bg-[#ff4c4c] flex px-5 py-2 text-lg font-medium text-white content-evenly items-center gap-3">
          Contact Us
          <Phone class="size-5" />
        </a>
      </div>
    </section>
    <Footer />
  </AppLayout>
</template>