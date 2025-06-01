<template>
    <Head :title="`Login | ${$page.component}`" />

    <!-- Background com gradiente pastel -->
    <div
        class="min-h-screen bg-gradient-pastel-1 flex items-center justify-center p-4"
    >
        <!-- Container principal -->
        <div class="w-full max-w-md">
            <!-- Header com título e subtítulo -->
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full backdrop-blur-sm mb-4"
                >
                    <svg
                        class="w-8 h-8 text-pastel-purple"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l5-3 5 3z"
                        />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">VetGo</h1>
                <p class="text-gray-600 text-lg">Bem-vindo de volta!</p>
            </div>

            <!-- Card do formulário -->
            <div class="card-pastel">
                <form @submit.prevent="handleSubmit" class="space-y-6">
                    <!-- Campo Email -->
                    <div class="form-group">
                        <label
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            <svg
                                class="inline w-4 h-4 mr-2 text-pastel-blue"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                            Email
                        </label>
                        <input
                            type="email"
                            v-model="form.email"
                            id="email"
                            class="input-pastel"
                            placeholder="Digite seu email"
                            required
                            autofocus
                        />
                        <p
                            v-if="form.errors.email"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <!-- Campo Senha -->
                    <div class="form-group">
                        <label
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            <svg
                                class="inline w-4 h-4 mr-2 text-pastel-purple"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                />
                            </svg>
                            Senha
                        </label>
                        <div class="relative">
                            <input
                                :type="showPassword ? 'text' : 'password'"
                                v-model="form.password"
                                id="password"
                                class="input-pastel pr-12"
                                placeholder="Digite sua senha"
                                autocomplete="new-password"
                                required
                            />
                            <button
                                type="button"
                                @click="showPassword = !showPassword"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                            >
                                <svg
                                    v-if="!showPassword"
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 12c0 1.66-1.34 3-3 3s-3-1.34-3-3 1.34-3 3-3 3 1.34 3 3z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.46 12C3.73 7.54 7.5 4.5 12 4.5s8.27 3.04 9.54 7.5c-1.27 4.46-5.04 7.5-9.54 7.5S3.73 16.46 2.46 12z"
                                    />
                                </svg>
                                <svg
                                    v-else
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13.88 13.88c-.59.59-1.41.95-2.12.95-1.66 0-3-1.34-3-3 0-.71.36-1.53.95-2.12m7.07 7.07L21 21m-2.12-2.12C16.8 17.8 14.52 18.5 12 18.5c-4.48 0-8.27-3.04-9.54-7.5.77-2.7 2.39-5.02 4.54-6.62M9.88 9.88c.59-.59 1.41-.95 2.12-.95 1.66 0 3 1.34 3 3 0 .71-.36 1.53-.95 2.12L9.88 9.88z"
                                    />
                                </svg>
                            </button>
                        </div>
                        <p
                            v-if="form.errors.password"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.password }}
                        </p>
                    </div>

                    <!-- Opções adicionais -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input
                                type="checkbox"
                                v-model="form.remember"
                                class="w-4 h-4 text-pastel-purple bg-gray-100 border-gray-300 rounded focus:ring-pastel-purple focus:ring-2"
                            />
                            <span class="ml-2 text-sm text-gray-600">
                                Lembrar-me
                            </span>
                        </label>
                        <a
                            href="#"
                            class="text-sm text-pastel-purple font-semibold hover:underline"
                        >
                            Esqueceu a senha?
                        </a>
                    </div>

                    <!-- Botão de submissão -->
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="btn-pastel-primary w-full text-lg py-4 relative"
                        :class="{
                            'opacity-50 cursor-not-allowed': form.processing,
                        }"
                    >
                        <span v-if="!form.processing">
                            <svg
                                class="inline w-5 h-5 mr-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                                />
                            </svg>
                            Entrar
                        </span>
                        <div v-else class="flex items-center justify-center">
                            <div class="spinner-pastel mr-2"></div>
                            Entrando...
                        </div>
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500"
                            >Primeiro acesso?</span
                        >
                    </div>
                </div>

                <!-- Informações sobre o cadastro -->
                <div class="bg-green-50/50 rounded-lg p-4 mb-6">
                    <div class="flex items-start space-x-3">
                        <svg
                            class="w-15 h-15 text-green-500 mt-0.5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.168 18.477 18.582 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                            />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">
                                Novo estudante?
                            </h4>
                            <p class="text-sm text-gray-600 mb-3">
                                Cadastre-se para acessar nosso sistema de consultas e começar sua jornada prática na medicina veterinária.
                            </p>
                            <Link
                                :href="route('cadastrar')"
                                class="inline-flex items-center text-sm text-pastel-purple font-semibold hover:underline"
                            >
                                <svg
                                    class="w-4 h-4 mr-1"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                    />
                                </svg>
                                Criar conta agora
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-500">
                    VetGo © 2025 — Todos os direitos reservados. <br/>
                    Projeto desenvolvido pelos alunos da Uninassau de Parnaíba.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import { useForm, Link, Head } from "@inertiajs/vue3";
import { route } from "../../../../vendor/tightenco/ziggy/src/js";
import AuthLayout from "../../Layouts/AuthLayout.vue";

export default {
    components: {
        Link,
        Head,
    },
    layout: AuthLayout,

    setup() {
        const form = useForm({
            email: "",
            password: "",
            remember: false,
        });

        const showPassword = ref(false);

        function handleSubmit() {
            form.post(route("login"), {
                onFinish: () => form.reset("password"),
            });
        }

        return {
            form,
            showPassword,
            handleSubmit,
            route,
        };
    },
};
</script>
