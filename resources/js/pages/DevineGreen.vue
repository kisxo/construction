<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css';
import AppLayout from '@/layouts/AppLayout.vue';
import { Carousel, Slide } from 'vue3-carousel';
// import heroImg1 from "../../images/hero-1.jpeg";
// import heroImg2 from "../../images/hero-2.jpeg";
// import heroImg3 from "../../images/hero-3.jpeg";
import img1Sm from "../../images/hero-sm.webp";
import img2Sm from "../../images/hero-2sm.webp";
import img3Sm from "../../images/hero-3sm.webp";
import Footer from '@/components/Footer.vue';
import { useHead } from '@vueuse/head';
import { Io5Barbell, Io5Business, Io5Home, Io5LocationSharp, Io5PeopleCircle } from 'vue-icons-plus/io5';
// import { Building2 } from 'lucide-vue-next';
import { Fa6Child, Fa6Intercom, Fa6PersonWalking, Fa6SquareParking, Fa6Tv, Fa6UmbrellaBeach, Fa6Wifi } from 'vue-icons-plus/fa6';
import { MdGroupWork, MdRoofing, MdRoundedCorner } from 'vue-icons-plus/md';
import { BiSolidGame } from 'vue-icons-plus/bi';
import { BsShieldFillPlus } from 'vue-icons-plus/bs';
import { PiPlanetFill } from 'vue-icons-plus/pi';
import { IpBatteryCharge, IpSurveillanceCameras, IpWater } from 'vue-icons-plus/ip';
import { RiEarthquakeFill } from 'vue-icons-plus/ri';
import { HiFire } from 'vue-icons-plus/hi';

// const images = [heroImg1, heroImg2, heroImg3];

const imagesSm = [img1Sm, img2Sm, img3Sm];

const locationBenefits = [
  {
    icon: Io5LocationSharp,
    title: "10 mins to Airport",
    desc: "",
  },
  {
    icon: Io5Business,
    title: "5 mins to City Center Mall",
    desc: "Shopping and Entertainment",
  },
  {
    icon: Io5PeopleCircle,
    title: "Walking distance 10 meter",
    desc: "public transport",
  },
  {
    icon: Io5Home,
    title: "10 mins to IT Park",
    desc: "",
  },
];

