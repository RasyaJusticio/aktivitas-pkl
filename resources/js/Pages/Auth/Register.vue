<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputLabel from "@/Components/Forms/InputLabel.vue";
import Input from "@/Components/Forms/Input.vue";
import Button from "@/Components/UI/Button.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import InputError from "@/Components/Forms/InputError.vue";

const form = useForm({
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onSuccess: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="p-5 bg-zinc-900 border border-zinc-800 rounded-xl w-96">
            <ApplicationLogo class="my-1" />
            <h1 class="text-xl text-center tracking-wider">Daftar</h1>

            <form @submit.prevent="submit" class="space-y-4 mt-8">
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

                <div>
                    <InputLabel for="password_confirmation"
                        >Konfirmasi Password</InputLabel
                    >
                    <Input
                        id="password_confirmation"
                        type="password"
                        class-name="w-full mt-1"
                        v-model="form.password_confirmation"
                    />
                    <InputError
                        class="mt-1"
                        :message="form.errors.password_confirmation"
                    />
                </div>

                <Button class="w-full" color="primary" variant="solid"
                    >Daftar</Button
                >
            </form>
        </div>
    </GuestLayout>
</template>
