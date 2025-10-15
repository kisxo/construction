<script setup lang="ts">
import 'vue3-carousel/dist/carousel.css';
import AppLayout from '@/layouts/AppLayout.vue';
import { Carousel, Slide } from 'vue3-carousel';
// import heroImg1 from "../../images/hero-1.jpeg";
// import heroImg2 from "../../images/hero-2.jpeg";
// import heroImg3 from "../../images/hero-3.jpeg";
import img2Sm from "../../images/HoroGauri.webp";
import img3Sm from "../../images/hero-3sm.webp";
import Footer from '@/components/Footer.vue';
import { useHead } from '@vueuse/head';
import { Io5Airplane, Io5Basket, Io5Bus, Io5Call, Io5School, Io5Train, Io5Water } from 'vue-icons-plus/io5';
// import { Building2 } from 'lucide-vue-next';
import { Fa6Child, Fa6Hospital, Fa6Intercom, Fa6PersonWalking, Fa6Tv, Fa6Wifi } from 'vue-icons-plus/fa6';
import { MdFireTruck, MdGroupWork, MdSportsTennis } from 'vue-icons-plus/md';
import { IpSurveillanceCameras } from 'vue-icons-plus/ip';
import { RiEarthquakeFill } from 'vue-icons-plus/ri';
import { Link, MapPin } from 'lucide-vue-next';
import { GiLift } from 'vue-icons-plus/gi';
import ExternalLoader from '@/components/ExternalLoader.vue';
import MapSearch from "../../images/pin.gif";

// const images = [heroImg1, heroImg2, heroImg3];

const imagesSm = [img2Sm, img3Sm];

const gallery = [img2Sm, img3Sm];

