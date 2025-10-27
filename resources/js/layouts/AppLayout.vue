    <script setup lang="ts">
    import AppLayout from '@/layouts/app/AppHeaderLayout.vue';
    import type { Auth, BreadcrumbItemType, User } from '@/types';
    import { useEditorState } from '@/store/Editor';
    import MediaPicker from '@/components/media/MediaPicker.vue';

    interface Props {
        breadcrumbs?: BreadcrumbItemType[];
        auth: Auth
    }

    const props = withDefaults(defineProps<Props>(), {
        breadcrumbs: () => [],
    });

    console.log(props);

    const { editorOpen, closeEditor } = useEditorState()

</script>

    <template>
        <AppLayout :breadcrumbs="breadcrumbs">
            <slot />
        </AppLayout>
        <MediaPicker v-if="editorOpen && props.auth?.user.is_admin" :src="'hi'" :element-slug="'j'" :element-title="'a'" :close="closeEditor"/>
    </template>
