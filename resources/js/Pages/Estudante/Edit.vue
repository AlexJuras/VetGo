<template>
    <Head :title="`Editar Estudante | ${$page.component}`" />

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
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                        />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">VetGo</h1>
                <p class="text-gray-600 text-lg">
                    Editar Dados do Estudante
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
                            <!-- <p class="text-xs text-gray-500 mt-1">
                                Apenas números (será formatado automaticamente)
                            </p> -->
                        </div>
                    </div>

                    <!-- Segunda linha: Matrícula e Idade -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Matrícula -->
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
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a1.994 1.994 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
                                    />
                                </svg>
                                Matrícula
                            </label>
                            <input
                                type="text"
                                v-model="form.matricula"
                                class="input-pastel"
                                placeholder="Digite o número da matrícula"
                                required
                                maxlength="20"
                            />
                            <p
                                v-if="form.errors.matricula"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.matricula }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Número único de identificação do estudante
                            </p>
                        </div>

                        <!-- Campo Idade -->
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
                                required
                                min="1"
                                max="120"
                            />
                            <p
                                v-if="form.errors.data_nascimento"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.data_nascimento }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Dia que o estudante nasceu
                            </p>
                        </div>
                    </div>

                    <!-- Terceira linha: Telefone (campo único) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Telefone -->
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
                            <p class="text-xs text-gray-500 mt-1">
                                Telefone para contato com o estudante
                            </p>
                        </div>

                        <!-- Espaço vazio para manter alinhamento -->
                        <div class="form-group">
                            <!-- Placeholder para layout equilibrado -->
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
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>
                                Salvar Alterações
                            </span>
                            <div v-else class="flex items-center justify-center">
                                <div class="spinner-pastel mr-2"></div>
                                Salvando...
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
                            Restaurar
                        </button>

                        <button
                            type="button"
                            class="btn-pastel-tertiary flex-1 sm:flex-none sm:px-8 py-4"
                            @click="goBack"
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
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"
                                />
                            </svg>
                            Voltar
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

                <!-- Informações sobre a edição -->
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
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                            />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">
                                Sobre a Edição de Estudantes
                            </h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Modifique apenas os campos que precisam ser atualizados</li>
                                <li>• O CPF será validado automaticamente se alterado</li>
                                <li>• A matrícula deve ser única no sistema</li>
                                <li>• Todas as alterações são salvas instantaneamente</li>
                                <li>• As informações são confidenciais e protegidas</li>
                                <li>• Use "Restaurar" para desfazer mudanças não salvas</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Links úteis -->
                <div class="text-center mt-8 space-y-2">
                    <p class="text-gray-600">
                        Quer matricular este estudante em uma nova disciplina?
                        <a
                            :href="`/enrollments/create?student_id=${estudante.id}`"
                            class="text-pastel-purple font-semibold hover:underline"
                        >
                            Nova matrícula
                        </a>
                    </p>
                    <p class="text-gray-600">
                        Ver histórico acadêmico do estudante?
                        <a
                            :href="`/students/${estudante.id}`"
                            class="text-pastel-blue font-semibold hover:underline"
                        >
                            Visualizar perfil
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { computed, ref, onMounted } from "vue";
import { Head } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

export default {
    components: {
        Head,
    },

    props: {
        estudante: {
            type: Object,
            required: true,
        },
    },

    setup(props) {
        const form = useForm({
            nome: props.estudante.nome || "",
            cpf: props.estudante.cpf || "",
            matricula: props.estudante.matricula || "",
            data_nascimento: props.estudante.data_nascimento || "",
            telefone: props.estudante.telefone || "",
        });

        // Armazenar dados originais para restauração
        const originalData = ref({
            nome: props.estudante.nome || "",
            cpf: props.estudante.cpf || "",
            matricula: props.estudante.matricula || "",
            data_nascimento: props.estudante.data_nascimento || "",
            telefone: props.estudante.telefone || "",
        });

        // Validação do formulário
        const isFormValid = computed(() => {
            return (
                form.nome &&
                form.cpf &&
                form.matricula &&
                form.data_nascimento &&
                form.telefone
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
            
            form.put(route('students.update', props.estudante.id), {
                onSuccess: () => {
                    // Atualizar os dados originais após sucesso
                    originalData.value = { ...form.data() };
                },
                onError: (errors) => {
                    // Tratar erros se necessário
                },
            });
        };

        const resetForm = () => {
            // Restaurar para os dados originais
            Object.keys(originalData.value).forEach(key => {
                form[key] = originalData.value[key];
            });
            form.clearErrors();
        };

        const goBack = () => {
            window.history.back();
        };

        // Formatar dados existentes na montagem do componente
        onMounted(() => {
            if (form.cpf) formatCPF();
            if (form.telefone) formatTelefone();
        });

        return {
            form,
            estudante: props.estudante,
            isFormValid,
            formatCPF,
            formatTelefone,
            submit,
            resetForm,
            goBack,
        };
    },
};
</script>