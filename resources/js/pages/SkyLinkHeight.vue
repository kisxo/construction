<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css';
import AppLayout from '@/layouts/AppLayout.vue';
import { Carousel, Slide } from 'vue3-carousel';
// import heroImg1 from "../../images/hero-1.jpeg";
// import heroImg2 from "../../images/hero-2.jpeg";
// import heroImg3 from "../../images/hero-3.jpeg";
import img1Sm from "../../images/sky-link-land.webp";
import img2Sm from "../../images/sky-link-port.webp";
import img3 from "../../images/divine-green.jpg";
import img1 from "../../images/SitePlan.jpg";
import img2 from "../../images/FloorPlan.jpg";
import img4 from "../../images/divine-green-2.jpg";
import Footer from '@/components/Footer.vue';
import { useHead } from '@vueuse/head';
import { Io5Airplane, Io5Basket, Io5Bus, Io5School, Io5Train } from 'vue-icons-plus/io5';
// import { Building2 } from 'lucide-vue-next';
import { Fa6Hospital, Fa6Lightbulb, Fa6Lock, Fa6PersonRunning, Fa6Recycle, Fa6UmbrellaBeach } from 'vue-icons-plus/fa6';
import { MdChildCare, MdGroupWork, MdSolarPower, MdWifi } from 'vue-icons-plus/md';
import { BsCameraReelsFill } from 'vue-icons-plus/bs';
import { IpSurveillanceCameras, IpWater } from 'vue-icons-plus/ip';
import { MapPin } from 'lucide-vue-next';
import { HiMiniLightBulb } from 'vue-icons-plus/hi2';
import { IoBarbell } from 'vue-icons-plus/io';

// const images = [heroImg1, heroImg2, heroImg3];

const imagesSm = [img1Sm, img2Sm];

const gallery = [img1, img2, img3, img4];

