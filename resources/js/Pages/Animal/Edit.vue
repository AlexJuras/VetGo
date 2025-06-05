<template>
    <Head :title="`Editar Animal | ${$page.component}`" />

    <!-- Background com gradiente pastel -->
    <div
        class="min-h-screen bg-gradient-pastel-1 flex items-center justify-center p-4"
    >
        <!-- Container principal - aumentado para lg -->
        <div class="w-full max-w-lg">
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
                    Editar Animal
                </p>
            </div>

            <!-- Card do formulário -->
            <div class="card-pastel">
                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Campo Tutor -->
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
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                            </svg>
                            Tutor Responsável *
                        </label>
                        <div class="relative">
                            <select
                                v-model="form.tutor_id"
                                class="input-pastel pr-10 appearance-none"
                                required
                            >
                                <option value="" disabled>Selecione o tutor responsável</option>
                                <option
                                    v-for="tutor in tutors"
                                    :key="tutor.id"
                                    :value="tutor.id"
                                >
                                    {{ tutor.nome }}
                                </option>
                            </select>
                            <svg
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />
                            </svg>
                        </div>
                        <p
                            v-if="form.errors.tutor_id"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.tutor_id }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            Selecione o tutor responsável pelo animal
                        </p>
                    </div>

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
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                />
                            </svg>
                            Nome do Animal *
                        </label>
                        <input
                            type="text"
                            v-model="form.nome"
                            class="input-pastel"
                            placeholder="Digite o nome do animal"
                            required
                        />
                        <p
                            v-if="form.errors.nome"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.nome }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            Princesa, Bambi, Nina, Chaline...
                        </p>
                    </div>

                    <!-- Campo Espécie -->
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
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"
                                />
                            </svg>
                            Espécie *
                        </label>
                        <input
                            type="text"
                            v-model="form.especie"
                            class="input-pastel"
                            placeholder="Digite a espécie do animal"
                            required
                        />
                        <p
                            v-if="form.errors.especie"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.especie }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            Cachorro, Gato, Iguana, Pavão...
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
                            :max="today"
                        />
                        <p
                            v-if="form.errors.data_nascimento"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.data_nascimento }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            Se não souber, dê um palpite
                        </p>
                    </div>

                    <!-- Campo Detalhes do Animal -->
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
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                />
                            </svg>
                            Detalhes do Animal
                        </label>
                        <textarea
                            v-model="form.detalhes"
                            class="input-pastel min-h-[120px] resize-none"
                            placeholder="Nos dê detalhes sobre ele(a). Raça, histórico médico, comportamentos especiais..."
                            rows="5"
                        ></textarea>
                        <p
                            v-if="form.errors.detalhes"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.detalhes }}
                        </p>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-xs text-gray-500">
                                Ele é dócil? Tem alguma alergia? Já passou por cirurgias?
                            </p>
                            <span 
                                class="text-xs text-gray-400"
                                :class="{ 'text-amber-500': form.detalhes?.length > 450, 'text-red-500': form.detalhes?.length >= 500 }"
                            >
                                {{ form.detalhes?.length || 0 }}/500
                            </span>
                        </div>
                    </div>

                    <!-- Botão de submissão -->
                    <button
                        type="submit"
                        :disabled="!isFormValid || form.processing"
                        class="btn-pastel-primary w-full text-lg py-4 relative"
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

                <!-- Informações sobre a edição de animais -->
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
                                Sobre a Edição de Animais
                            </h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    • Mantenha as informações sempre atualizadas
                                </li>
                                <li>
                                    • Verifique se o tutor responsável está correto
                                </li>
                                <li>
                                    • Adicione novos detalhes médicos quando necessário
                                </li>
                                <li>
                                    • Atualize o histórico comportamental do animal
                                </li>
                                <li>• Mantenha os dados de contato em dia</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Link para voltar -->
                <div class="text-center mt-8">
                    <p class="text-gray-600">
                        Quer ver todos os animais cadastrados?
                        <a
                            href="/animals"
                            class="text-pastel-purple font-semibold hover:underline"
                        >
                            Ver lista de animais
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

    props: {
        animal: {
            type: Object,
            required: true
        },
        tutors: {
            type: Array,
            default: () => []
        }
    },

    setup(props) {
        const form = useForm({
            nome: props.animal.nome || "",
            especie: props.animal.especie || "",
            detalhes: props.animal.detalhes || "",
            data_nascimento: props.animal.data_nascimento || "",
            tutor_id: props.animal.tutor_id || "",
        });

        // Data atual para limite máximo
        const today = computed(() => {
            return new Date().toISOString().split('T')[0];
        });

        // Validação do formulário
        const isFormValid = computed(() => {
            return (
                form.tutor_id &&
                form.nome.length > 0 &&
                form.especie.length > 0
            );
        });

        // Submeter formulário
        const submit = () => {
            if (!isFormValid.value) return;
            
            form.put(route('animals.update', props.animal.id), {
                onSuccess: () => {
                    // Lógica de sucesso se necessário
                },
                onError: (errors) => {
                    // Tratar erros se necessário
                },
            });
        };

        return {
            form,
            today,
            isFormValid,
            submit,
        };
    },
};
</script>