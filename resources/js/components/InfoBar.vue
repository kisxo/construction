<script setup lang="ts">
import { MapPin, Phone, Mail } from 'lucide-vue-next';

</script>

<template>
    <div class="bg-black text-white">
        <div class="mx-auto flex flex-col md:flex-row p-3 items-center md:max-w-7xl text-xs font-bold gap-2">
            <div class="text-start w-full flex items-center gap-2">
                <MapPin class="size-4" />
                Guwahati, Assam
            </div>
            <div class="justify-end w-full flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <Phone class="size-4" />
                    <span>+91 6003948280</span>
                </div>
                <div class="flex items-center gap-2">
                    <Mail class="size-4" />
                    <span>developerssundaram@gmail.com</span>
                </div>
            </div>
        </div>
    </div>
</template>