const locationBenefits = [
  {
    icon: Io5Train,
    title: "1 km",
    desc: "Jorhat Town Railway Station",
  },
  {
    icon: Io5Airplane,
    title: "5 km",
    desc: "Jorhat Airport",
  },
  {
    icon: Io5Bus,
    title: "2.8 km",
    desc: "ISBT Jorhat",
  },
  {
    icon: Fa6Hospital,
    title: "2.2 km",
    desc: "Jorhat Medical College & Hospital",
  },
  {
    icon: Io5School,
    title: "5.8 km",
    desc: "Air Force School Jorhat",
  },
  {
    icon: Io5Basket,
    title: "1.7 km",
    desc: "Vishal Mega Mart",
  },
];
const featuresAmenities = [
  {
    icon: MdGroupWork,
    title: "Community Features",
    list: [
      {
        icon: Fa6UmbrellaBeach,
        feature: "Clubhouse & Lounge",
      },
      {
        icon: MdChildCare,
        feature: "Children's Play Area",
      },
      {
        icon: IoBarbell,
        feature: "Gym & Fitness Studio",
      },
      {
        icon: BsCameraReelsFill,
        feature: "Multi-purpose Hall",
      }
    ]
  },
  {
    icon: MdGroupWork,
    title: "Eco Features",
    list: [
      {
        icon: IpWater,
        feature: "Rain Water Harvesting",
      },
      {
        icon: MdSolarPower,
        feature: "Solar Panels",
      },
      {
        icon: HiMiniLightBulb,
        feature: "Energy-efficient Lighting",
      },
      {
        icon: Fa6Recycle,
        feature: "Recycled Materials",
      }
    ]
  },
  {
    icon: MdWifi,
    title: "Smart Features",
    list: [
      {
        icon: Fa6Lightbulb,
        feature: "Smart Lighting System",
      },
      {
        icon: Fa6Lock,
        feature: "App-based Door Unlock",
      },
      {
        icon: Fa6PersonRunning,
        feature: "Motion Sensors",
      },
      {
        icon: IpSurveillanceCameras,
        feature: "WiFi-enabled Security Cameras",
      }
    ]
  }
];
const premiumSpecifications = [
  {
    title: "Flooring",
    list: [
      {
        label: "Bedrooms, Living & Dining",
        desc: "Premium vitrified tiles in all units."
      },
      {
        label: "Balcony & Sit-Out",
        desc: "Durable, easy to maintain, and stain-resistant surface."
      },
      {
        label: "Toilet Floors",
        desc: "Adds a modern and elegant look to all living spaces."
      },
    ]
  },
  {
    title: "Kitchen",
    list: [
      {
        label: "Elegant Tiles",
        desc: "Durable granite countertop for a sleek, easy-to-clean workspace."
      },
      {
        label: "Durable Sink",
        desc: "High-quality stainless steel (S.S.) sink for long-lasting use."
      },
      {
        label: "Premium Faucet",
        desc: "Thoughtfully designed for functionality and modern living."
      },
    ]
  },
  {
    title: "Paint",
    list: [
      {
        label: "Internal Putty",
        desc: "Interior walls: smooth plaster with two coats of putty and primer."
      },
      {
        label: "Interior Emulsion",
        desc: "Exterior walls: double coat plaster with weatherproof textured paint."
      },
      {
        label: "Exterior Emulsion",
        desc: "Facade finished as per architect’s design for a stylish look."
      },
    ]
  },
  {
    title: "Door and Windows",
    list: [
      {
        label: "Main Door",
        desc: "Main doors: laminated, 3’6″ wide with wooden frames and safety locks."
      },
      {
        label: "Internal Doors",
        desc: "Bedroom doors: laminated flush doors, 3′ wide with wooden frames."
      },
      {
        label: "Toilet Doors",
        desc: "Aluminum-framed windows for durability and low maintenance."
      },
    ]
  },
  {
    title: "Electrical",
    list: [
      {
        label: "Distribution Board",
        desc: "Concealed premium-quality ISI-marked wiring for safety and durability."
      },
      {
        label: "MCBs",
        desc: "Branded modular switches for modern aesthetics and reliability."
      },
      {
        label: "Switches",
        desc: "Individual MCB panel for each unit ensuring electrical safety and easy maintenance."
      },
    ]
  },
  {
    title: "Bathroom",
    list: [
      {
        label: "EWC",
        desc: "Premium sanitary ware and C.P. fittings for quality and style."
      },
      {
        label: "Wash Basin",
        desc: "Designer floor tiles and wall tiles installed up to door height."
      },
      {
        label: "Wall Plate",
        desc: "Stylish, durable, and easy-to-clean finishes."
      },
    ]
  }
];
const flatSizes = [
  {
    type: "1 BHK",
    size: "574.00 sq. ft.",
  },
  {
    type: "2 BHK",
    size: "788.00 sq. ft.",
  },
  {
    type: "2 BHK",
    size: "1045.00 sq. ft.",
  },
  {
    type: "2 BHK",
    size: "1062.00 sq. ft.",
  },
  {
    type: "2 BHK",
    size: "1070.00 sq. ft.",
  },
  {
    type: "3 BHK",
    size: "1236.00 sq. ft.",
  },
  {
    type: "3 BHK",
    size: "1265.00 sq. ft.",
  },
  {
    type: "3 BHK",
    size: "1270.00 sq. ft.",
  },
];
const specifications = [
  {
    title: "Building",
    desc: "Pile foundation; RCC framed structure"
  },{
    title: "Flooring",
    desc: "All rooms will have vitrified tiles."
  },{
    title: "Kitchen",
    desc: "Granite finish conter top."
  },{
    title: "Toilets",
    desc: "Superior Quality CP fittings with tiles on wall upto door height and floor."
  },{
    title: "Doors",
    desc: "Wooden frame & readymade flash door. Window Allumininum frames."
  },{
    title: "Water",
    desc: "24 hrs running water."
  },{
    title: "Interior walls",
    desc: "Inside wall finish with POP."
  },{
    title: "Exterior wall",
    desc: "115mm peripheral wall "
  },{
    title: "Fire safety",
    desc: "Equipped with fire alarm/fighting devices extinguishers fire water reservior."
  },{
    title: "Electrical fitting",
    desc: "Concealed copper wiring (ISI marked) with modular switches."
  },{
    title: "Lift",
    desc: "6 passanger lift."
  },
];
const carouselConfig = {
  itemsToShow: 1,
  wrapAround: true,
  autoplay: 3000,
}


