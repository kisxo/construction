<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css';
import { ref, onMounted, defineAsyncComponent } from 'vue';
import { Carousel, Slide } from 'vue3-carousel';
import axios from 'axios';
import { useHead } from '@vueuse/head';
import { Link } from '@inertiajs/vue3';
import { Io5Call, Io5Mail } from 'vue-icons-plus/io5';
import { Fa6Hotel, Fa6Leaf, Fa6Shield, Fa6Wifi } from 'vue-icons-plus/fa6';

const AppLayout = defineAsyncComponent(() => import('@/layouts/AppLayout.vue'));
const Footer = defineAsyncComponent(() => import('@/components/Footer.vue'));
const ImageCard = defineAsyncComponent(() => import('@/components/ImageCard.vue'));
const CountingCard = defineAsyncComponent(() => import('@/components/CountingCard.vue'));
const MediaPicker = defineAsyncComponent(() => import('@/components/media/MediaPicker.vue'));

// Admin mode (demo)
const isAdmin = ref(true);

// Media state
const hero = ref<any[]>([]);
const signature = ref<any[]>([]);
const completed = ref<any[]>([]);
const directors = ref<any[]>([]);

// Fetch page media
const fetchPageMedia = async () => {
  try {
    const res = await axios.get('/api/pages/home/media');
    hero.value = res.data.hero || [];
    signature.value = res.data.signature || [];
    completed.value = res.data.completed || [];
    directors.value = res.data.directors || [];
  } catch (err) {
    console.error('Error fetching media:', err);
  }
};

// Picker control
const isPickerOpen = ref(false);
const pickerRole = ref<string | null>(null);

const openPicker = (role: string) => {
  pickerRole.value = role;
  isPickerOpen.value = true;
};

// When user selects media
const onSelectMedia = async (ids: number[]) => {
  if (!pickerRole.value) return;

  try {
    await axios.post(`/api/pages/home/media`, {
      media_ids: ids,
      role: pickerRole.value,
    });
    await fetchPageMedia();
  } catch (err) {
    console.error('Error attaching media:', err);
  } finally {
    isPickerOpen.value = false;
    pickerRole.value = null;
  }
};

onMounted(fetchPageMedia);

// Key features
const keyFeatures = [
  { icon: Fa6Wifi, title: 'Smart Home Technology', desc: 'Connected living made simple' },
  { icon: Fa6Leaf, title: 'Eco-Friendly Design', desc: 'Sustainable and green spaces' },
  { icon: Fa6Hotel, title: '24/7 Security', desc: 'Safe and secure environment' },
  { icon: Fa6Shield, title: 'World-Class Facilities', desc: 'Premium construction quality' },
];

// Carousel settings
const carouselConfig = { itemsToShow: 1, wrapAround: true, autoplay: 3000 };

useHead({
  title: 'Home | Sundaram Developers',
  meta: [
    { name: 'description', content: 'Explore affordable and spacious flats in Jorhat with modern amenities.' },
  ],
});
</script>

<template>
  <AppLayout>
    <!-- Hero Section -->
    <section class="relative w-full h-[70vh] overflow-hidden" id="herotop">
      <Carousel v-bind="carouselConfig" class="w-full h-full">
        <Slide v-for="img in hero" :key="img.id">
          <img :src="img.url" class="w-full h-full object-cover brightness-40" />
        </Slide>
      </Carousel>

      <div v-if="isAdmin" class="absolute top-4 right-4">
        <button @click="openPicker('hero')" class="bg-blue-500 text-white px-3 py-1 rounded">Change Hero</button>
      </div>

      <div class="absolute inset-0 flex items-center justify-center text-center text-white">
        <div>
          <h1 class="text-5xl font-bold">Building Smart Homes for Modern Living</h1>
          <p class="mt-3">Discover future-ready homes in the heart of Guwahati.</p>
        </div>
      </div>
    </section>

    <!-- Signature Projects -->
    <section class="p-8 lg:px-16 bg-neutral-100">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Our Signature Projects</h2>
        <button v-if="isAdmin" @click="openPicker('signature')" class="bg-blue-500 text-white px-3 py-1 rounded">Change</button>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <ImageCard v-for="img in signature" :key="img.id" :image="img.url" :title="img.original_name" />
      </div>
    </section>

    <!-- Completed Projects -->
    <section class="p-8 lg:px-16 bg-neutral-100">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Completed Projects</h2>
        <button v-if="isAdmin" @click="openPicker('completed')" class="bg-blue-500 text-white px-3 py-1 rounded">Change</button>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <ImageCard v-for="img in completed" :key="img.id" :image="img.url" :title="img.original_name" />
      </div>
    </section>

    <!-- Directors -->
    <section class="p-8 lg:px-16 bg-white">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Board of Directors</h2>
        <button v-if="isAdmin" @click="openPicker('directors')" class="bg-blue-500 text-white px-3 py-1 rounded">Change</button>
      </div>
      <div class="grid md:grid-cols-2 gap-6">
        <div v-for="dir in directors" :key="dir.id" class="text-center">
          <img :src="dir.url" :alt="dir.original_name" class="w-full h-80 object-cover" />
          <h3 class="mt-2 font-semibold">{{ dir.original_name }}</h3>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <Footer />

    <!-- Media Picker -->
    <MediaPicker
      v-if="isPickerOpen"
      @close="isPickerOpen = false"
      @selected="onSelectMedia"
    />
  </AppLayout>
</template>
