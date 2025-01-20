<script setup>
import { clsx } from "clsx";

const props = defineProps({
    color: {
        type: String,
        default: "default",
    },
    variant: {
        type: String,
        default: "outlined",
    },
});

const computeClass = () => {
    if (props.variant === "solid") {
        if (props.color === "primary") {
            return "bg-emerald-500 border border-emerald-500 hover:bg-emerald-400 active:bg-emerald-600 disabled:bg-emerald-500 disabled:border-emerald-500";
        }
        if (props.color === "danger") {
            return "bg-red-500 border border-red-500 hover:bg-red-400 active:bg-red-600 disabled:bg-red-500 disabled:border-red-500";
        }
        return "bg-zinc-100 border border-zinc-100 text-zinc-950 hover:bg-zinc-300 active:bg-zinc-400 disabled:bg-zinc-100 disabled:border-zinc-100 disabled:text-zinc-950";
    }

    if (props.variant === "outlined") {
        if (props.color === "primary") {
            return "bg-zinc-900 border border-emerald-500 text-emerald-500 hover:border-emerald-300 hover:text-emerald-300 active:border-emerald-400 active:text-emerald-400 disabled:border-emerald-500 disabled:text-emerald-500";
        }
        if (props.color === "danger") {
            return "bg-zinc-900 border border-red-500 text-red-500 hover:border-red-300 hover:text-red-300 active:border-red-400 active:text-red-400 disabled:border-red-500 disabled:text-red-500";
        }
        return "bg-zinc-900 border border-zinc-300 text-zinc-50 hover:border-emerald-300 hover:text-emerald-300 active:border-emerald-400 active:text-emerald-400 disabled:border-zinc-300 disabled:text-zinc-50";
    }
};
</script>

<template>
    <button
        :class="
            clsx(
                'rounded-lg px-3 py-2 disabled:opacity-80 disabled:cursor-not-allowed',
                computeClass(),
                $attrs.class
            )
        "
    >
        <slot />
    </button>
</template>
