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

import { reactive } from "vue";

const form = reactive({
  name: "",
  email: "",
  phone: "",
  message: "",
});

function handleSubmit() {
  console.log("Form submitted:", form);
  alert("Thank you! Your message has been sent.");
}

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
    <section class="grid md:grid-cols-2 gap-12 bg-gray-50 py-16 px-6">
    <!-- Contact Form -->
    <div>
      <h2 class="text-3xl font-bold text-gray-800 mb-6">Contact Us</h2>

      <form
        @submit.prevent="handleSubmit"
        class="space-y-6 bg-white shadow-lg rounded-2xl p-8"
      >
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2"
            >Your Name</label
          >
          <input
            v-model="form.name"
            type="text"
            name="your-name"
            required
            maxlength="400"
            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2"
            >Your Email</label
          >
          <input
            v-model="form.email"
            type="email"
            name="your-email"
            required
            maxlength="400"
            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2"
            >Your Phone No</label
          >
          <input
            v-model="form.phone"
            type="tel"
            name="phone"
            required
            minlength="10"
            maxlength="10"
            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2"
            >Message / Query</label
          >
          <textarea
            v-model="form.message"
            name="message"
            required
            rows="5"
            maxlength="2000"
            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
          ></textarea>
        </div>

        <button
          type="submit"
          class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-all"
        >
          Submit
        </button>
      </form>
    </div>

    <!-- Contact Information -->
    <div class="flex flex-col justify-center space-y-4">
      <p class="text-gray-800 text-lg font-semibold">Call Us:</p>
      <p class="text-gray-600">+91-8256009114</p>

      <p class="text-gray-800 text-lg font-semibold">Email:</p>
      <p class="text-gray-600">developerssundaram@gmail.com</p>

      <p class="text-gray-800 text-lg font-semibold">Visit Us At:</p>
      <p class="text-gray-600">
        Tarazan, AT Road<br />
        Jorhat, Assam
      </p>
    </div>
  </section>

    <Footer />
  </AppLayout>
</template>