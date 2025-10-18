<script setup lang="ts">

const Footer = defineAsyncComponent(()=> import('@/components/Footer.vue'));
const AppLayout = defineAsyncComponent(()=> import('@/layouts/AppLayout.vue'));
import main_img from "../../images/pb_arcade/main_img.jpeg";
import { MapPin } from 'lucide-vue-next';
import img_1 from "../../images/pb_arcade/img_1.png";
import img_2 from "../../images/pb_arcade/img_2.png";
import { Io5Train, Io5Airplane, Io5Bus, Io5School, Io5Basket, } from 'vue-icons-plus/io5';
import { Fa6Hospital } from 'vue-icons-plus/fa6';
import { useHead } from '@vueuse/head';
import { Link } from '@inertiajs/vue3';
import MapSearch from "../../images/pin.gif"
import { defineAsyncComponent } from 'vue';
const ExternalLoader = defineAsyncComponent(() => import('@/components/ExternalLoader.vue'));

const gallery = [main_img, img_1, img_2]
const locationBenefits = [
    {
        icon: Io5Train,
        title: "2 km",
        desc: "Jorhat Town Railway Station",
    },
    {
        icon: Io5Airplane,
        title: "6 km",
        desc: "Jorhat Airport",
    },
    {
        icon: Io5Bus,
        title: "1 km",
        desc: "ISBT Jorhat",
    },
    {
        icon: Fa6Hospital,
        title: "5 km",
        desc: "Jorhat Medical College & Hospital",
    },
    {
        icon: Io5School,
        title: "6.9 km",
        desc: "Air Force School Jorhat",
    },
    {
        icon: Io5Basket,
        title: "1.5 km",
        desc: "Vishal Mega Mart",
    },
];
const premiumSpecifications = [
    {
        title: "Essential Utilities",
        list: [
            {
                label: "24×7 Water Supply",
                desc: " through a deep tube well integrated with a high-efficiency iron removal filtration plant,"
            },
            {
                label: "100% Power Backup ",
                desc: " for lift, common areas, and water supply systems."
            },
            {
                label: "Common Parking Area",
                desc: " at the ground level for shop owners and customers."
            },
        ]
    },
    {
        title: "Interior Finish & Flooring",
        list: [
            {
                label: "",
                desc: "All commercial units feature vitrified tile flooring (2×2) for a sleek, durable finish."
            },
            {
                label: "",
                desc: "Walls finished with POP and primer on the inside; cement paint on the exterior for lasting protection.",
            },
            {
                label: "Staircase and lobby areas ",
                desc: "  feature anti-skid floor tiles for enhanced safety."
            },
        ]
    },
    {
        title: "Sanitary & Comfort",
        list: [
            {
                label: "Individual shop toilets",
                desc: " fitted with superior quality CP fittings and full-height designer tiles."
            },
            {
                label: "Common toilet provision",
                desc: " on each floor for customer and staff convenience."
            },
        ]
    },
    {
        title: "Doors, Windows & Shutters",
        list: [
            {
                label: "Aluminium-framed windows",
                desc: " for weather resistance and longevity."
            },
            {
                label: "Rolling shutters",
                desc: "for all commercial units, ensuring security and ease of access."
            },
        ]
    },
    {
        title: "Electrical & Safety",
        list: [
            {
                label: "",
                desc: "Concealed ISI-marked copper wiring with modular switches."
            },
            {
                label: "",
                desc: "Minimum two power points per unit, with provision for lighting, A/C, and equipment."
            },
            {
                label: "Fire safety norms",
                desc: " compliant construction with designated safety infrastructure."
            },
        ]
    },
    {
        title: "Security & Connectivity",
        list: [
            {
                label: "CCTV surveillance ",
                desc: " covering all floors for enhanced safety."
            },
            {
                label: "Intercom facility",
                desc: " for seamless internal communication."
            },
            {
                label: "Passenger lift",
                desc: "provision for easy vertical mobility across all floors."
            },
        ]
    }
];
const specifications1 = [
    {
        title: "Water Supply",
        desc: "from Deep Tube well with high technology Iron removal plant."
    }, {
        title: "100% Electicity Backup",
        desc: " in common area / Lift and Water Supply"
    }, {
        title: "Common Parking",
        desc: " in Ground Level."
    }, {
        title: "Toilets :",
        desc: "Superior Quality CP fittings with tiles on wall upto door height and floor."
    }, {
        title: "",
        desc: "All room wil be vitrified (2×2) floor tiles."
    }, {
        title: "Aluminium Windows & Rolling shutter",
        desc: ""
    }, {
        title: "",
        desc: "All rooms with P.O.P. & Primer finished inside & cement paint outside."
    },
];
const specifications2 = [
    {
        title: "Water",
        desc: "24 Hours Running Water"
    }, {
        title: "Interior Walls ",
        desc: "Inside walll finish with POP."
    }, {
        title: "Exterior Walls :",
        desc: "Water proof weater coat."
    }, {
        title: "Fire Safety",
        desc: "Fire fighting devices & fire water reservior."
    }, {
        title: "Electrical Fitting",
        desc: "Concealed copper wiring (ISI marked)"
    }, {
        title: "Lift",
        desc: " 6 passengers lift."
    },
];

