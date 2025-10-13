<template>
    <div class="bg-blue-700 text-sky-100 py-10">
        <h4 class="flex gap-1 items-center justify-center text-5xl font-bold text-center">
            {{ displayValue }}<Fa6Plus v-if="props.isPlus"/>
        </h4>
        <p class="text-center text-xl">{{ props.label }}</p>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref, onMounted, watch } from 'vue';
import { Fa6Plus } from 'vue-icons-plus/fa6';
  const props = defineProps({ 
    to: { type: Number, required: true },
    duration: { type: Number, default: 1000 },
    label: { type: String, default: "" },
    isPlus: { type: Boolean, default: false }
  });
  const displayValue = ref(0);
  
  function animateCount(start: number, end: number, duration: number) {
    const startTime = performance.now();
    function tick(currentTime: number) {
      const progress = Math.min((currentTime - startTime) / duration, 1);
      displayValue.value = Math.floor(start + (end - start) * progress);
      if (progress < 1) {
        requestAnimationFrame(tick);
      } else {
        displayValue.value = end;
      }
    }
    requestAnimationFrame(tick);
  }
  
  onMounted(() => {
    animateCount(0, props.to, props.duration);
  });
  
  watch(() => props.to, (val) => animateCount(displayValue.value, val, props.duration));
  </script>
  