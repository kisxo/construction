<template>
  <div class="relative group w-fit">
    <img
      :src="src"
      :alt="alt"
      class="rounded-lg shadow-sm cursor-pointer"
      @click="openPicker"
    />
    <button
      v-if="editable"
      @click="openPicker"
      class="absolute top-2 right-2 bg-white/80 hover:bg-white text-gray-800 rounded-full p-2 opacity-0 group-hover:opacity-100 transition"
    >
      <i class="fa fa-edit"></i>
    </button>

    <!-- <MediaPicker v-if="isPickerOpen" @selected="onSelected" @close="isPickerOpen = false" /> -->
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
// import MediaPicker from '@/components/media/MediaPicker.vue'

const props = defineProps({
  src: String,
  alt: String,
  editable: { type: Boolean, default: true },
  modelValue: String, // to bind URL
})

const emit = defineEmits(['update:modelValue'])

const isPickerOpen = ref(false)

const openPicker = () => (isPickerOpen.value = true)
const onSelected = (file) => {
  emit('update:modelValue', file.url)
  isPickerOpen.value = false
}
</script>
