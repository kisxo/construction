<script setup lang="ts">
import DynamicMedia from './DynamicMedia.vue';

// Define props with improved type safety and defaults
interface Props {
  link: string;
  data: any
  elementSlug: string;
  elementTitle: string;
  class?: string;
}

const props = defineProps<Props>()

</script>
<template>
  <a class="block relative overflow-hidden" :class="props.class" :href="props.link">
    <DynamicMedia :data="props.data" :element-title="props.elementTitle" :element-slug="props.elementSlug" :class="props.class" class="w-full h-full transition-transform duration-500 ease-in-out hover:scale-105" />
    <h3 class="bg-black/40 w-full absolute bottom-0 text-white/80">{{ props.elementTitle }}</h3>
  </a>
</template>