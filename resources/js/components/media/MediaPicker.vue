<template>
  <div
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
    @click.self="close"
  >
    <div class="bg-white w-[90%] md:w-[80%] lg:w-[70%] rounded-2xl shadow-xl overflow-hidden flex flex-col">
      <!-- Header -->
      <div class="flex justify-between items-center p-4 border-b">
        <h2 class="text-lg font-semibold">Media Library</h2>
        <button @click="close" class="text-gray-500 hover:text-gray-700">
          ✕
        </button>
      </div>

      <!-- Toolbar -->
      <div class="flex items-center justify-between px-4 py-2 bg-gray-50 border-b">
        <div class="flex gap-2">
          <select v-model="filterType" class="border rounded-md px-2 py-1 text-sm">
            <option value="">All Types</option>
            <option value="image">Images</option>
            <option value="video">Videos</option>
            <option value="audio">Audio</option>
            <option value="document">Documents</option>
          </select>

          <input
            type="text"
            v-model="search"
            placeholder="Search media..."
            class="border rounded-md px-2 py-1 text-sm"
          />
        </div>

        <MediaUpload @uploaded="fetchMedia" />
      </div>

      <!-- Media Grid -->
      <div class="p-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 overflow-y-auto h-[60vh]">
        <div
          v-for="item in filteredMedia"
          :key="item.id"
          @click="select(item)"
          class="relative border rounded-lg overflow-hidden cursor-pointer group"
          :class="{ 'ring-2 ring-blue-500': selectedItem?.id === item.id }"
        >
          <img
            v-if="item.type === 'image'"
            :src="item.url"
            class="object-cover w-full h-32"
          />
          <video
            v-else-if="item.type === 'video'"
            class="object-cover w-full h-32"
            muted
          >
            <source :src="item.url" />
          </video>
          <div v-else class="flex items-center justify-center w-full h-32 bg-gray-100 text-gray-500 text-xs">
            {{ item.extension.toUpperCase() }}
          </div>
          <div
            class="absolute bottom-0 w-full bg-black/40 text-white text-xs p-1 truncate"
            :title="item.name"
          >
            {{ item.name }}
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="flex justify-end items-center gap-3 p-4 border-t">
        <button
          class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300 text-sm"
          @click="close"
        >
          Cancel
        </button>
        <button
          class="px-4 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white text-sm disabled:opacity-50"
          :disabled="!selectedItem"
          @click="confirmSelection"
        >
          Select
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import MediaUpload from './MediaUpload.vue'
import { getAllMedia } from './MediaService'

const emit = defineEmits(['selected', 'close'])

const media = ref<any[]>([])
const search = ref('')
const filterType = ref('')
const selectedItem = ref<any | null>(null)

const isLoading = ref(false)

const fetchMedia = async () => {
  isLoading.value = true
  try {
    media.value = await getAllMedia()
  } finally {
    isLoading.value = false
  }
}

const filteredMedia = computed(() =>
  media.value.filter((m) => {
    const matchesType = filterType.value ? m.type === filterType.value : true
    const matchesSearch = search.value
      ? m.name.toLowerCase().includes(search.value.toLowerCase())
      : true
    return matchesType && matchesSearch
  })
)

const select = (item: any) => {
  selectedItem.value = item
}

const confirmSelection = () => {
  if (selectedItem.value) emit('selected', selectedItem.value)
  close()
}

const close = () => emit('close')

onMounted(fetchMedia)
</script>

<style scoped>
/* Optional transitions */
</style>
