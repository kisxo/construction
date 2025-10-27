<script setup lang="ts">
import { useEditorState } from '@/store/Editor';
import { usePage } from '@inertiajs/vue3';

const page = usePage()

// Define props with improved type safety and defaults
interface Props {
    src: string;
    elementSlug: string;
    elementTitle: string;
    class?: string;
}
const props = defineProps<Props>()

const {openEditor}= useEditorState();
</script>

<template>
    <img :src="props.src" @click.right.prevent="()=>{openEditor(props.elementSlug, props.elementTitle, page.url)}" :alt="props.elementTitle" :class="[props.class, 'cursor-pointer']" loading="lazy" class="object-cover">
</template>