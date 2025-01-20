<script setup>
const props = defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="text-base font-medium text-zinc-400">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
