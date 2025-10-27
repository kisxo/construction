    <script setup lang="ts">
    import AppLayout from '@/layouts/app/AppHeaderLayout.vue';
    import type { BreadcrumbItemType } from '@/types';
    import { useEditorState } from '@/store/Editor';
import MediaPicker from '@/components/media/MediaPicker.vue';


    interface Props {
        breadcrumbs?: BreadcrumbItemType[];
    }

    withDefaults(defineProps<Props>(), {
        breadcrumbs: () => [],
    });

    const { editorOpen, closeEditor } = useEditorState()

</script>

    <template>
        <AppLayout :breadcrumbs="breadcrumbs">
            <slot />
        </AppLayout>
        <MediaPicker v-if="editorOpen" :src="'hi'" :element-slug="'j'" :element-title="'a'" :close="closeEditor"/>
    </template>
