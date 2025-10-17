<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import shs_img1 from '../../images/shivashree/shivashree_956x768.avif';
import floor_plan_1 from "../../images/shivashree/floor_plan_1.webp";
import parking from "../../images/shivashree/parking.avif";
import planing_1 from "../../images/shivashree/plan_1.avif";
import planing_2 from "../../images/shivashree/plan_2.avif";
import planing_3 from "../../images/shivashree/plan_3.avif";
import img_1 from "../../images/shivashree/shivashree_1.avif";
import img_2 from "../../images/shivashree/shivashree_2.avif";
import img_3 from "../../images/shivashree/shivashree_3.avif";
import img_4 from "../../images/shivashree/shivashree_4.avif";
import { MapPin } from 'lucide-vue-next';
import { Io5Train, Io5Airplane, Io5Bus, Io5School, Io5Basket, Io5LeafOutline, Io5PhonePortrait, Io5BuildSharp, } from 'vue-icons-plus/io5';
import { Fa6Hospital, Fa6Lightbulb, Fa6Lock, Fa6PersonRunning, Fa6Recycle, Fa6UmbrellaBeach } from 'vue-icons-plus/fa6';
import { MdChildCare, MdSolarPower } from 'vue-icons-plus/md';
import { IoBarbell } from 'vue-icons-plus/io';
import { BsCameraReelsFill } from 'vue-icons-plus/bs';
import { IpSurveillanceCameras, IpWater } from 'vue-icons-plus/ip';
import { HiMiniLightBulb } from 'vue-icons-plus/hi2';
import { useHead } from '@vueuse/head';

const gallery = [floor_plan_1, parking, planing_1, planing_2, planing_3, img_1, img_2, img_3, img_4];

const locationBenefits = [
    {
        icon: Io5Train,
        title: "5 km",
        desc: "Dekargaon railway station",
    },
    {
        icon: Io5Airplane,
        title: "9.5 km",
        desc: "Tezpur Airport",
    },
    {
        icon: Io5Bus,
        title: "2.6 km",
        desc: "ASTC Bus Stand Tezpur",
    },
    {
        icon: Fa6Hospital,
        title: "2.3 km",
        desc: "Kanaklata Civil Hospital, Tezpur",
    },
    {
        icon: Io5School,
        title: "3 km",
        desc: "Sacred Heart Montessori School, Tezpur",
    },
    {
        icon: Io5Basket,
        title: "2.5 km",
        desc: "Style Baazar, Tezpur",
    },
];
const lifestyleAmenities = [
    {
        title: "Community Features",
        color: "text-sky-600",
        icon: Io5BuildSharp,
        points: [
            {
                title:"Clubhouse & Lounge",
                icon: Fa6UmbrellaBeach
            },
            {
                title:"Children's Play Area",
                icon: MdChildCare
            },
            {
                title:"Gym & Fitness Studio",
                icon: IoBarbell
            },
            {
                title:"Multi-purpose Hall",
                icon: BsCameraReelsFill
            }
        ],
        aosDelay: 0,
    },
    {
        title: "Eco Features",
        color: "text-green-600",
        icon: Io5LeafOutline,
        points: [
            {
                title:"Rain Water Harvesting",
                icon: IpWater
            },{
                title:"Solar Panels",
                icon: MdSolarPower
            },{
                title:"Energy-efficient Lighting",
                icon: HiMiniLightBulb
            },{
                title:"Recycled Materials",
                icon:Fa6Recycle
            }
        ],
        aosDelay: 100,
    },
    {
        title: "Smart Features",
        color: "text-indigo-600",
        icon: Io5PhonePortrait,
        points: [
            {
                title:"Smart Lighting System",
                icon:Fa6Lightbulb
            },
            {
                title:"App-based Door Unlock",
                icon:Fa6Lock
            },
            {
                title:"Motion Sensors",
                icon:Fa6PersonRunning
            },
            {
                title:"WiFi-enabled Security Cameras",
                icon:IpSurveillanceCameras
            }
        ],
        aosDelay: 200,
    },
];
const premiumSpecifications = [
    {
        title: "Flooring",
        list: [
            {
                label: "Vitrified tiles",
                desc: " in drawing, dining, and bedrooms"
            },
            {
                label: "Marble/anti-skid tiles",
                desc: " in common areas"
            },
            {
                label: "PCC casting",
                desc: " for parking zones"
            },
        ]
    },
    {
        title: "Kitchen",
        list: [
            {
                label: "Marble countertop",
                desc: " for a premium, durable finish"
            },
            {
                label: "Ceramic tile cladding",
                desc: " up to 2 feet above the counter for easy maintenance"
            },
            {
                label: "Stainless steel (S.S.) sink",
                desc: " for longevity and hygiene"
            },
        ]
    },
    {
        title: "Paint",
        list: [
            {
                label: "Interior walls",
                desc: " : Smooth plaster with putty and primer finish"
            },
            {
                label: "Exterior walls",
                desc: " : double coat plaster with weatherproof textured paint."
            },
            {
                label: "Aesthetic facade ",
                desc: ": as per architect’s design for a stylish look."
            },
        ]
    },
    {
        title: "Door and Windows",
        list: [
            {
                label: "Main &amp; internal doors",
                desc: " : Waterproof flush doors with quality accessories"
            },
            {
                label: "Windows",
                desc: " : Anodized aluminum sections fitted with 5 mm quality glass"
            },
            {
                label: "",
                desc: "Designed for durability, insulation, and low maintenance"
            },
        ]
    },
    {
        title: "Electrical",
        list: [
            {
                label: "",
                desc: "AC and geyser provision in master bedroom and bathroom"
            },
            {
                label: "",
                desc: "Separate MCB panel for each unit"
            },
            {
                label: "",
                desc: "Ample lighting in rooms, common areas, and parking"
            },
        ]
    },
    {
        title: "Bathroom",
        list: [
            {
                label: "Ceramic wall tiles",
                desc: " up to door height and anti-skid floor tiles"
            },
            {
                label: "Hindware/Jaquar",
                desc: " or equivalent quality CP fittings"
            },
            {
                label: "",
                desc: "Hot and cold water connections in all attached bathrooms"
            },
        ]
    }
];
const specifications = [
    {
        title: "Building",
        desc: "Pile foundation; RCC framed structure"
    }, {
        title: "Flooring",
        desc: "All rooms will have vitrified tiles."
    }, {
        title: "Kitchen",
        desc: "Granite finish conter top."
    }, {
        title: "Toilets",
        desc: "Superior Quality CP fittings with tiles on wall upto door height and floor."
    }, {
        title: "Doors",
        desc: "Wooden frame & readymade flash door. Window Allumininum frames."
    }, {
        title: "Water",
        desc: "24 hrs running water."
    }, {
        title: "Interior walls",
        desc: "Inside wall finish with POP."
    }, {
        title: "Exterior wall",
        desc: "115mm peripheral wall "
    }, {
        title: "Fire safety",
        desc: "Equipped with fire alarm/fighting devices extinguishers fire water reservior."
    }, {
        title: "Electrical fitting",
        desc: "Concealed copper wiring (ISI marked) with modular switches."
    }, {
        title: "Lift",
        desc: "6 passanger lift."
    },
];


