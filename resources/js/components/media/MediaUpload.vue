<template>
  <div>
    <input ref="input" type="file" hidden multiple @change="uploadFiles" />
    <button
      @click="triggerUpload"
      class="bg-blue-600 text-white text-sm px-3 py-1 rounded hover:bg-blue-700"
    >
      Upload
    </button>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { uploadMedia } from './MediaService'

const emit = defineEmits(['uploaded'])
const input = ref<HTMLInputElement | null>(null)

const triggerUpload = () => input.value?.click()

const uploadFiles = async (e: Event) => {
  const files = (e.target as HTMLInputElement).files
  if (!files) return

  for (const file of Array.from(files)) {
    const form = new FormData()
    form.append('file', file)
    await uploadMedia(form)
  }
  emit('uploaded')
}
</script>