// SEO
const pageTitle = "P.B Arcade | Sundaram Developers";
const pageDescription = "'P.B. ARCADE' is a modern commercial project nestled in the bustling heart of Jorhat, near Deepali Medical, AT Road. Designed for modern businesses and retail visionaries, this structured commercial enclave brings together functionality, visibility, and strategic connectivity. With thoughtfully planned shops across multiple floors and essential modern infrastructure, it offers a dynamic business environment complete with power backup, secure access, and shared amenities. Positioned minutes from key transit hubs and healthcare centers, P.B. Arcade is more than just a commercial address — it’s a growth destination built for the entrepreneurs of tomorrow. ";

useHead({
  title: pageTitle,
  meta: [
    { name: 'description', content: pageDescription },
    { name: 'keywords', content: 'pb arcade, complex, flats near ISBT Jorhat, flats near Jorhat Vishal Megamart, flats near jorhat railway, apartments, Sundaram Developers, residential, Assam, real estate, affordable, flats, premium, construction, Jorhat, property, developers' },
    { property: 'og:title', content: pageTitle },
    { property: 'og:description', content: pageDescription },
    { property: 'og:type', content: 'website' },
    { property: 'og:url', content: 'https://www.sundaramdevelopers.in/pb-arcade'}
  ],
});

</script>