// SEO
const pageTitle = "Shivashree | Sundaram Developers";
const pageDescription = "Experience modern, sustainable living in Tezpur the scenic city on the north bank of the Brahmaputrav, well-connected by air, rail, and road. Offering thoughtfully designed 1BHK, 2BHK, and 3BHK apartments with the latest architectural style, built under expert supervision. A perfect blend of comfort, elegance, and security — a dream home you’ll be proud to own. ";

useHead({
  title: pageTitle,
  meta: [
    { name: 'description', content: pageDescription },
    { name: 'keywords', content: 'shivashree, flats near ASTC Tezpur, flats near tezpur railway, apartments, Sundaram Developers, residential, Assam, real estate, affordable, flats, premium, construction, tezpur, property, developers' },
    { property: 'og:title', content: pageTitle },
    { property: 'og:description', content: pageDescription },
    { property: 'og:type', content: 'website' },
    { property: 'og:url', content: 'https://www.sundaramdevelopers.in/shibashree'}
  ],
});

</script>

<template>
    <AppLayout>
        <div class="relative w-full h-[65vh] overflow-hidden">
            <div class="w-full h-[65vh] relative">
                <img :src="shs_img1" alt="Hero Slide" class="w-full h-full object-cover object-center brightness-40" />
            </div>
            <!-- ✅ Centered Overlay Content -->
            <div class="container mx-auto absolute inset-0 flex justify-start px-10 items-center">
                <div class="z-10 p-6 text-white" data-aos="fade-right">
                    <p class="  mb-6">Modern Living in the Heat of Tezpur</p>
                    <h1 class="text-6xl">Shivashree Apartments</h1>
                    <p class="flex items-center gap-2  pt-2 kanit-medium">
                        <MapPin />
                        Tezpur, Assam
                    </p>
                </div>
            </div>
        </div>
        <!--  Location Section -->
        <section class="bg-[#0065f8] py-16 px-4">
            <h2 class="text-5xl text-white text-center">Welcome to Shivashree Apartments</h2>
            <div class="container mx-auto grid md:grid-cols-2 gap-6 my-8">
                <div class="w-full h-[320px] rounded-lg overflow-hidden shadow-lg">
                    <div class="w-full h-[320px] rounded-lg overflow-hidden shadow-lg">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d14265.268822544067!2d92.774339156632!3d26.63832440913618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjbCsDM4JzE3LjkiTiA5MsKwNDcnMDQuNyJF!5e0!3m2!1sen!2sin!4v1760427483684!5m2!1sen!2sin"
                            style="border:0;" allowfullscreen="true" loading="lazy" class="w-full h-full"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>
                <div class="flex flex-col justify-center gap-6 leading-8 text-white text-lg">
                    <p>
                        Experience modern, sustainable living in <span class="font-semibold italic">Tezpur</span>
                        the scenic city on the north bank of the <span class="font-semibold italic"> Brahmaputrav</span>, well-connected by air, rail, and
                        road.
                        Offering thoughtfully designed <span class="font-semibold italic"> 1BHK, 2BHK, and 3BHK </span>apartments with the latest
                        architectural style, built under expert supervision.
                        A perfect blend of comfort, elegance, and security — a dream home you’ll be proud to own.
                    </p>

                </div>
            </div>
        </section>
        <!-- Prime Location Benefits -->
        <section class="bg-zinc-100 p-4 py-14">
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
        <!-- Lifestyle Amenities -->
        <section class="bg-white p-4 py-14">
            <h2 class="text-3xl font-extrabold text-center kanit-semibold">Lifestyle Amenities</h2>
            <div class="container mx-auto mt-6">
                <div class="grid lg:grid-cols-3 gap-4 md:gap-6 py-8">
                    <div v-for="(item, index) in lifestyleAmenities" :key="index"
                        class="bg-white px-5 py-8 rounded-lg text-center shadow-xs hover:shadow-xl transition duration-300"
                        data-aos="fade-up" :data-aos-delay="item.aosDelay">
                        <!-- Header with Icon + Title -->
                        <div class="flex gap-2 mb-7">
                            <!-- <component :is="feature.icon" class="w-6 h-6 text-teal-700" /> -->
                            <h3 class="font-semibold text-xl text-blue-900 kanit-medium">{{ item.title }}</h3>
                        </div>

                        <!-- Points List -->
                        <div class="flex flex-col gap-3 ps-5 text-start">
                            <div v-for="featureItem in item.points" :key="featureItem.title" class="flex gap-2 text-start">
                                <component :is="featureItem.icon" class="w-5 h-5 text-yellow-600" />
                                <spam>{{ featureItem.title }}</spam>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Premium Benefits -->
        <section class="bg-[#ffffff] p-4 py-14">
            <h2 class="text-3xl font-extrabold text-center kanit-semibold">Premium Specifications</h2>
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
        <!-- Specifications -->
        <section class="bg-[#f5f5f5] p-4 py-14">
            <h2 class="text-3xl font-extrabold text-center kanit-semibold">Specifications</h2>
            <div class="container mx-auto mt-6">
                <div class="grid lg:grid-cols-2 gap-4 md:gap-6 py-8">
                    <div class="aspect-[16/9] h-auto my-auto">
                        <iframe
                            src="https://www.youtube.com/embed/nwLQ3s3Fwtk?autoplay=1&amp;mute=1&amp;loop=1&amp;playlist=nwLQ3s3Fwtk&amp;controls=0&amp;showinfo=0&amp;modestbranding=1&amp;rel=0"
                            frameborder="0"
                            allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media"
                            allowfullscreen="false" title="Video"
                            style="width:100%; height:100%; border:0; display:block; object-fit:cover; pointer-events: none; cursor: default;"></iframe>
                    </div>
                    <div class="px-5 py-8 text-left space-y-2 ">
                        <p v-for="spec in specifications" :key="spec.title">
                            <b class="font-semibold text-xl text-zinc-800 kanit-medium me-1">{{ spec.title }}:</b>
                            <span class="text-zinc-700 text-justify">{{ spec.desc }}</span>
                        </p>
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
        <section class="bg-green-50 p-4 py-8">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold text-center pt-12 kanit-medium">Contact Us For Booking</h2>
                <div class="flex justify-around gap-6 py-8">
                    <div class="space-y-1 text-center tracking-wider">
                        <p class="font-bold text-lg mb-2 tracking-normal">Phone Numbers:</p>
                        <p>+91 98868 47886</p>
                        <p>+91 91013 38923</p>
                        <p>+91 87218 81264</p>
                    </div>
                    <div class="text-center">
                        <p class="font-bold mb-2 text-lg">Site Office</p>
                        <p>Ahom Gaon, Katapara, Guwahati</p>
                        <p class="font-bold mb-2 text-lg mt-8">Main Office</p>
                        <p>Divine Developers, A.T. Road, Tarajan, Jorhat, Assam</p>
                    </div>
                </div>
            </div>
        </section>
        <Footer />
    </AppLayout>
</template>
