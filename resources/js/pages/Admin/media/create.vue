<script setup lang="ts">
import Input from '@/components/ui/input/Input.vue';
import AdminLayout from '@/layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  file: null,
});

</script>

<template>
  <AdminLayout>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">
      <h1 class="text-2xl font-bold mb-4">Upload Media</h1>

      <form @submit.prevent="form.post('/admin/media/store')">
        <Input type="file" @Input="form.file = $event.target.files[0]" />
        <div v-if="form.errors.file" class="text-red-500">{{ form.errors.file }}</div>
        <button type="submit" :disabled="form.processing"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 disabled:opacity-50">
          Upload
        </button>
      </form>
    </div>
  </AdminLayout>
</template>
