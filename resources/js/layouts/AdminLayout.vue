<script setup lang="ts">
import AdminDashboardLayout from './app/AdminDashboardLayout.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AdminDashboardLayout :breadcrumbs="breadcrumbs">
        <slot />
    </AdminDashboardLayout>
</template>