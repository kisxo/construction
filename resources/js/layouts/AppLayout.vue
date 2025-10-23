<script setup lang="ts">
import OfferModel from '@/components/OfferModel.vue';
import AppLayout from '@/layouts/app/AppHeaderLayout.vue';
import type { BreadcrumbItemType } from '@/types';
import { onMounted, ref } from 'vue';

// A ref to control the popup's visibility
const showWelcomePopup = ref(false);

// Use onMounted to show the popup after the page component is mounted
onMounted(() => {
  // You could add a delay or check a condition (e.g., if it's the user's first visit)
  showWelcomePopup.value = true;
});

// Function to close the popup, connected to the 'close' event
function closePopup() {
  showWelcomePopup.value = false;
}

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <OfferModel :show="showWelcomePopup" @close="closePopup"></OfferModel>
        <slot />
    </AppLayout>
</template>
