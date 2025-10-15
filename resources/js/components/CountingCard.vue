<template>
    <div class="text-sky-100 py-3">
        <h3 class="text-5xl font-bold text-center">
            {{ displayValue }} {{ postfix }}
        </h3>
        <p class="text-center text-xl">{{ props.label }}</p>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref, onMounted, watch } from 'vue';
  const props = defineProps({ 
    to: { type: Number, required: true },
    duration: { type: Number, default: 1000 },
    label: { type: String, default: "" },
    postfix: { type: String, default: "" }
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
  