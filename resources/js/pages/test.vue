<template>
  <div>
    <button @click="isPickerOpen = true">Change Image</button>
    <img :src="selectedImage?.url" class="w-48 h-32 object-cover mt-2" />

    <MediaPicker
      v-if="isPickerOpen"
      @close="isPickerOpen = false"
      @selected="onSelect"
    />
  </div>
</template>

<script setup>
import { ref } from 'vue'
import MediaPicker from '@/components/media/MediaPicker.vue'

const isPickerOpen = ref(false)
const selectedImage = ref(null)

const onSelect = (file) => {
  selectedImage.value = file
}
</script>
