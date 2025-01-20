<script setup>
import clsx from "clsx";

const props = defineProps({
    class: {
        type: [String],
    },
});
</script>

<template>
    <div
        :class="
            clsx(
                'flex items-center text-3xl tracking-wider font-extrabold',
                props.class
            )
        "
    >
        <p
            class="bg-gradient-to-r from-zinc-400 to-zinc-200 text-transparent bg-clip-text"
        >
            Aktivitas
        </p>
        <p
            class="bg-gradient-to-r from-emerald-500 to-emerald-300 text-transparent bg-clip-text"
        >
            PKL
        </p>
    </div>
</template>
