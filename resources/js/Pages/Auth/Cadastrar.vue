<template>
    <Head :title="`Cadastro | ${$page.component}`" />

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
                <p class="text-gray-600 text-lg">
                    Feito por estudantes para estudantes!
                </p>
            </div>

            <!-- Card do formulário -->
            <div class="card-pastel">
                <!-- Indicador de progresso -->

                <form @submit.prevent="handleSubmit" class="space-y-6">
                    <!-- Campo Nome -->
                    <div class="form-group">
                        <label
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            <svg
                                class="inline w-4 h-4 mr-2 text-pastel-pink"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7c0-2.21-1.79-4-4-4S8 4.79 8 7s1.79 4 4 4 4-1.79 4-4z"
                                />
                            </svg>
                            Nome Completo
                        </label>
                        <input
                            type="text"
                            v-model="form.name"
                            class="input-pastel"
                            placeholder="Digite seu nome completo"
                            required
                        />
                        <p
                            v-if="form.errors.name"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.name }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            Nome completo do estudante de veterinária
                        </p>
                    </div>

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
                            Email Acadêmico
                        </label>
                        <input
                            type="email"
                            v-model="form.email"
                            class="input-pastel"
                            placeholder="suamatricula@sempreuninassau.com.br"
                            required
                        />
                        <p
                            v-if="form.errors.email"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.email }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            Use seu email institucional da faculdade
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
                                class="input-pastel pr-12"
                                placeholder="Crie uma senha segura"
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
                        <!-- Indicador de força da senha -->
                        <div class="mt-2">
                            <div class="flex space-x-1">
                                <div
                                    class="h-1 flex-1 rounded-full"
                                    :class="
                                        passwordStrength >= 1
                                            ? 'bg-red-300'
                                            : 'bg-gray-200'
                                    "
                                ></div>
                                <div
                                    class="h-1 flex-1 rounded-full"
                                    :class="
                                        passwordStrength >= 2
                                            ? 'bg-yellow-300'
                                            : 'bg-gray-200'
                                    "
                                ></div>
                                <div
                                    class="h-1 flex-1 rounded-full"
                                    :class="
                                        passwordStrength >= 3
                                            ? 'bg-green-300'
                                            : 'bg-gray-200'
                                    "
                                ></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">
                                {{ passwordStrengthText }}
                            </p>
                        </div>
                    </div>

                    <!-- Campo Confirmar Senha -->
                    <div class="form-group">
                        <label
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            <svg
                                class="inline w-4 h-4 mr-2 text-pastel-green"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                            Confirmar Senha
                        </label>
                        <input
                            type="password"
                            v-model="form.password_confirmation"
                            class="input-pastel"
                            :class="{
                                'border-red-300':
                                    form.password &&
                                    form.password_confirmation &&
                                    form.password !==
                                        form.password_confirmation,
                            }"
                            placeholder="Digite a senha novamente"
                            required
                        />
                        <p
                            v-if="
                                form.password &&
                                form.password_confirmation &&
                                form.password !== form.password_confirmation
                            "
                            class="text-xs text-red-500 mt-1"
                        >
                            As senhas não coincidem
                        </p>
                    </div>

                    <!-- Botão de submissão -->
                    <button
                        type="submit"
                        :disabled="!isFormValid || isLoading"
                        class="btn-pastel-primary w-full text-lg py-4 relative"
                        :class="{
                            'opacity-50 cursor-not-allowed':
                                !isFormValid || isLoading,
                        }"
                    >
                        <span v-if="!isLoading">
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
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.168 18.477 18.582 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                />
                            </svg>
                            Cadastrar
                        </span>
                        <div v-else class="flex items-center justify-center">
                            <div class="spinner-pastel mr-2"></div>
                            Criando conta...
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
                            >Informações Importantes</span
                        >
                    </div>
                </div>

                <!-- Informações sobre o estágio -->
                <div class="bg-blue-50/50 rounded-lg p-4 mb-6">
                    <div class="flex items-start space-x-3">
                        <svg
                            class="w-5 h-5 text-blue-500 mt-0.5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"
                            />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">
                                Sobre o Programa de Estágio
                            </h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    • Experiência prática em clínica veterinária
                                </li>
                                <li>
                                    • Supervisão de professores e veterinários
                                    experientes
                                </li>
                                <li>
                                    • Oportunidade de aplicar conhecimentos
                                    teóricos
                                </li>
                                <li>• Ambiente de aprendizado colaborativo</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Link para login -->
                <div class="text-center mt-8">
                    <p class="text-gray-600">
                        Já é cadastrado?
                        <a
                            href="/login"
                            class="text-pastel-purple font-semibold hover:underline"
                        >
                            Faça login aqui
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref, computed } from "vue";
import { Head, router } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/AuthLayout.vue";

export default {
    layout: AuthLayout,
    components: {
        Head,
    },

    setup() {
        const form = useForm({
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            agreement: false,
        });

        const showPassword = ref(false);
        const isLoading = ref(false);

        // Calculador de força da senha
        const passwordStrength = computed(() => {
            const password = form.password;
            if (!password) return 0;

            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password) && /[a-z]/.test(password)) strength++;
            if (/\d/.test(password) && /[!@#$%^&*(),.?":{}|<>]/.test(password))
                strength++;

            return strength;
        });

        const passwordStrengthText = computed(() => {
            switch (passwordStrength.value) {
                case 0:
                    return "Digite uma senha";
                case 1:
                    return "Senha fraca";
                case 2:
                    return "Senha média";
                case 3:
                    return "Senha forte";
                default:
                    return "";
            }
        });

        // Validação do formulário
        const isFormValid = computed(() => {
            return (
                form.name.length > 0 &&
                form.email.length > 0 &&
                form.password.length >= 8 &&
                form.password === form.password_confirmation
            );
        });

        const handleSubmit = async () => {
            if (!isFormValid.value) return;

            isLoading.value = true;

            try {
                await form.post(
                    "/cadastro",
                    {
                        name: form.name,
                        email: form.email,
                        password: form.password,
                        password_confirmation: form.password_confirmation,
                    },
                    {
                        onSuccess: () => {
                            // Redirecionar ou mostrar mensagem de sucesso
                            router.visit("/login", {
                                preserveState: true,
                                preserveScroll: true,
                            });
                        },
                        onError: (errors) => {
                            // Tratar erros de validação se necessário
                            // Exemplo: mostrar mensagens de erro no formulário
                        },
                        onFinish: () => {
                            isLoading.value = false;
                        },
                    }
                );
            } catch (error) {
                console.error("Erro ao criar conta:", error);
                isLoading.value = false;
            }
        };

        return {
            form,
            showPassword,
            isLoading,
            passwordStrength,
            passwordStrengthText,
            isFormValid,
            handleSubmit,
        };
    },
};
</script>