// SEO
const pageTitle = "Sky Link Heights | Sundaram Developers";
const pageDescription = "'SKY LINK HEIGHTS' is a contemporary residential development set in the prime locality of Atilagaon, Jorhat. Comprising two elegant 6-storey linear blocks, it blends architecture with nature through cascading terraced garden decks and a stunning double-height sky bridge connecting the 3rd to 5th floors. Overlooking a vibrant central green, this thoughtfully designed space offers a harmonious lifestyle elevated above the ordinary.";

useHead({
  title: pageTitle,
  meta: [
    { name: 'description', content: pageDescription },
    { name: 'keywords', content: 'sky link height, sky link heights, flats near ISBT Jorhat, flats near jorhat railway, complex in Jorhat, apartments, Sundaram Developers, residential, Assam, real estate, affordable, flats, premium, construction, Jorhat, atialgaon, property, developers' },
    { property: 'og:title', content: pageTitle },
    { property: 'og:description', content: pageDescription },
    { property: 'og:type', content: 'website' },
    { property: 'og:url', content: 'https://www.sundaramdevelopers.in/sky-link-heights'}
  ],
});


</script>

<template>
  <AppLayout>
    <!-- hero Section -->
    <div class="relative w-full h-[65vh] overflow-hidden">
      <Carousel v-bind="carouselConfig" class="w-full h-full">
        <Slide v-for="image in imagesSm" :key="image">
          <div class="w-full h-[65vh] relative">
            <img :src="image" alt="Hero Slide" class="w-full h-full object-cover object-center brightness-40" />
          </div>
        </Slide>
      </Carousel>

      <!-- ✅ Centered Overlay Content -->
      <div class="container mx-auto absolute inset-0 flex justify-start px-10 items-center">
        <div class="z-10 p-6 text-white" data-aos="fade-right">
          <p class="text-2xl  mb-6">Modern Living in the Heat of Jorhat</p>
          <h1 class="text-6xl kanit-bold">Sky Link Height</h1>
          <p class="flex items-center gap-2 text-2xl pt-2 kanit-medium">
            <MapPin />
            Atilagoan, Jorhat, Assam
          </p>
        </div>
      </div>
    </div>

    <section class="bg-sky-600 py-16 px-4">
      <h2 class="text-3xl font-bold text-white text-center kanit-semibold">Welcome to Divine Green</h2>
      <div class="container mx-auto grid md:grid-cols-2 gap-6 my-8">
        <div class="w-full h-[320px] rounded-lg overflow-hidden shadow-lg">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3582.7676223683775!2d91.72310484578604!3d26.106503218366043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5d57ce4e1d6b%3A0x3448edcd871820a3!2sDivine%20Green%20Apartment!5e0!3m2!1sen!2sin!4v1760332643867!5m2!1sen!2sin" class="w-full h-full" style="border:0;" allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="flex flex-col justify-center gap-6 leading-8 text-white text-lg">
          <p><span class="font-semibold italic">'SKY LINK HEIGHTS'</span>  is a contemporary residential development set in the prime locality of <span class="font-semibold italic">Atilagaon, Jorhat</span>. Comprising two elegant 6-storey linear blocks, it blends architecture with nature through cascading <span class="font-semibold italic">terraced garden decks</span> and a stunning <span class="font-semibold italic">double-height sky bridge</span>  connecting the 3rd to 5th floors. Overlooking a vibrant central green, this thoughtfully designed space offers a harmonious lifestyle elevated above the ordinary.</p>
        </div>
      </div>
    </section>

    
    <section class="bg-zinc-100 p-4 py-14">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Prime Location Benefits</h2>
      <div class="container mx-auto mt-6">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 py-8">
          <div v-for="benefit in locationBenefits" :key="benefit.title" class="bg-white p-4 py-8 rounded-lg text-center hover:shadow-xl transition shadow-xs duration-300">
            <component :is="benefit.icon" class="w-10 h-10 mx-auto text-sky-600" />
            <h3 class="mt-5 font-semibold text-xl text-blue-800 mb-1 kanit-medium">{{ benefit.title }}</h3>
            <p class="text-zinc-600">{{ benefit.desc }}</p>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-white p-4 py-14">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Features & Amenities</h2>
      <div class="container mx-auto mt-6">
        <div class="grid lg:grid-cols-3 gap-4 md:gap-6 py-8">
          <div v-for="feature in featuresAmenities" :key="feature.title" class="bg-white px-5 py-8 rounded-lg text-center shadow-xs hover:shadow-xl transition duration-300">
            <div class="flex gap-2 mb-7">
              <!-- <component :is="feature.icon" class="w-6 h-6 text-teal-700" /> -->
              <h3 class="font-semibold text-xl text-blue-800 kanit-medium">{{ feature.title }}</h3>
            </div>
            <div class="flex flex-col gap-3 ps-5">
              <div v-for="featureItem in feature.list" :key="featureItem.feature" class="flex gap-2 text-start">
                <component :is="featureItem.icon" class="w-5 h-5 text-yellow-600" />
                <spam>{{ featureItem.feature }}</spam>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-zinc-100 p-4 py-14">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Premium Benefits</h2>
      <div class="container mx-auto mt-6">
        <div class="grid lg:grid-cols-2 gap-6">
          <div v-for="premium in premiumSpecifications" :key="premium.title" class="p-8">
            <h3 class="text-4xl font-medium mb-5">{{ premium.title }}</h3>
            <ul>
              <li v-for="item in premium.list" :key="item.label" class="list-disc mb-1">
                <!-- <b>{{ item.label }}</b> -->
                <span>{{ item.desc }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-white p-4 py-14">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Specifications</h2>
      <div class="container mx-auto mt-6">
        <div class="grid lg:grid-cols-2 gap-4 md:gap-6 py-8">
          <div class="aspect-[16/9] h-auto my-auto">
            <iframe src="https://www.youtube.com/embed/nwLQ3s3Fwtk?autoplay=1&amp;mute=1&amp;loop=1&amp;playlist=nwLQ3s3Fwtk&amp;controls=0&amp;showinfo=0&amp;modestbranding=1&amp;rel=0" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media" allowfullscreen="false" title="Video" style="width:100%; height:100%; border:0; display:block; object-fit:cover; pointer-events: none; cursor: default;"></iframe>
          </div>
          <div class="px-5 py-8 text-left space-y-2 ">
            <p v-for="spec in specifications" :key="spec.title" >
              <b class="font-semibold text-xl text-zinc-800 kanit-medium me-1">{{ spec.title }}:</b>
              <span class="text-zinc-700 text-justify">{{ spec.desc }}</span>
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-zinc-100 p-4 py-14 transition duration-200">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Apartment Types & Sizes</h2>
      <div class="container mx-auto mt-6">
        <div class="grid md:grid-cols-2 gap-4 lg:gap-14 py-8">
          <div>
            <img 
            :src="img1Sm" 
            class="h-full max-h-[370px] aspect-auto w-full object-cover rounded shadow hover:shadow-xl"
            loading="lazy"/>
          </div>
          <div>
            <table class="table w-full shadow">
              <thead>
                <tr>
                  <th class="p-2 px-4 border border-zinc-800 bg-zinc-200">Flat Type</th>
                  <th class="p-2 px-4 border border-zinc-800 bg-zinc-200">Super Built-Up Area (S.B.U.A)</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="flat in flatSizes" :key="flat.size" class="hover:shadow-lg hover:font-medium hover:bg-white">
                  <td class="p-2 px-4 border border-zinc-800">{{ flat.type }}</td>
                  <td class="p-2 px-4 border border-zinc-800">{{ flat.size }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-white p-4 py-14">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Project Gallery</h2>
      <div class="container mx-auto mt-6">
        <div class="grid md:grid-cols-2 gap-4 md:gap-6 py-8">
          <div v-for="img in gallery" :key="img">
            <img 
            :src="img" 
            class="aspect-[2/3] w-full h-auto rounded shadow object-cover hover:shadow-lg" 
            loading="lazy"/>
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