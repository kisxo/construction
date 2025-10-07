<template>
  <footer class="bg-black text-gray-200 py-10 border-t border-gray-700">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">
      <!-- Company Info -->
      <div class="">

        <div class="flex items-center gap-2 mb-3">
          <i class="las la-building text-2xl text-white"></i>
                  <Building/>
          <h2 class="text-xl font-semibold">Sundaram Developers</h2>
        </div>
        <p class="text-gray-400 text-sm leading-relaxed">
          Building tomorrow’s communities today with excellence and innovation.
        </p>
        <!-- <AppLogoIcon/> -->
      </div>

      <!-- Quick Links -->
      <div>
        <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
        <ul class="space-y-2 text-gray-400 text-sm">
          <li><RouterLink to="/" class="hover:text-white">Home</RouterLink></li>
          <li><RouterLink to="/about" class="hover:text-white">About Us</RouterLink></li>
          <li><RouterLink to="/contact" class="hover:text-white">Contact</RouterLink></li>
        </ul>
      </div>

      <!-- Visitor Section -->
      <div>
        <h3 class="text-lg font-semibold mb-3">Our Visitors</h3>
        <p class="text-sm text-gray-400">Total visitors: {{ totalVisitors }}</p>
        <p class="text-sm text-gray-400">Today's visitors: {{ todayVisitors }}</p>
      </div>
    </div>

    <!-- Bottom Section -->
    <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-500 text-sm">
      <p>
        © 2025 Sundaram Developers. All rights reserved.
      </p>
      <p class="mt-1 font-medium text-gray-400">
        Powered by <span class="text-gray-300">DeoLang</span>
      </p>
    </div>

    <!-- Back to Top Button -->
    <button
      @click="scrollToTop"
      class="fixed bottom-6 right-6 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg shadow-lg transition"
    >
      <i class="las la-angle-up text-lg"></i>
    </button>
  </footer>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import AppLogoIcon from "./AppLogoIcon.vue";
import AppLogo from "./AppLogo.vue";
import { Building } from "lucide-vue-next";

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

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
</script>

<style scoped>
footer {
  font-family: "Inter", sans-serif;
}
</style>
