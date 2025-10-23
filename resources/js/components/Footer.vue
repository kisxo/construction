<template>
  <footer class="bg-black text-gray-200 border-t border-gray-700">
    <div class=" container mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-7 gap-10 mt-10">
      <!-- Company Info -->
      <div class="sm:col-span-2 lg:col-span-3">
        <div class="flex items-center gap-2 mb-3">
          <i class="las la-building text-2xl text-white"></i>
                  <Building/>
          <h2 class="text-xl font-semibold">Sundaram Developers</h2>
        </div>
        <p class="text-gray-400 text-sm leading-relaxed">
          Building tomorrow’s communities today with excellence and innovation.
        </p>
        <div class="pt-6">
          <p class="text-lg font-semibold mb-1 text-gray-400">Our Visitors</p>
          <p class="text-sm text-gray-500">Total visitors: {{ totalVisitors }}</p>
          <p class="text-sm text-gray-500">Today's visitors: {{ todayVisitors }}</p>
        </div>
        <!-- <AppLogoIcon/> -->
      </div>

      <!-- Project Links -->
      <div class="lg:col-span-2">
        <h3 class="text-lg font-semibold mb-3">Projects</h3>
        <ul class="space-y-2 text-gray-400 text-sm">
          <li><Link prefetch="hover" to="/divine-green" class="hover:text-white">Divine Green</Link></li>
          <li><Link prefetch="hover" to="/sky-link-heights" class="hover:text-white">Sky Link Heights</Link></li>
          <li><Link prefetch="hover" to="/shivashree" class="hover:text-white">Shivashree Apartment</Link></li>
          <li><Link prefetch="hover" to="/horo-gauri" class="hover:text-white">Horo Gauri Complex</Link></li>
          <li><Link prefetch="hover" to="/pb-arcade" class="hover:text-white">P.B Arcade</Link></li>
        </ul>
      </div>

      <!-- Quick Links -->
      <div class="lg:col-span-2">
        <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
        <ul class="space-y-2 text-gray-400 text-sm">
          <li><Link to="/" class="hover:text-white">Home</Link></li>
          <li><Link to="/about" class="hover:text-white">About Us</Link></li>
          <li><Link to="/contact" class="hover:text-white">Contact</Link></li>
        </ul>
      </div>

      <!-- Visitor Section
      <div>
        <h3 class="text-lg font-semibold mb-3">Our Visitors</h3>
        <p class="text-sm text-gray-400">Total visitors: {{ totalVisitors }}</p>
        <p class="text-sm text-gray-400">Today's visitors: {{ todayVisitors }}</p>
      </div> -->
    </div>

    <!-- Bottom Section -->
    <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-500 text-sm mb-10">
      <p>
        © 2025 Sundaram Developers. All rights reserved.
      </p>
      <p class="mt-1 font-medium text-gray-400">
        Powered by <span class="text-gray-300"><a href="https://www.deolang.com" target="_blank" prefetch="hover">DeoLang</a></span>
      </p>
    </div>

     <!-- Back to Top Button -->
     <a
      href="#header-top"
      class="fixed bottom-6 left-6 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-3xl shadow-lg transition"
      aria-label="move to top"
    >
      <component :is="Io5ChevronUp" class="w-6 h-6 mx-auto" />
      <!-- <i class="las la-angle-up text-lg"></i> -->
    </a>

    <!-- Back to Top Button -->
    <a
      href="https://wa.me/919435095488"
      target="_blank"
      class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-700 text-white p-3 rounded-3xl shadow-lg transition"
      aria-label="open whatsapp"
    >
      <component :is="Io5LogoWhatsapp" class="w-6 h-6 mx-auto" />
    </a>
    <a
      href="tel:+919435095488"
      target="_blank"
      class="fixed bottom-20 right-6 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-3xl shadow-lg transition"
      aria-label="make phone call"
    >
      <component :is="Io5Call" class="w-6 h-6 mx-auto" />
    </a>
  </footer>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { Building } from "lucide-vue-next";
import { Io5Call, Io5ChevronUp, Io5LogoWhatsapp } from "vue-icons-plus/io5";
import { Link } from "@inertiajs/vue3";

const totalVisitors = ref(0);
const todayVisitors = ref(0);

onMounted(() => {
  // Simple visitor counter using localStorage (demo only)
  const today = new Date().toDateString();
  const visits = JSON.parse(localStorage.getItem("visits") || "{}");

  // Increment today's visitors
  if (visits.date === today) {
    visits.today += 1;
  } else {
    visits.date = today;
    visits.today = 1;
  }
  visits.total = (visits.total || 0) + 1;
  localStorage.setItem("visits", JSON.stringify(visits));

  totalVisitors.value = visits.total;
  todayVisitors.value = visits.today;
});

// function scrollToTop() {
//   window.scrollTo({ top: 0, behavior: "smooth" });
// }
</script>

<style scoped>
footer {
  font-family: "Inter", sans-serif;
}
</style>
