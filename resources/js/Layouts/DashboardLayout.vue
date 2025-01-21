<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
import { clsx } from "clsx";
import { Home, Menu } from "lucide-vue-next";
import { ref } from "vue";

const isSidebarVisible = ref(false);
const navigations = [
    {
        type: "link",
        id: "dashboard",
        label: "Dashboard",
        path: "dashboard",
        icon: Home,
    },
];
</script>

<template>
    <div class="flex flex-row-reverse min-h-screen bg-zinc-950 text-zinc-50">
        <div class="flex flex-1 flex-col">
            <header
                class="bg-zinc-900 border-b border-zinc-800 h-16 flex items-center px-4 md:px-5 lg:px-6"
            >
                <button
                    class="block text-zinc-400 hover:text-zinc-300 lg:hidden"
                    @click="isSidebarVisible = !isSidebarVisible"
                >
                    <Menu size="32" />
                </button>
            </header>
            <main class="px-4 py-5">
                <slot />
            </main>
        </div>
        <aside
            :class="
                clsx(
                    'flex flex-col fixed lg:sticky w-screen lg:w-64 h-screen top-0 left-0 transition-opacity lg:transition-none',
                    isSidebarVisible
                        ? 'opacity-100'
                        : 'pointer-events-none opacity-0 lg:pointer-events-auto lg:opacity-100'
                )
            "
        >
            <div
                @click="isSidebarVisible = false"
                class="absolute w-full h-full bg-zinc-900/50"
            ></div>
            <div
                :class="
                    clsx(
                        'flex flex-col h-full w-64 lg:transition-none transition-transform',
                        isSidebarVisible
                            ? 'translate-x-0'
                            : '-translate-x-full lg:translate-x-0'
                    )
                "
            >
                <header
                    class="px-4 bg-zinc-900 border-b w-64 z-30 shadow-lg border-r lg:border-r-0 border-zinc-800 h-16 flex items-center"
                >
                    <Link :href="route('dashboard')">
                        <ApplicationLogo />
                    </Link>
                </header>
                <nav
                    class="flex flex-col gap-2 flex-1 bg-zinc-900 z-20 w-64 shadow-lg lg:bg-zinc-900/80 border-r border-zinc-800 px-4 py-5"
                >
                    <div
                        v-for="nav in navigations"
                        :key="nav.id"
                        class="flex w-full"
                    >
                        <Link
                            v-if="nav.type === 'link'"
                            :href="nav.path"
                            :class="
                                clsx(
                                    'px-3 hover:bg-zinc-800 flex items-center gap-2 w-full py-2 rounded-lg',
                                    nav.path === route().current() &&
                                        'bg-zinc-800 text-emerald-500'
                                )
                            "
                        >
                            <component
                                :is="nav.icon"
                                :class="
                                    clsx(
                                        nav.path === route().current()
                                            ? 'text-emerald-500'
                                            : 'text-zinc-400'
                                    )
                                "
                                stroke-width="1.85"
                                size="22"
                            />
                            <p class="font-medium">
                                {{ nav.label }}
                            </p>
                        </Link>
                    </div>
                </nav>
            </div>
        </aside>
    </div>
</template>
