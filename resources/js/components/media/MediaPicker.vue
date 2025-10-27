<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import { getAllMedia } from './MediaService'
import Button from '../ui/button/Button.vue'
import { useEditorState } from '@/store/Editor'
import axios from 'axios'
import { usePage, router } from '@inertiajs/vue3'
import { CircleCheckBigIcon } from 'lucide-vue-next'

const { closeEditor, resourceData } = useEditorState()

const page = usePage()
const emit = defineEmits(['selected', 'close'])

const media = ref<any[]>([])
const search = ref('')
const filterType = ref('')
const selectedId = ref<number | null>(null)
const isLoading = ref(false)
const showSuccess = ref(false)

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

const toggleSelect = (item: any) => {
  selectedId.value = item.id
}

onMounted(fetchMedia)

async function updateResource() {
  if (!selectedId.value) return

  isLoading.value = true
  const payload = {
    slug: resourceData.value.elementSlug,
    title: resourceData.value.elementTitle,
    media_id: selectedId.value,
    path: resourceData.value.pageUrl,
    type: 'image',
  }

  try {
    const res = await axios.post('/api/resources', payload)
    console.log('✅ Updated successfully', res.data)
    showSuccess.value = true
    router.reload()
    setTimeout(() => {
      closeEditor()
      showSuccess.value = false
    }, 400)
  } catch (err) {
    console.error('❌ Update failed', err)
  } finally {
    isLoading.value = false
  }
}
</script>

<template>
  <!-- Editor Modal -->
  <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white w-[90%] md:w-[80%] lg:w-[70%] rounded shadow-xl overflow-hidden flex flex-col relative">

      <!-- Header -->
      <div class="flex justify-between items-center p-4 border-b">
        <h2 class="text-lg font-semibold">
          Media Library — {{ resourceData.elementTitle }}
        </h2>
        <button @click="closeEditor" class="text-gray-500 hover:text-gray-700">✕</button>
      </div>

      <!-- Toolbar -->
      <div class="flex items-center justify-between px-4 py-2 bg-gray-50 border-b">
        <select v-model="filterType" class="border rounded-md px-2 py-1 text-sm">
          <option value="">All Types</option>
          <option value="image">Images</option>
          <option value="video">Videos</option>
        </select>
        <input v-model="search" placeholder="Search media..." class="border rounded-md px-2 py-1 text-sm" />
      </div>

      <!-- Media Grid -->
      <div class="relative flex-1 p-4">
        <!-- Loading Overlay -->
        <div v-if="isLoading" class="absolute inset-0 bg-white/80 flex items-center justify-center z-10">
          <div class="flex flex-col items-center">
            <svg class="animate-spin h-8 w-8 text-blue-600 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
            </svg>
            <p class="text-gray-600 text-sm font-medium">Loading...</p>
          </div>
        </div>

        <!-- Media Thumbnails -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
          <div v-for="item in filteredMedia" :key="item.id" @click="toggleSelect(item)"
            class="relative border rounded-lg overflow-hidden cursor-pointer group"
            :class="{ 'ring-2 ring-blue-500': selectedId === item.id }">
            <img v-if="item.type === 'image'" :src="item.url" class="object-cover w-full h-32" />
            <video v-else-if="item.type === 'video'" class="object-cover w-full h-32" muted>
              <source :src="item.url" />
            </video>
            <div v-else class="flex items-center justify-center w-full h-32 bg-gray-100 text-gray-500 text-xs">
              {{ item.extension.toUpperCase() }}
            </div>
            <div v-if="selectedId === item.id"
              class="absolute top-1 right-1 bg-blue-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
              ✓
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="flex justify-end items-center gap-3 p-4 border-t">
        <Button @click="closeEditor" class="bg-gray-200 hover:bg-gray-300 text-sm px-4 py-2 rounded-md">
          Cancel
        </Button>
        <Button @click="updateResource" class="bg-blue-600 hover:bg-blue-700 text-sm px-4 py-2 rounded-md text-white"
          :disabled="!selectedId || isLoading">
          <span v-if="!isLoading">Select</span>
          <span v-else class="flex items-center gap-2">
            <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z" />
            </svg>
            Saving...
          </span>
        </Button>
      </div>

      <!-- Success Overlay -->
      <transition name="fade">
        <div v-if="showSuccess"
          class="absolute inset-0 bg-white backdrop-blur-sm flex items-center justify-center z-50">
          <div class="text-center flex text-green-500 gap-2">
            <CircleCheckBigIcon />
            <span>Updated Successfully!</span>
          </div>
        </div>
      </transition>
    </div>
  </div>
</template>
