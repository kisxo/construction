<script setup lang="ts">
import AppLogo from '@/components/AppLogo.vue';
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import { Button } from '@/components/ui/button';
import {
    DropdownMenuContent,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import {
    NavigationMenu,
    NavigationMenuItem,
    NavigationMenuList,
    navigationMenuTriggerStyle,
} from '@/components/ui/navigation-menu';
import {
    Sheet,
    SheetContent,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from '@/components/ui/sheet';
import { toUrl, urlIsActive } from '@/lib/utils';
import type { BreadcrumbItem, NavItem } from '@/types';
import { InertiaLinkProps, Link, usePage } from '@inertiajs/vue3';
import { BookOpen, Folder, Menu } from 'lucide-vue-next';
import { computed } from 'vue';
import InfoBar from './InfoBar.vue';
import { home } from '@/routes';
import { DropdownMenuArrow, DropdownMenuItem, DropdownMenuPortal, DropdownMenuRoot } from 'reka-ui';
import { ref } from 'vue';
import { Io5ChevronDown } from 'vue-icons-plus/io5';

interface Props {
    breadcrumbs?: BreadcrumbItem[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const page = usePage();
// const auth = computed(() => page.props.auth);

const isCurrentRoute = computed(
    () => (url: NonNullable<InertiaLinkProps['href']>) =>
        urlIsActive(url, page.url),
);

const activeItemStyles = computed(
    () => (url: NonNullable<InertiaLinkProps['href']>) =>
        isCurrentRoute.value(toUrl(url))
            ? 'text-neutral-900 dark:bg-neutral-800 dark:text-neutral-100'
            : '',
);

const mainNavItems: NavItem[] = [
    // {
    //     title: 'Dashboard',
    //     href: dashboard(),
    //     icon: LayoutGrid,
    // },
];

const completedProjects = [
    {
        name: "Horo Gauri",
        path: "/horo-gauri"
    },
    {
        name: "P.B Arcade",
        path: "/pb-arcade"
    },
];

const underConstructions = [
    {
        name: "Divine Green",
        path: "/divine-green"
    },
    {
        name: "Sky Link Heights",
        path: "/sky-link-heights"
    },
    {
        name: "Shivashree Apartments",
        path: "/shivashree"
    },
];

const toggleProjectsMenu = ref(false)

const rightNavItems: NavItem[] = [
    {
        title: 'Home',
        href: '/',
        icon: BookOpen,
    },
    {
        title: 'Projects',
        href: '#',
        subs: [
            {
                subTitle: 'Completed Projects',
                items: [
                    {
                        title: 'Horo Gauri',
                        href: '/horo-gauri'
                    },
                    {
                        title: 'P.B Arcade',
                        href: '/pb-arcade'
                    }
                ]
            },
            {
                subTitle: 'Under Constructions',
                items: [
                    {
                        title: 'Divine Green',
                        href: '/divine-green'
                    },
                    {
                        title: 'Sky Link Height',
                        href: '/sky-link-heights'
                    },
                    {
                        title: 'Shivashree Apartment',
                        href: '/shivashree'
                    }
                ]
            },
        ]
    },
    {
        title: 'Contact',
        href: '/contact',
        icon: Folder,
    },
    {
        title: 'About Us',
        href: '/about-us',
        icon: BookOpen,
    },
];
</script>

<template>
    <div>
        <div class="border-b border-sidebar-border/80">
            <InfoBar />
            <div class="mx-auto flex h-16 items-center px-4 md:max-w-7xl" id="header-top">

                <Link :href="home()" class="flex items-center gap-x-2">
                <AppLogo />
                </Link>

                                <!-- Mobile Menu -->
                <div class="lg:hidden ms-auto">
                    <Sheet>
                        <SheetTrigger :as-child="true">
                            <Button variant="ghost" size="icon" class="mr-2 h-9 w-9" aria-label="menu">
                                <Menu class="h-5 w-5" />
                            </Button>
                        </SheetTrigger>
                        <SheetContent side="right" class="w-[300px] p-6">
                            <SheetTitle class="sr-only">Navigation Menu</SheetTitle>
                            <SheetHeader class="flex justify-start text-left">
                                <AppLogoIcon class="size-6 fill-current text-black dark:text-white" />
                            </SheetHeader>
                            <div class="flex h-full flex-1 flex-col justify-between space-y-4 py-6">
                                <!-- <nav class="-mx-3 space-y-1">
                                    <Link v-for="item in mainNavItems" :key="item.title" :href="item.href"
                                        class="flex items-center gap-x-3 rounded-lg px-3 py-2 text-sm font-medium hover:bg-accent"
                                        :class="activeItemStyles(item.href)">
                                    <component v-if="item.icon" :is="item.icon" class="h-5 w-5" />
                                    {{ item.title }}
                                    </Link>
                                </nav> -->
                                <div class="flex flex-col">
                                    <div v-for="item in rightNavItems" :key="item.title"
                                        class="flex items-center space-x-2 text-sm font-medium">
                                        <div v-if="item.subs">
                                            <div v-for="subItem in item.subs" :key="subItem.subTitle"  class="mb-4">
                                                <p class="border-b">{{ subItem.subTitle }}</p>
                                                <div v-for="ultraSubItem in subItem.items" class="ps-4 mb-1 hover:bg-zinc-200" :key="ultraSubItem.title">
                                                    <Link :href="toUrl(ultraSubItem.href)" rel="noopener noreferrer" prefetch="hover" >{{ ultraSubItem.title }}</Link>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-else class="mb-4">
                                            <!-- <component v-if="item.icon" :is="item.icon" class="h-5 w-5" /> -->
                                            <Link :href="toUrl(item.href)" rel="noopener noreferrer" >{{ item.title }}</Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </SheetContent>
                    </Sheet>
                </div>

                

                <!-- Desktop Menu -->
                <div class="hidden h-full lg:flex lg:flex-1">
                    <NavigationMenu class="ml-10 flex h-full items-stretch">
                        <NavigationMenuList class="flex h-full items-stretch space-x-2">
                            <NavigationMenuItem v-for="(item, index) in mainNavItems" :key="index"
                                class="relative flex h-full items-center">
                                <Link :class="[
                                    navigationMenuTriggerStyle(),
                                    activeItemStyles(item.href),
                                    'h-9 cursor-pointer px-3',
                                ]" :href="item.href">
                                <component v-if="item.icon" :is="item.icon" class="mr-2 h-4 w-4" />
                                {{ item.title }}
                                </Link>
                                <div v-if="isCurrentRoute(item.href)"
                                    class="absolute bottom-0 left-0 h-0.5 w-full translate-y-px bg-black dark:bg-white">
                                </div>
                            </NavigationMenuItem>
                        </NavigationMenuList>
                    </NavigationMenu>
                </div>

                <div class="ml-auto hidden lg:flex items-center space-x-2">
                    <div class="flex gap-4">
                        <DropdownMenuRoot v-model:open="toggleProjectsMenu">
                            <DropdownMenuTrigger
                                        class="flex gap-2 cursor-pointer me-2"
                                        aria-label="projects menu"
                                        >
                                        <!-- <Icon icon="radix-icons:hamburger-menu" /> -->
                                        Projects
                                        <Io5ChevronDown class="scale-75" />
                                    </DropdownMenuTrigger>
                                <DropdownMenuPortal>
                                    <DropdownMenuContent
                                        class="min-w-[220px] outline-none bg-white rounded-md p-[5px] shadow-[0px_10px_38px_-10px_rgba(22,_23,_24,_0.35),_0px_10px_20px_-15px_rgba(22,_23,_24,_0.2)] will-change-[opacity,transform] data-[side=top]:animate-slideDownAndFade data-[side=right]:animate-slideLeftAndFade data-[side=bottom]:animate-slideUpAndFade data-[side=left]:animate-slideRightAndFade"
                                        :side-offset="5"
                                    >
                                        <p class="capitalize font-semibold text-zinc-700 border-b border-b-zinc-400 mt-4">
                                            completed projects
                                        </p> 
                                        <DropdownMenuItem
                                        v-for="project in completedProjects"
                                        :key="project.name"
                                        value="New Tab"
                                        class="group leading-none text-grass11 rounded-[3px] flex items-center h-[25px] px-[5px] relative pl-[25px] select-none outline-none data-[disabled]:text-mauve8 data-[disabled]:pointer-events-none data-[highlighted]:bg-green9 data-[highlighted]:text-green1 hover:bg-zinc-300"
                                        
                                        >
                                        <Link :href="project.path" prefetch="hover" cache-for="1m">{{ project.name }}</Link>
                                        </DropdownMenuItem>
                                        <!-- <DropdownMenuSeparator class="h-[1px] bg-green-600 m-[5px]" /> -->
                                       
                                        <p class="capitalize font-semibold text-zinc-700 border-b border-b-zinc-400 mt-4">
                                            under construction
                                        </p> 
                                        <DropdownMenuItem
                                        v-for="project in underConstructions"
                                        :key="project.name"
                                        value="New Tab"
                                        class="group leading-none text-grass11 rounded-[3px] flex items-center h-[25px] px-[5px] relative pl-[25px] select-none outline-none data-[disabled]:text-mauve8 data-[disabled]:pointer-events-none data-[highlighted]:bg-green9 data-[highlighted]:text-green1 hover:bg-zinc-300"
                                        
                                        >
                                        <Link :href="project.path" prefetch="hover" cache-for="1m">{{ project.name }}</Link>
                                        </DropdownMenuItem>
                                        <DropdownMenuArrow class="fill-white" />
                                    </DropdownMenuContent>
                                </DropdownMenuPortal>
                            </DropdownMenuRoot>
                        <div v-for="link in rightNavItems" :key="link.title">
                            <Link v-if="link.href!='#'" :href="link.href">
                                {{ link.title }}
                            </Link>
                        </div>
                    </div>
                    <!-- <div class="relative flex items-center space-x-1">
                        <Button variant="ghost" size="icon" class="group h-9 w-9 cursor-pointer">
                            <Search class="size-5 opacity-80 group-hover:opacity-100" />
                        </Button>

                        <div class="hidden space-x-1 lg:flex">
                            <template v-for="item in rightNavItems" :key="item.title">
                                <TooltipProvider :delay-duration="0">
                                    <Tooltip>
                                        <TooltipTrigger>
                                            <Button variant="ghost" size="icon" as-child
                                                class="group h-9 w-9 cursor-pointer">
                                                <a :href="toUrl(item.href)" target="_blank" rel="noopener noreferrer">
                                                    <span class="sr-only">{{
                                                        item.title
                                                        }}</span>
                                                    <component :is="item.icon"
                                                        class="size-5 opacity-80 group-hover:opacity-100" />
                                                </a>
                                            </Button>
                                        </TooltipTrigger>
                                        <TooltipContent>
                                            <p>{{ item.title }}</p>
                                        </TooltipContent>
                                    </Tooltip>
                                </TooltipProvider>
                            </template>
                        </div>
                    </div> -->

                    <!-- <DropdownMenu>
                        <DropdownMenuTrigger :as-child="true">
                            <Button
                                variant="ghost"
                                size="icon"
                                class="relative size-10 w-auto rounded-full p-1 focus-within:ring-2 focus-within:ring-primary"
                            >
                                <Avatar
                                    class="size-8 overflow-hidden rounded-full"
                                >
                                    <AvatarImage
                                        v-if="auth.user.avatar"
                                        :src="auth.user.avatar"
                                        :alt="auth.user.name"
                                    />
                                    <AvatarFallback
                                        class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ getInitials(auth.user?.name) }}
                                    </AvatarFallback>
                                </Avatar>
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent align="end" class="w-56">
                            <UserMenuContent :user="auth.user" />
                        </DropdownMenuContent>
                    </DropdownMenu> -->
                </div>
            </div>
        </div>

        <div v-if="props.breadcrumbs.length > 1" class="flex w-full border-b border-sidebar-border/70">
            <div class="mx-auto flex h-12 w-full items-center justify-start px-4 text-neutral-500 md:max-w-7xl">
                <Breadcrumbs :breadcrumbs="breadcrumbs" />
            </div>
        </div>
    </div>
</template>