const locationBenefits = [
  {
    icon: Io5Train,
    title: "3 km",
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
    title: "6 km",
    desc: "Air Force School Jorhat",
  },
  {
    icon: Io5Basket,
    title: "1.6 km",
    desc: "P.B Arcade",
  },
];
const featuresAmenities = [
  {
    icon: MdGroupWork,
    title: "Community Features",
    list: [
      {
        icon: Fa6Child,
        feature: "Dedicated kids’ play area",
      },
      {
        icon: Fa6PersonWalking,
        feature: "All-around jogging track",
      },
      {
        icon: MdSportsTennis,
        feature: "Badminton court",
      },
    ]
  },
  {
    icon: MdGroupWork,
    title: "Eco Features",
    list: [
      {
        icon: Fa6Wifi,
        feature: "60% open green space",
      },
      {
        icon: Fa6Tv,
        feature: "Rainwater harvesting system",
      },
      {
        icon: Fa6Intercom,
        feature: "Weatherproof exterior wall coating",
      },
      {
        icon: IpSurveillanceCameras,
        feature: "Natural Light & Airflow Design",
      },
    ]
  },
  {
    icon: MdGroupWork,
    title: "Smart Features",
    list: [
      {
        icon: GiLift,
        feature: "6-passenger automatic lift",
      },
      {
        icon: MdFireTruck,
        feature: "Fire safety system",
      },
      {
        icon: RiEarthquakeFill,
        feature: "Earthquake-resistant (G+6) structure",
      },
      {
        icon: Io5Water,
        feature: "24×7 running water supply",
      },
    ]
  },
];
const premiumSpecifications = [
  {
    title: "Flooring",
    list: [
      {
        label: "Bedrooms, Living & Dining",
        desc: "Elegant, durable vitrified tiles from Johnson & Kajaria."
      },
      {
        label: "Balcony & Sit-Out",
        desc: "Weatherproof vitrified tiles by Kajaria for lasting beauty."
      },
      {
        label: "Toilet Floors",
        desc: "Anti-skid vitrified tiles from Kajaria for safety and style."
      },
      {
        label: "Toilet Walls",
        desc: "Glazed tiles in wet areas with textured wallpaper for a chic finish."
      },
    ]
  },
  {
    title: "Kitchen",
    list: [
      {
        label: "Elegant Tiles",
        desc: "Kajaria/Asian vitrified tiles — stylish and tough."
      },
      {
        label: "Durable Sink",
        desc: "Sleek, corrosion-resistant Nirali stainless steel sink built to last."
      },
      {
        label: "Premium Faucet",
        desc: "Grohe faucet offering superior water control and efficiency."
      },
      {
        label: "Quality Components",
        desc: "Carefully selected for hassle-free kitchen use."
      },
    ]
  },
  {
    title: "Paint",
    list: [
      {
        label: "Internal Putty",
        desc: "Premium Asian/Berger putty for smooth, even walls."
      },
      {
        label: "Interior Emulsion",
        desc: "Asian emulsion paint with crack-binding technology for durability."
      },
      {
        label: "Exterior Emulsion",
        desc: "Weather-resitant Asian paint designed to prevent cracks."
      },
      {
        label: "Finish",
        desc: "High-quality coatings ensuring long-lasting, vibrant walls."
      },
    ]
  },
  {
    title: "Door and Windows",
    list: [
      {
        label: "Main Door",
        desc: "Teak wood frame and shutter for durability and style."
      },
      {
        label: "Internal Doors",
        desc: "Moulded/flush doors with a modern finish."
      },
      {
        label: "Toilet Doors",
        desc: "Water-repellent moulded/flush doors for moisture resistance."
      },
      {
        label: "Windows",
        desc: "UPVC/aluminium frames with MS grills for security and aesthetics."
      },
    ]
  },
  {
    title: "Electrical",
    list: [
      {
        label: "Distribution Board",
        desc: "Schneider, Havells, or Siemens."
      },
      {
        label: "MCBs",
        desc: "Schneider, Havells, or Siemens circuit breakers."
      },
      {
        label: "Switches",
        desc: "Schneider or Havells."
      },
      {
        label: "Generator",
        desc: "Kirloskar genset for backup power."
      },
    ]
  },
  {
    title: "Bathroom",
    list: [
      {
        label: "EWC",
        desc: "Premium comfort and durability from Roca, Duravit, or Jaguar."
      },
      {
        label: "Wash Basin",
        desc: "Sleek and sturdy designs by Roca, Duravit, or Jaguar."
      },
      {
        label: "Wall Plate",
        desc: "Stylish finishes from trusted brands Roca, Duravit, and Jaguar."
      },
      {
        label: "Wall Mixer",
        desc: "Smooth and reliable operation with Jaguar mixers."
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
// const locationAdvantages = [
//   { 
//     label: "Sai Vikash Vidya Niketan",
//     desc: "1 min Drive"
//   },{
//     label: "Ayursundra Super Speciality Hospital",
//     desc: "1.1 km (3 min Drive)"
//   },{
//     label: "Delhi Public School",
//     desc: "1.2 km (3 min Drive)",
//   },{
//     label: "Royal Global University",
//     desc: "3.1 km (9 min Drive)"
//   },{
//     label: "ISBT Bus Terminal",
//     desc: "4.1 km (11 min Drive)"
//   },{
//     label: "Apollo Excelcare Hospital",
//     desc: "5.9 km (17 min Drive)"
//   },{
//     label: "Lokpriya Gopinath Bordoloi International Airport",
//     desc: "19 km (30 min Drive)"
//   }
// ];
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

const pageTitle = "Horo Gauri | Sundaram Developers";
const pageDescription = "Horo Gauri is a premium smart living project comprising 72 thoughtfully designed dwellings across 3 elegant blocks, each rising 6 floors high. Offering a range of modern 2 BHK and 3 BHK apartments, as well as commercial shops, this project blends functionality with contemporary design — ideal for every need and budget.";

useHead({
  title: pageTitle,
  meta: [
    { name: 'description', content: pageDescription },
    { name: 'keywords', content: 'horo gauri, complex, flats near ISBT Jorhat, flats near jorhat railway, complex in Jorhat, apartments, Sundaram Developers, residential, Assam, real estate, affordable, flats, premium, construction, Jorhat, property, developers' },
    { property: 'og:title', content: pageTitle },
    { property: 'og:description', content: pageDescription },
    { property: 'og:type', content: 'website' },
    { property: 'og:url', content: 'https://www.sundaramdevelopers.in/horo-gauri'}
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
            <img 
            :src="image" 
            alt="Hero Slide" 
            class="w-full h-full object-cover object-center brightness-40" 
            loading="lazy"/>
          </div>
        </Slide>
      </Carousel>

      <!-- ✅ Centered Overlay Content -->
      <div class="container mx-auto absolute inset-0 flex justify-start px-10 items-center">
        <div class="z-10 p-6 text-white" data-aos="fade-right">
          <p class="text-2xl  mb-6">Affordable Housing – Warmth Living</p>
          <h1 class="text-6xl kanit-bold">Horo Gauri</h1>
          <p class="flex items-center gap-2 text-2xl pt-2 kanit-medium">
            <MapPin />
            Jorhat, Assam
          </p>
        </div>
      </div>
    </div>

    <section class="bg-amber-700 py-16 px-4">
      <h2 class="text-3xl font-bold text-white text-center kanit-semibold">Welcome to Divine Green</h2>
      <div class="container mx-auto grid md:grid-cols-2 gap-8 my-8">
        <!-- <div class="w-full h-[320px] rounded-lg overflow-hidden shadow-lg">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3582.7676223683775!2d91.72310484578604!3d26.106503218366043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5d57ce4e1d6b%3A0x3448edcd871820a3!2sDivine%20Green%20Apartment!5e0!3m2!1sen!2sin!4v1760332643867!5m2!1sen!2sin" class="w-full h-full" style="border:0;" allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade" />
        </div> -->
        <ExternalLoader 
          iframe-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3582.7676223683775!2d91.72310484578604!3d26.106503218366043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5d57ce4e1d6b%3A0x3448edcd871820a3!2sDivine%20Green%20Apartment!5e0!3m2!1sen!2sin!4v1760332643867!5m2!1sen!2sin" 
          :placeholder="MapSearch" />
        <div class="flex flex-col justify-center gap-6 leading-8 text-white text-lg">
          <p><span class="font-semibold italic">Horo Gauri</span> is a premium smart living project comprising <span class="font-semibold italic">72 thoughtfully designed dwellings</span> across <span class="font-semibold italic">3 elegant blocks</span>, each rising <span class="font-semibold italic">6 floors high</span>. Offering a range of <span class="font-semibold italic">modern 2 BHK and 3 BHK apartments</span>, as well as <span class="font-semibold italic">commercial shops</span>, this project blends functionality with contemporary design — ideal for every need and budget.</p>								
        </div>
      </div>
    </section>

    
    <section class="bg-zinc-100 p-4 py-14">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Prime Location Benefits</h2>
      <div class="container mx-auto mt-6">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 py-8">
          <div v-for="benefit in locationBenefits" :key="benefit.title" class="bg-white p-4 py-8 rounded-lg text-center hover:shadow-xl transition shadow-xs duration-300">
            <component :is="benefit.icon" class="w-10 h-10 mx-auto text-orange-500" />
            <h3 class="mt-5 font-semibold text-xl text-amber-900 mb-1 kanit-medium">{{ benefit.title }}</h3>
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
              <h3 class="font-semibold text-xl text-orange-600 kanit-medium">{{ feature.title }}</h3>
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
        <div class="grid md:grid-cols-2 gap-6">
          <div v-for="premium in premiumSpecifications" :key="premium.title" class="p-8">
            <h3 class="text-4xl font-medium mb-5">{{ premium.title }}</h3>
            <ul>
              <li v-for="item in premium.list" :key="item.label" class="list-disc mb-1">
                <b>{{ item.label }}:  </b>
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
        <div class="grid md:grid-cols-2 gap-4 md:gap-6 py-8">
          <div class="aspect-[16/9] h-auto my-auto">
            <iframe src="https://www.youtube.com/embed/nwLQ3s3Fwtk?autoplay=1&amp;mute=1&amp;loop=1&amp;playlist=nwLQ3s3Fwtk&amp;controls=0&amp;showinfo=0&amp;modestbranding=1&amp;rel=0" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media" allowfullscreen="false" title="Video" style="width:100%; height:100%; border:0; display:block; object-fit:cover; pointer-events: none; cursor: default;" />
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
    <section class="hidden bg-zinc-100 p-4 py-14 transition duration-200">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Apartment Types & Sizes</h2>
      <div class="container mx-auto mt-6">
        <div class="grid md:grid-cols-2 gap-4 lg:gap-14 py-8">
          <div>
            <img :src="img3Sm" class="h-full max-h-[370px] aspect-auto w-full object-cover rounded shadow hover:shadow-xl" alt="divine green, sundaram developers"/>
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
    <section class="bg-zinc-100 p-4 py-14">
      <h2 class="text-3xl font-extrabold text-center kanit-semibold">Project Gallery</h2>
      <div class="container mx-auto mt-6">
        <div class="grid md:grid-cols-2 gap-4 md:gap-6 py-8">
          <div v-for="img in gallery" :key="img">
            <img 
            :src="img" 
            class="aspect-[2/3] w-full h-auto rounded shadow object-cover hover:shadow-lg" 
            alt="divine green, sundaram developers"
            loading="lazy" />
          </div>
        </div>
      </div>
    </section>
    <section class="bg-white p-4 py-8">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center pt-12 kanit-medium">Contact Us For Booking</h2>
        <div class="hidden  justify-around gap-6 py-8">
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