<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputLabel from "@/Components/Forms/InputLabel.vue";
import Input from "@/Components/Forms/Input.vue";
import Button from "@/Components/UI/Button.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import InputError from "@/Components/Forms/InputError.vue";

const form = useForm({
    email: "",
    password: "",
});

const submit = () => {
    form.post(route("login"), {
        onSuccess: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Masuk" />

        <div class="p-5 bg-zinc-900 border border-zinc-800 rounded-xl w-96">
            <ApplicationLogo class="my-1" />
            <h1 class="text-xl text-center tracking-wider mt-6 mb-1">Masuk</h1>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <InputLabel for="name">Email</InputLabel>
                    <Input
                        id="name"
                        type="text"
                        class-name="w-full mt-1"
                        v-model="form.email"
                        autocomplete="email"
                        autofocus
                    />
                    <InputError class="mt-1" :message="form.errors.email" />
                </div>

                <div>
                    <InputLabel for="password">Password</InputLabel>
                    <Input
                        id="password"
                        type="password"
                        class-name="w-full mt-1"
                        v-model="form.password"
                        autocomplete="new-password"
                    />
                    <InputError class="mt-1" :message="form.errors.password" />
                </div>

                <Button class="w-full !mt-6" color="primary" variant="solid"
                    >Masuk</Button
                >

                <p class="text-center text-zinc-300">
                    Belum memiliki akun?
                    <Link
                        :href="route('register')"
                        class="text-emerald-400 underline hover:text-emerald-300 active:text-emerald-500"
                        >Daftar
                    </Link>
                </p>
            </form>
        </div>
    </GuestLayout>
</template>
