<template>
  <div>
    <button @click="isPickerOpen = true" class="btn">
      Change Media
    </button>

    <img v-if="selectedMedia" :src="selectedMedia.url" class="w-48 h-32 object-cover mt-2" />

    <MediaPicker
      v-if="isPickerOpen"
      @close="isPickerOpen = false"
      @selected="onSelect"
    />
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import MediaPicker from '@/components/media/MediaPicker.vue'
import axios from 'axios'

const props = defineProps<{ modelType: string; modelId: number; tag?: string; admin: boolean }>()
const emit = defineEmits(['updated'])

const isPickerOpen = ref(false)
const selectedMedia = ref<any>(null)

const fetchMedia = async () => {
  const { data } = await axios.get('/media-for', { params: { model_type: props.modelType, model_id: props.modelId, tag: props.tag }})
  selectedMedia.value = data
}

const onSelect = async (file: any) => {
  selectedMedia.value = file
  isPickerOpen.value = false

  // attach media to backend
  await axios.post('/media/attach', {
    media_uuid: file.uuid,
    model_type: props.modelType,
    model_id: props.modelId,
    tag: props.tag || null
  })

  emit('updated', file)
}

onMounted(fetchMedia)
</script>