const featuresAmenities = [
  {
    icon: MdGroupWork,
    title: "Community Features",
    list: [
      {
        icon: Fa6UmbrellaBeach,
        feature: "Open Terrace Party Area",
      },
      {
        icon: Io5Barbell,
        feature: "Health Club / Gym / Yoga Room",
      },
      {
        icon: BiSolidGame,
        feature: "Multi-Recreation Hall (Cards, Chess, Carrom)",
      },
      {
        icon: Fa6Child,
        feature: "Children's Park",
      },
      {
        icon: Fa6PersonWalking,
        feature: "Jogger's/Walking Track",
      },
      {
        icon: MdRoofing,
        feature: "Rooftop Moonlight Dining Area",
      },
      {
        icon: BsShieldFillPlus,
        feature: "24/7 Security, Water & Power",
      },
    ]
  },
  {
    icon: MdGroupWork,
    title: "Digital & Eco Features",
    list: [
      {
        icon: Fa6Wifi,
        feature: "Broadband Internet Connection",
      },
      {
        icon: Fa6Tv,
        feature: "Digital TV Connection",
      },
      {
        icon: Fa6Intercom,
        feature: "Intercom Facility",
      },
      {
        icon: IpSurveillanceCameras,
        feature: "Security Cameras",
      },
      {
        icon: PiPlanetFill,
        feature: "Landscape Garden",
      },
      {
        icon: IpWater,
        feature: "Rainwater Harvesting",
      },
    ]
  },
  {
    icon: MdGroupWork,
    title: "Technical and Safety",
    list: [
      {
        icon: RiEarthquakeFill,
        feature: "Earthquake Resistant RCC Frame Structure",
      },
      {
        icon: Fa6Tv,
        feature: "Metal/Fibre Strip Reinforcement on Joints",
      },
      {
        icon: MdRoundedCorner,
        feature: "Sharp Edges Avoided for Child Safety",
      },
      {
        icon: Fa6SquareParking,
        feature: "Rubber Fenders on Parking Pillars",
      },
      {
        icon: HiFire,
        feature: "Fire Alarm & Fighting Devices",
      },
      {
        icon: IpBatteryCharge,
        feature: "Generator Backup",
      },
    ]
  },
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

const locationAdvantages = [
  { 
    label: "Sai Vikash Vidya Niketan",
    desc: "1 min Drive"
  },{
    label: "Ayursundra Super Speciality Hospital",
    desc: "1.1 km (3 min Drive)"
  },{
    label: "Delhi Public School",
    desc: "1.2 km (3 min Drive)",
  },{
    label: "Royal Global University",
    desc: "3.1 km (9 min Drive)"
  },{
    label: "ISBT Bus Terminal",
    desc: "4.1 km (11 min Drive)"
  },{
    label: "Apollo Excelcare Hospital",
    desc: "5.9 km (17 min Drive)"
  },{
    label: "Lokpriya Gopinath Bordoloi International Airport",
    desc: "19 km (30 min Drive)"
  }
];

const carouselConfig = {
  itemsToShow: 1,
  wrapAround: true,
  autoplay: 3000,
}

const pageTitle = "Home | Sundaram Developers";
const pageDescription = "Explore affordable and spacious flats in Jorhat with modern amenities. Find your perfect flat in Jorhat today with flexible pricing and great locations.";

useHead({
  title: pageTitle,
  meta: [
    { name: 'description', content: pageDescription },
    { name: 'keywords', content: 'flat in Jorhat, Jorhat apartments, Sundaram Developers, residential flats Assam, buy flat Jorhat, Jorhat real estate, new flats Jorhat, affordable flats Jorhat, premium apartments Jorhat, Jorhat property developers' },
    { property: 'og:title', content: pageTitle },
    { property: 'og:description', content: pageDescription },
    { property: 'og:type', content: 'website' },
  ],
});


</script>

<template>
  <AppLayout>
    <!-- hero Section -->
    <div class="relative w-full h-[70vh] overflow-hidden">
      <Carousel v-bind="carouselConfig" class="w-full h-full">
        <Slide v-for="image in imagesSm" :key="image">
          <div class="w-full h-[70vh] relative">
            <img :src="image" alt="Hero Slide" class="w-full h-full object-cover object-center brightness-40" />
          </div>
        </Slide>
      </Carousel>

      <!-- ✅ Centered Overlay Content -->
      <div class="container mx-auto absolute inset-0 flex justify-start px-10 items-center">
        <div class="z-10 p-6 text-white" data-aos="fade-right">
          <h1 class="text-6xl kanit-bold">Divine Green</h1>
          <p class="text-2xl pt-4 kanit-medium">Luxury Living in the Heart of Guwahati.</p>
        </div>
      </div>
    </div>

    <section class="bg-sky-100 py-16 px-4">
      <h2 class="text-3xl font-bold text-center kanit-semibold">Welcome to Divine Green</h2>
      <div class="container mx-auto grid md:grid-cols-2 gap-6 my-8">
        <div>
            <p>The name Divine Green signifies purity and flawlessness, rightfully signifying the commitment that the Divine Developers has to ensure a modern habitat for Guwahati. Divine Green was conceived with the idea of creating a home that was perfect in all respects. What you need is compact living space, where room sizes are spacious and where life can be comfortable and convenient. The project is located in the fast-developing residential hub of Guwahati, making it a sought-after place to reside.</p>
        </div>
        <div class="grid grid-cols-2 gap-6 text-green-700">
            <div v-for="index in 4" :key="index" class="bg-white rounded shadow p-4 gap-5 hover:shadow-lg transition duration-300">
                <p class="font-extrabold text-xl">200+</p>
                <p class="text-zinc-600">Premium Units</p>
            </div>
        </div>
      </div>
    </section>
    <section class="bg-zinc-100 p-4 py-14">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Prime Location Benefits</h2>
      <div class="container mx-auto mt-6">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-10 py-8">
          <div v-for="benefit in locationBenefits" :key="benefit.title" class="bg-white p-4 rounded-lg text-center hover:shadow-xl transition shadow-xs duration-300">
            <component :is="benefit.icon" class="w-10 h-10 mx-auto text-teal-700" />
            <h3 class="mt-5 font-semibold text-xl text-teal-900 mb-1 kanit-medium">{{ benefit.title }}</h3>
            <p class="text-zinc-600">{{ benefit.desc }}</p>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-sky-100 p-4 py-14">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Features & Amenities</h2>
      <div class="container mx-auto mt-6">
        <div class="grid lg:grid-cols-3 gap-4 md:gap-6 py-8">
          <div v-for="feature in featuresAmenities" :key="feature.title" class="bg-white px-5 py-8 rounded-lg text-center shadow-xs hover:shadow-xl transition duration-300">
            <div class="flex gap-2 mb-7">
              <!-- <component :is="feature.icon" class="w-6 h-6 text-teal-700" /> -->
              <h3 class="font-semibold text-xl text-teal-900 kanit-medium">{{ feature.title }}</h3>
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
    <section class="bg-zinc-100 p-4 py-14 transition duration-200">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Apartment Types & Sizes</h2>
      <div class="container mx-auto mt-6">
        <div class="grid md:grid-cols-2 gap-4 lg:gap-14 py-8">
          <div>
            <img :src="img1Sm" class="h-full max-h-[370px] aspect-auto w-full object-cover rounded shadow hover:shadow-xl"/>
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
    <section class="bg-sky-100 p-4 py-14">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Location Advantages</h2>
      <div class="container mx-auto mt-6">
        <div class="grid lg:grid-cols-2 gap-4 md:gap-6 py-8">
          <div></div>
          <div>
            <p class="mb-6">Located within Guwahati City yet surrounded by Green Nature, Divine Green offers the calmness of the suburbs and the connectivity of the city.</p>
            <div v-for="adv in locationAdvantages" :key="adv.label" class="flex items-center gap-2 mb-2">
              <div class="p-1 w-2 h-2 rounded-full border-2 border-zinc-700"></div>
              <b>{{ adv.label }}: </b>
              <span>{{ adv.desc }}</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-zinc-100 p-4 py-8">
      <div class="container mx-auto">
        <h2 class="text-6xl font-bold text-center pt-12">Completed Projects</h2>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 py-8">
          <div v-for="image in imagesSm.slice(0, 2)" :key="image">
            <img :src="image" alt="Hero Slide" class="w-full h-[300px] object-cover object-center" />
          </div>
        </div>
      </div>
    </section>
    <Footer />
  </AppLayout>
</template>