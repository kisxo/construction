<script setup lang="ts">
import { ref, watch } from 'vue';
import skyLink from "../../images/sky_link_heights/sdimg_sm.png";
import { Link } from '@inertiajs/vue3';
import { useHead } from '@vueuse/head';
import { heights } from '@/routes/sky/link';

// Define props to control visibility from the parent
const props = defineProps({
  show: {
    type: Boolean,
    default: false,
  }
});

// Define an event to tell the parent to close the modal
const emit = defineEmits(['close']);

const showPopup = ref(props.show);

// Watch for changes in the 'show' prop
watch(() => props.show, (newVal) => {
  showPopup.value = newVal;
});

// Emit the 'close' event when the close button is clicked
function closeModal() {
  emit('close');
}

useHead({
  link: [
    { rel: 'preload', href: skyLink, as:'image'}
  ]
});
</script>

<template>
  <!-- Use Vue's <Transition> component for a nice fade effect -->
  <Transition name="fade">
    <div v-if="showPopup" @click.self="closeModal" class="modal-overlay">
      <div class="modal-content">
        <button @click="closeModal" class="close-button" aria-label="Close modal">
          &times;
        </button>
        <!-- The content of the popup will be passed in here -->
        <div class="relative">
            <div class="flex justify-center items-center gap-4 mb-4">
              <img src="../../../public/logo.png" class="w-8 h-8" />
              <h2 class="font-semibold text-blue-700 text-xl text-center">Affordable Housing in <strong>Jorhat</strong></h2>
            </div>
            <img :src="skyLink" class="h-full md:max-w-[600px] max-w-[290px] w-auto" />
            <div class="absolute ">
                <picture>
                  <!-- <source media="(min-width:650px)" srcset="img_pink_flowers.jpg"> -->
                  <source media="(max-width:500px)" srcset="../../images/family.webp">
                  <img src="../../images/family_sm.webp" alt="family" class="max-w-[130px] md:max-w-[200px] -mt-58 md:-mt-80">
                </picture> 
                <span class="absolute px-5 py-2 -mt-14 -mx-4 shadow-lg shadow-black font-bold text-lg md:text-3xl bg-red-700 text-white whitespace-nowrap">
                    Home, Sweet Home!
                </span>
            </div>
            <div class="flex flex-col sm:flex-row text-center items-center justify-center sm:gap-4 gap-2 pt-8">
                <p class="text-blue-600 font-semibold uppercase text-2xl">Sky Link Heights</p>
                <Link :to="heights()" class="font-bold text-white bg-red-600 p-2 px-4 rounded-xl shadow hover:scale-95" >know more</Link>
            </div>
        </div>
      </div>
    </div>
  </Transition>
</template>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
  backdrop-filter: blur(6px);
}

.modal-content {
  background-color: white;
  padding: 2rem 1rem;
  border-radius: 8px;
  position: relative;
  min-width: 300px;
  max-width: 97vw;
  max-height: 90vh;
  overflow-y: hidden;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.close-button {
  position: absolute;
  top: 0.5rem;
  right: 1rem;
  border: none;
  background: transparent;
  font-size: 2rem;
  line-height: 1;
  cursor: pointer;
  color: #333;
}

/* Transition styles for the fade effect */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.4s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>
