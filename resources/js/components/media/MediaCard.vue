<template>
  <div class="relative border rounded-lg overflow-hidden group shadow hover:shadow-lg transition-shadow duration-200">

    <!-- Overlay Actions -->
    <div
      class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 flex flex-col justify-between p-2 transition-opacity duration-200 z-10">
      <div class="flex justify-between items-center">
        <input type="checkbox" :checked="isSelected" @change="toggle" class="w-4 h-4" />
        <button @click.stop="$emit('preview', item)" class="text-white text-sm hover:text-blue-300">Preview</button>
      </div>
      <div class="flex justify-between items-center mt-auto gap-1">
        <button @click.stop="$emit('copy', item)" class="bg-white/70 px-1 rounded text-xs hover:bg-white">Copy
          URL</button>
        <button @click.stop="$emit('toggle-public', item)" class="px-1 rounded text-xs"
          :class="item.is_public ? 'bg-green-600 hover:bg-green-700' : 'bg-gray-600 hover:bg-gray-700'">
          {{ item.is_public ? 'Public' : 'Private' }}
        </button>
        <button @click.stop="$emit('delete', item)"
          class="bg-red-600 px-1 rounded text-xs hover:bg-red-700">Delete</button>
      </div>
    </div>

    <!-- Media Content -->
    <img v-if="item.mime_type.startsWith('image/')" :src="thumbUrl" class="w-full h-40 object-cover" loading="lazy" />
    <video v-else-if="item.mime_type.startsWith('video/')" :src="signedUrl" class="w-full h-40 object-cover" muted
      controls></video>
    <div v-else class="flex items-center justify-center w-full h-40 bg-gray-100 dark:bg-gray-800 text-gray-500 text-xs">
      {{ extLabel }}
    </div>

    <!-- Name -->
    <div class="absolute bottom-0 w-full bg-black/60 text-white text-xs p-1 truncate text-center">
      <input class="bg-transparent w-full text-center text-xs" :value="item.original_name" @blur="onRename"
        @keyup.enter="onRename" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps<{
  item: any
  selected: number[]
  signedUrl?: string
}>()
const emits = defineEmits(['update:selected', 'preview', 'copy', 'delete', 'toggle-public', 'rename'])

const isSelected = computed(() => props.selected.includes(props.item.id))
const toggle = () => {
  const next = isSelected.value
    ? props.selected.filter((id: number) => id !== props.item.id)
    : [...props.selected, props.item.id]
  emits('update:selected', next)
}

const extLabel = computed(() =>
  props.item.extension?.toUpperCase?.() || props.item.mime_type?.split('/')?.pop()?.toUpperCase?.() || 'FILE'
)

const thumbUrl = computed(() => props.signedUrl || props.item.variants?.small || props.item.path)
const signedUrl = computed(() => props.signedUrl || props.item.path)

const onRename = (ev: any) => {
  const name = ev?.target?.value?.trim()
  if (name && name !== props.item.original_name) emits('rename', { ...props.item, original_name: name })
}
</script>
