<script setup>
import { onMounted, ref } from "vue";
import { clsx } from "clsx";
import { Eye, EyeOff } from "lucide-vue-next";

const input = ref(null);
const isPasswordVisible = ref(false);

const props = defineProps({
    className: {
        type: String,
    },
});

const model = defineModel({
    type: String,
    required: true,
});

const togglePasswordVisibility = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
};

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
defineOptions({
    inheritAttrs: false,
});
</script>

<template>
    <div
        :class="
            clsx(
                'flex items-center rounded-md bg-zinc-800 border border-zinc-700 shadow-sm focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-500 has-[:disabled]:opacity-50 has-[:disabled]:cursor-not-allowed',
                props.className
            )
        "
    >
        <input
            class="rounded-md w-full px-3 py-1.5 bg-transparent border-none outline-none"
            v-model="model"
            ref="input"
            v-bind="$attrs"
            v-bind:type="
                $attrs.type === 'password'
                    ? isPasswordVisible
                        ? 'text'
                        : 'password'
                    : $attrs.type
            "
        />
        <div
            v-if="$attrs.type === 'password'"
            class="grid place-items-center pr-2"
        >
            <button
                type="button"
                @click="togglePasswordVisibility"
                class="text-zinc-300 outline-none border-none focus:text-indigo-500"
            >
                <component :is="isPasswordVisible ? EyeOff : Eye" />
            </button>
        </div>
    </div>
</template>
