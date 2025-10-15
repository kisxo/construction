<template>
  <div 
    ref="iframeContainer" 
    class="relative w-full h-96 rounded-lg overflow-hidden shadow-lg"
  >
    <img
      v-if="!isIframeLoaded"
      :src="placeholder"
      alt="Loading map"
      class="absolute top-0 left-0 w-full h-full object-cover"
    />
    <iframe
      v-if="isIframeLoaded"
      :src="iframeSrc"
      class="w-full h-full border-0"
      loading="lazy"
      allowfullscreen
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from 'vue'

const {iframeSrc, placeholder} = defineProps({
  iframeSrc: { type: String, required: true },
  placeholder: { type: String, required: true }
})

const isIframeLoaded = ref(false)
const iframeContainer = ref<HTMLElement | null>(null)

let observer: IntersectionObserver | null = null

onMounted(() => {
  if ('IntersectionObserver' in window && iframeContainer.value) {
    observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            isIframeLoaded.value = true
            observer?.disconnect()
          }
        })
      },
      { rootMargin: '200px' }
    )
    observer.observe(iframeContainer.value)
  } else {
    // No IntersectionObserver support fallback
    isIframeLoaded.value = true
  }
})

onBeforeUnmount(() => {
  observer?.disconnect()
})
</script>
