<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import img from "../../images/about.png";

const carouselConfig = {
    itemsToShow: 1,
    wrapAround: true,
    autoplay: 3000,
}

</script>

<template>
    <AppLayout>
        <!-- hero Section -->
        <section class="relative w-full h-[70vh] overflow-hidden" id="herotop">
            <Carousel v-bind="carouselConfig" class="w-full h-full">
                <Slide>
                    <div class="w-full h-[70vh] relative">
                        <img :src="img" alt="Hero Slide"
                            class="w-full h-full object-cover object-center brightness-40" />
                    </div>
                </Slide>
            </Carousel>

            <!-- ✅ Centered Overlay Content -->
            <div class="absolute inset-0 flex justify-center items-center p-8 lg:pb-16">
                <div class="z-10 p-6 text-white" data-aos="fade-right">
                    <h1 class="text-6xl font-bold">
                        Legacy Built on Trust
                    </h1>
                    <p class="text-lg pt-4">With over three decades of proven expertise, Sundaram Developers has been
                        shaping skylines and transforming landscapes since our foundation. We’ve proudly carried our
                        legacy through all these years, offering our clients reliability, integrity, and precision in
                        every project.</p>
                </div>
            </div>
        </section>

        <section class="flex flex-col items-center justify-center p-8 lg:p-16">
            <div class="">
                <h2 class="text-center">
                    Who We Are
                </h2>

                <p class="py-8">
                    Established in 1999, Sundaram Developers began as a modest local
                    contractor with a passion for quality craftsmanship.
                    <br>
                     Today, we are a
                    name synonymous with
                    <strong>structural excellence</strong>,
                    <strong>eco-conscious practices</strong>, and
                    <strong>client-first project delivery</strong>.
                </p>

                <p class="">
                    We specialize in:
                </p>

                <ul class="list-disc ps-8">
                    <li>Residential & Commercial Developments</li>
                    <li>Smart Infrastructure Projects</li>
                    <li>Shoreline Erosion Control & Barge Services</li>
                    <li>Environmentally Sustainable Construction</li>
                </ul>
            </div>
        </section>

        <section class="flex flex-col items-center justify-center bg-neutral-100 p-8 lg:p-16">
            <div class="">
                <h2 class="text-center">
                    Our Philosophy
                </h2>

                <p class="py-8">
                    At Sundaram Developers, we believe every structure tells a story. Ours is one of dedication, detail,
                    and delivering value beyond blueprints.
                    <br> We approach every site with the same commitment — whether
                    it’s a luxury villa, industrial shed, or shoreline reinforcement project.
                </p>
            </div>
        </section>

        <section class="flex flex-col items-center justify-center bg-white py-16 px-6">
            <div class="">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 animate-fadeInUp text-center">
                    📞 Let’s Build Something Together
                </h2>

                <p class="text-gray-600 mb-4 animate-fadeInUp delay-100">
                    From the first brick to the final handover, Sundaram Developers is with
                    you at every step.<br />
                    Reach out today and experience the difference of working with a builder
                    who treats every project like it’s their own home.
                </p>

                <blockquote
                    class="mt-6 border-l-4 border-gray-800 pl-4 italic text-gray-700 animate-fadeInUp delay-200">
                    Sundaram Developers — <strong>Crafting Legacies. Building Futures.</strong>
                </blockquote>
            </div>
        </section>

        <Footer />
    </AppLayout>
</template>