<template>
    <Head :title="`Cadastrar Estudante | ${$page.component}`" />

    <!-- Background com gradiente pastel -->
    <div
        class="min-h-screen bg-gradient-pastel-1 flex items-center justify-center p-4"
    >
        <!-- Container principal com largura expandida -->
        <div class="w-full max-w-4xl">
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
                            d="M12 14l9-5-9-5-9 5 9 5z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                        />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">VetGo</h1>
                <p class="text-gray-600 text-lg">
                    Cadastrar Novo Estudante
                </p>
            </div>

            <!-- Card do formulário -->
            <div class="card-pastel">
                <form @submit.prevent="submit" class="space-y-8">
                    <!-- Primeira linha: Nome e CPF -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Nome Completo -->
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
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                Nome Completo
                            </label>
                            <input
                                type="text"
                                v-model="form.nome"
                                class="input-pastel"
                                placeholder="Digite o nome completo do estudante"
                                required
                                minlength="3"
                                maxlength="100"
                            />
                            <p
                                v-if="form.errors.nome"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.nome }}
                            </p>
                        </div>

                        <!-- Campo CPF -->
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
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                    />
                                </svg>
                                CPF
                            </label>
                            <input
                                type="text"
                                v-model="form.cpf"
                                class="input-pastel"
                                placeholder="000.000.000-00"
                                required
                                @input="formatCPF"
                                maxlength="14"
                            />
                            <p
                                v-if="form.errors.cpf"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.cpf }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Apenas números
                            </p>
                        </div>
                    </div>

                    <!-- Segunda linha: Telefone e Data de Nascimento -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Telefone -->
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
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                    />
                                </svg>
                                Telefone/Celular
                            </label>
                            <input
                                type="tel"
                                v-model="form.telefone"
                                class="input-pastel"
                                placeholder="(00) 00000-0000"
                                required
                                @input="formatTelefone"
                                maxlength="15"
                            />
                            <p
                                v-if="form.errors.telefone"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.telefone }}
                            </p>
                        </div>

                        <!-- Campo Data de Nascimento -->
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
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                </svg>
                                Data de Nascimento
                            </label>
                            <input
                                type="date"
                                v-model="form.data_nascimento"
                                class="input-pastel"
                                :max="maxDate"
                                required
                            />
                            <p
                                v-if="form.errors.data_nascimento"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.data_nascimento }}
                            </p>
                        </div>
                    </div>

                    <!-- Terceira linha: Matrícula -->
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Campo Matrícula -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-orange"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
                                    />
                                </svg>
                                Número da Matrícula
                            </label>
                            <input
                                type="text"
                                v-model="form.matricula"
                                class="input-pastel"
                                placeholder="Digite o número da matrícula"
                                required
                                minlength="6"
                                maxlength="20"
                            />
                            <p
                                v-if="form.errors.matricula"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.matricula }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Número único de identificação do estudante na instituição
                            </p>
                        </div>
                    </div>

                    <!-- Botões de ação -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button
                            type="submit"
                            :disabled="!isFormValid || form.processing"
                            class="btn-pastel-primary flex-1 text-lg py-4 relative"
                            :class="{
                                'opacity-50 cursor-not-allowed':
                                    !isFormValid || form.processing,
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
                                        d="M12 14l9-5-9-5-9 5 9 5z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                                    />
                                </svg>
                                Cadastrar Estudante
                            </span>
                            <div v-else class="flex items-center justify-center">
                                <div class="spinner-pastel mr-2"></div>
                                Cadastrando...
                            </div>
                        </button>
                        
                        <button
                            type="button"
                            class="btn-pastel-secondary flex-1 sm:flex-none sm:px-8 py-4"
                            @click="resetForm"
                        >
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
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                />
                            </svg>
                            Limpar
                        </button>
                    </div>
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

                <!-- Informações sobre o cadastro -->
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
                                Sobre o Cadastro de Estudantes
                            </h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Todos os campos são obrigatórios</li>
                                <li>• O CPF será validado automaticamente</li>
                                <li>• A matrícula deve ser única para cada estudante</li>
                                <li>• Verifique os dados antes de confirmar o cadastro</li>
                                <li>• As informações são confidenciais e protegidas</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Links úteis -->
                <div class="text-center mt-8 space-y-2">
                    <p class="text-gray-600">
                        Precisa cadastrar mais estudantes?
                        <button
                            type="button"
                            @click="resetForm"
                            class="text-pastel-purple font-semibold hover:underline"
                        >
                            Limpar formulário
                        </button>
                    </p>
                    <p class="text-gray-600">
                        Quer ver todos os estudantes cadastrados?
                        <a
                            href="/estudantes"
                            class="text-pastel-blue font-semibold hover:underline"
                        >
                            Ver estudantes cadastrados
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { computed, ref } from "vue";
import { Head } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

export default {
    components: {
        Head,
    },

    setup() {
        const form = useForm({
            nome: "",
            cpf: "",
            telefone: "",
            data_nascimento: "",
            matricula: "",
        });

        // Data máxima (hoje) para data de nascimento
        const maxDate = computed(() => {
            return new Date().toISOString().split('T')[0];
        });

        // Validação do formulário
        const isFormValid = computed(() => {
            return (
                form.nome &&
                form.cpf &&
                form.telefone &&
                form.data_nascimento &&
                form.matricula
            );
        });

        // Formatação do CPF
        const formatCPF = () => {
            let cpf = form.cpf.replace(/\D/g, '');
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            form.cpf = cpf;
        };

        // Formatação do telefone
        const formatTelefone = () => {
            let telefone = form.telefone.replace(/\D/g, '');
            if (telefone.length <= 10) {
                telefone = telefone.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
            } else {
                telefone = telefone.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
            }
            form.telefone = telefone;
        };

        const submit = () => {
            if (!isFormValid.value) return;
            
            form.post(route('estudantes.store'), {
                onSuccess: () => {
                    // Lógica de sucesso se necessário
                },
                onError: (errors) => {
                    // Tratar erros se necessário
                },
            });
        };

        const resetForm = () => {
            form.reset();
        };

        return {
            form,
            maxDate,
            isFormValid,
            formatCPF,
            formatTelefone,
            submit,
            resetForm,
        };
    },
};
</script>