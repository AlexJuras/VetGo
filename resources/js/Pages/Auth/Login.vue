<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md">
            <div class="card-pastel p-8 shadow-lg rounded-lg bg-white">
                <h2 class="text-2xl font-bold mb-6 text-center">Entrar</h2>
                <form @submit.prevent="handleSubmit">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="email"
                            >E-mail</label
                        >
                        <input
                            v-model="form.email"
                            id="email"
                            type="email"
                            class="input"
                            required
                            autofocus
                        />
                        <div
                            v-if="form.errors.email"
                            class="text-red-500 text-sm mt-1"
                        >
                            {{ form.errors.email }}
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="password"
                            >Senha</label
                        >
                        <input
                            v-model="form.password"
                            id="password"
                            type="password"
                            class="input"
                            autocomplete="new-password"
                            required
                        />
                        <div
                            v-if="form.errors.password"
                            class="text-red-500 text-sm mt-1"
                        >
                            {{ form.errors.password }}
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center">
                            <input
                                type="checkbox"
                                v-model="form.remember"
                                class="mr-2"
                            />
                            <span class="text-sm text-gray-600"
                                >Lembrar-me</span
                            >
                        </label>
                        <Link
                            :href="route('cadastrar')"
                            class="text-sm text-indigo-600 hover:underline"
                        >
                            Criar conta
                        </Link>
                    </div>
                    <button
                        type="submit"
                        class="w-full bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600 transition"
                        :disabled="form.processing"
                    >
                        Entrar
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useForm, Link } from "@inertiajs/vue3";
import { route } from "../../../../vendor/tightenco/ziggy/src/js";
import AuthLayout from "@/Layouts/AuthLayout.vue";

defineOptions({
    layout: AuthLayout,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

function handleSubmit() {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
}
</script>

<style scoped>
.input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    outline: none;
    transition: border-color 0.2s;
}
.input:focus {
    border-color: #6366f1;
}
.card-pastel {
    background: linear-gradient(135deg, #f3e8ff 0%, #e0e7ff 100%);
}
</style>