<template>
    <AppLayout>
        <!-- Hero Section -->
        <div class="relative w-full h-[70vh] overflow-hidden">
            <div class="w-full h-[70vh] relative">
                <img :src="main_img" alt="Hero Slide" class="w-full h-full object-cover object-top brightness-40" />
            </div>

            <!-- ✅ Centered Overlay Content -->
            <div class="container mx-auto absolute inset-0 flex justify-start px-10 items-center">
                <div class="z-10 p-6 text-white" data-aos="fade-right">
                    <p class="text-2xl mb-6">Affordable Spaces - Warmth Business</p>
                    <h1 class="text-6xl kanit-bold">P.B. Arcade</h1>
                    <p class="flex items-center gap-2  pt-2 kanit-medium">
                        <MapPin />
                        AT Road, Jorhat, Assam
                    </p>
                </div>
            </div>
        </div>
        <!--  Location Section -->
        <section class="bg-[#0065f8] py-16 px-4">
            <h2 class="text-5xl text-white text-center">Welcome to P.B. Arcade</h2>
            <div class="container mx-auto grid md:grid-cols-2 gap-6 my-8">
                <!-- <div class="w-full h-[320px] rounded-lg overflow-hidden shadow-lg">
                    <div class="w-full h-[320px] rounded-lg overflow-hidden shadow-lg">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3794.4305352067395!2d94.209972!3d26.760419!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3746c3fe625e6147%3A0x5fbdd8d4904833dd!2sP%20B%20Arcade!5e1!3m2!1sen!2sin!4v1760430939156!5m2!1sen!2sin"
                            style="border:0;" allowfullscreen="false" loading="lazy" class="w-full h-full"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div> -->
                <ExternalLoader 
                    iframe-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3794.4305352067395!2d94.209972!3d26.760419!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3746c3fe625e6147%3A0x5fbdd8d4904833dd!2sP%20B%20Arcade!5e1!3m2!1sen!2sin!4v1760430939156!5m2!1sen!2sin" 
                    :placeholder="MapSearch" />
                <div class="flex flex-col justify-center gap-6 leading-8 text-white text-lg">
                    <p>
                        <span class="font-semibold italic pe-1">'P.B. ARCADE' </span> is a modern commercial project nestled in the bustling heart of Jorhat,
                        near <span class="font-semibold italic">Deepali Medical, AT Road</span>. Designed for modern businesses and retail visionaries, this
                        structured commercial enclave brings together functionality, visibility, and strategic
                        connectivity. With thoughtfully planned shops across multiple floors and essential modern
                        infrastructure, it offers a dynamic business environment complete with power backup, secure
                        access, and shared amenities. Positioned minutes from key transit hubs and healthcare centers,
                        P.B. Arcade is more than just a commercial address — it’s a growth destination built for the
                        entrepreneurs of tomorrow.
                    </p>

                </div>
            </div>
        </section>
        <!-- Prime Location Benefits -->
        <section class="bg-[#f5f5f5] p-4 py-14">
            <h2 class="text-3xl font-extrabold text-center">Prime Location Benefits</h2>
            <div class="container mx-auto mt-6">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 py-8">
                    <div v-for="benefit in locationBenefits" :key="benefit.title"
                        class="bg-white p-4 py-8 rounded-lg text-center hover:shadow-xl transition shadow-xs duration-300">
                        <component :is="benefit.icon" class="w-10 h-10 mx-auto text-sky-600" />
                        <h3 class="mt-5 font-semibold text-xl text-blue-800 mb-1 kanit-medium">{{ benefit.title }}</h3>
                        <p class="text-zinc-600">{{ benefit.desc }}</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Facilities & Specifications -->
        <section class="bg-[#ffffff] p-4 py-14">
            <h2 class="text-3xl font-extrabold text-center kanit-semibold">Facilities & Specifications</h2>
            <div class="container mx-auto mt-6">
                <div class="grid lg:grid-cols-2 gap-6">
                    <div v-for="premium in premiumSpecifications" :key="premium.title" class="p-8">
                        <h3 class="text-4xl font-medium mb-5">{{ premium.title }}</h3>
                        <ul>
                            <li v-for="item in premium.list" :key="item.label" class="list-disc mb-1">
                                <b>{{ item.label }}</b>
                                <span>{{ item.desc }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Premium Specifications -->
        <section class="bg-[#f5f5f5] p-4 py-14">
            <h2 class="text-3xl font-extrabold text-center kanit-semibold">Specifications</h2>
            <div class="container mx-auto mt-6">
                <div class="grid lg:grid-cols-2 gap-4 md:gap-6 py-8">
                    <div class="px-5 py-8 text-left">
                        <ul class="list-disc list-inside space-y-2">
                            <li v-for="spec in specifications1" :key="spec.title">
                                <b class="font-semibold text-xl text-zinc-800 kanit-medium me-1">{{ spec.title }}</b>
                                <span class="text-zinc-700 text-justify">{{ spec.desc }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="px-5 py-8 text-left">
                        <ul class="list-disc list-inside space-y-2">
                            <li v-for="spec in specifications2" :key="spec.title">
                                <b class="font-semibold text-xl text-zinc-800 kanit-medium me-1">{{ spec.title }}:</b>
                                <span class="text-zinc-700 text-justify">{{ spec.desc }}</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>
        <!-- Project Gallery -->
        <section class="bg-white p-4 py-14">
            <h2 class="text-3xl font-extrabold text-center kanit-semibold">Project Gallery</h2>
            <div class="container mx-auto mt-6">
                <div class="grid md:grid-cols-2 gap-4 md:gap-6 py-8">
                    <div v-for="img in gallery" :key="img">
                        <img :src="img"
                            class="aspect-[2/3] w-full h-auto rounded shadow object-cover hover:shadow-lg"
                            loading="lazy" />
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-zinc-100 p-4 py-8">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold text-center pt-12 kanit-medium">Contact Us For Booking</h2>
                <div class="flex justify-center py-6">
                <Link href="/contact"
                    class="flex gap-2 bg-[#ff4c4c] text-white font-semibold items-center rounded px-5 py-2 shadow cursor-pointer hover:shadow-lg hover:scale-95 transition duration-150">
                    <span>Contact Us</span>
                    <Io5Call class="w-4" />
                </Link>
                </div>
            </div>
        </section>
        <Footer />
    </AppLayout>
</template>
