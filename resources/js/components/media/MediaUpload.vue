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
import axios from 'axios'

const emit = defineEmits(['uploaded'])
const input = ref<HTMLInputElement | null>(null)

const triggerUpload = () => input.value?.click()

const uploadFiles = async (e: Event) => {
  const files = (e.target as HTMLInputElement).files
  if (!files) return

  for (const file of Array.from(files)) {
    // Step 1: Get Presigned URL
    const presignRes = await axios.post('/api/media/presign', {
      filename: file.name,
      type: file.type
    })
    const { url, path, uuid, filename } = presignRes.data

    // Step 2: Upload file directly to MinIO
    await fetch(url, {
      method: 'PUT',
      headers: { 'Content-Type': file.type },
      body: file
    })

    // Step 3: Notify backend to store metadata
    await axios.post('/api/media/complete', {
      uuid,
      path,
      name: file.name,
      type: file.type,
      size: file.size
    })
  }

  emit('uploaded')
}
</script>
