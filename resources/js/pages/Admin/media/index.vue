<script setup lang="ts">
import { ref, computed } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import Input from '@/components/ui/input/Input.vue'
import { useForm } from '@inertiajs/vue3'
import { MediaItem } from '@/types/custom'

interface Props {
  mediaList: MediaItem[]
}
const props = defineProps<Props>()

const fileInput = ref<HTMLInputElement | null>(null)
const searchQuery = ref('')
const sortOrder = ref('created_desc')
const showUploadModal = ref(false) // controls modal visibility

// Inertia form
const form = useForm({
  file: null,
})

// Filtered and sorted media
const filteredMedia = computed(() => {
  let items = [...props.mediaList]

  if (searchQuery.value.trim() !== '') {
    const q = searchQuery.value.toLowerCase()
    items = items.filter(
      (m) =>
        m.original_name.toLowerCase().includes(q) ||
        (m.tags?.some((t) => t.toLowerCase().includes(q)) ?? false) ||
        (m.type?.toLowerCase().includes(q) ?? false)
    )
  }

  items.sort((a, b) => {
    switch (sortOrder.value) {
      case 'created_asc':
        return new Date(a.created_at).getTime() - new Date(b.created_at).getTime()
      case 'created_desc':
        return new Date(b.created_at).getTime() - new Date(a.created_at).getTime()
      case 'name_asc':
        return a.original_name.localeCompare(b.original_name)
      case 'name_desc':
        return b.original_name.localeCompare(a.original_name)
      case 'size_asc':
        return a.size - b.size
      case 'size_desc':
        return b.size - a.size
      default:
        return 0
    }
  })

  return items
})

const openUploadModal = () => {
  showUploadModal.value = true
}

const closeUploadModal = () => {
  showUploadModal.value = false
}

const submitUpload = () => {
  form.post('/admin/media/store', {
    onSuccess: () => {
      closeUploadModal()
      form.reset()
    },
  })
}
</script>

<template>
  <AdminLayout>
    <div class="h-full flex gap-6 p-6">

      <!-- Main Section -->
      <section class="flex-1 flex flex-col gap-4 min-w-0">

        <!-- Toolbar -->
        <div class="flex flex-wrap items-center gap-2">
          <button
            @click="openUploadModal"
            class="bg-blue-600 text-white px-4 rounded h-10 flex items-center gap-2 hover:bg-blue-700"
          >
            Upload
          </button>

          <div class="flex-1 relative h-10">
            <input
              v-model="searchQuery"
              placeholder="Search name, tag, type..."
              class="w-full border px-3 rounded pr-9 h-10"
            />
          </div>

          <select v-model="sortOrder" class="border px-2 rounded text-sm h-10">
            <option value="created_desc">Newest</option>
            <option value="created_asc">Oldest</option>
            <option value="size_desc">Largest</option>
            <option value="size_asc">Smallest</option>
            <option value="name_asc">Name A–Z</option>
            <option value="name_desc">Name Z–A</option>
          </select>
        </div>

        <!-- Media Grid -->
        <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2">
          <div v-for="item in filteredMedia" :key="item.id" class="w-full aspect-square overflow-hidden rounded">
            <img
              v-if="item.variants?.small"
              :src="'https://minio-hc4.deolang.com/sundaram/' + item.variants.medium"
              :alt="item.original_name"
              class="w-full h-full object-cover"
              loading="lazy"
            />
            <div v-else class="flex items-center justify-center h-full bg-gray-200 text-gray-600">
              {{ item.original_name }}
            </div>
          </div>
        </div>

      </section>
    </div>

    <!-- Upload Modal -->
    <div
      v-if="showUploadModal"
      class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
    >
      <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
        <button
          @click="closeUploadModal"
          class="absolute top-3 right-3 text-gray-500 hover:text-gray-800"
        >
          ✕
        </button>

        <h2 class="text-xl font-bold mb-4">Upload Media</h2>

        <form @submit.prevent="submitUpload" class="flex flex-col gap-4">
          <Input
            type="file"
            @Input="form.file = $event.target.files[0]"
          />
          <div v-if="form.errors.file" class="text-red-500">{{ form.errors.file }}</div>

          <button
            type="submit"
            :disabled="form.processing"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 disabled:opacity-50"
          >
            Upload
          </button>
        </form>
      </div>
    </div>
  </AdminLayout>
</template>
