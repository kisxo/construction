<script setup lang="ts">
import { MINIO_ENDPOINT } from '@/lib/data';
import { useEditorState } from '@/store/Editor';
import { usePage } from '@inertiajs/vue3';
import NOTFoundImg from "../../images/404.png";

const page = usePage()

// Define props with improved type safety and defaults
interface Props {
    src: any;
    elementSlug: string;
    elementTitle: string;
    class?: string;
}

const props = defineProps<Props>()

const {openEditor}= useEditorState();

const resourceLink = props.src?.media?.variants?.large ? MINIO_ENDPOINT + props.src.media.variants.large : NOTFoundImg;
</script>

<template>
    <img :src="resourceLink" @click.right.prevent="()=>{openEditor(props.elementSlug, props.elementTitle, page.url)}" :alt="props.elementTitle" :class="[props.class, 'cursor-pointer']" loading="lazy" class="object-cover">
</template>