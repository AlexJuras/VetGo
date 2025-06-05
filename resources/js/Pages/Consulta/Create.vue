<template>
    <Head :title="`Agendar Consulta | ${$page.component}`" />

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
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">VetGo</h1>
                <p class="text-gray-600 text-lg">
                    Agendar Nova Consulta
                </p>
            </div>

            <!-- Card do formulário -->
            <div class="card-pastel">
                <form @submit.prevent="submit" class="space-y-8">
                    <!-- Primeira linha: Tutor e Animal -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Tutor -->
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
                                Tutor
                            </label>
                            <select
                                v-model="form.tutor_id"
                                class="input-pastel"
                                required
                            >
                                <option value="">Selecione o tutor</option>
                                <option value="1">João Silva</option>
                                <option value="2">Maria Santos</option>
                                <option value="3">Pedro Oliveira</option>
                                <option value="4">Ana Costa</option>
                            </select>
                            <p
                                v-if="form.errors.tutor_id"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.tutor_id }}
                            </p>
                        </div>

                        <!-- Campo Animal -->
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
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                    />
                                </svg>
                                Animal
                            </label>
                            <select
                                v-model="form.animal_id"
                                class="input-pastel"
                                required
                                :disabled="!form.tutor_id"
                            >
                                <option value="">Selecione o animal</option>
                                <option value="1">Princesa (Cachorro)</option>
                                <option value="2">Bambi (Gato)</option>
                                <option value="3">Nina (Cachorro)</option>
                                <option value="4">Chaline (Gato)</option>
                            </select>
                            <p
                                v-if="form.errors.animal_id"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.animal_id }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Primeiro selecione o tutor
                            </p>
                        </div>
                    </div>

                    <!-- Segunda linha: Veterinário -->
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
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"
                                />
                            </svg>
                            Veterinário
                        </label>
                        <select
                            v-model="form.veterinario_id"
                            class="input-pastel"
                            required
                        >
                            <option value="">Selecione o veterinário</option>
                            <option value="1">Dr. Carlos Mendes - Clínico Geral</option>
                            <option value="2">Dra. Fernanda Lima - Cardiologia</option>
                            <option value="3">Dr. Roberto Alves - Cirurgia</option>
                            <option value="4">Dra. Luciana Costa - Dermatologia</option>
                        </select>
                        <p
                            v-if="form.errors.veterinario_id"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.veterinario_id }}
                        </p>
                    </div>

                    <!-- Terceira linha: Data e Horário -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Data -->
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
                                Data da Consulta
                            </label>
                            <input
                                type="date"
                                v-model="form.data_consulta"
                                class="input-pastel"
                                :min="today"
                                required
                            />
                            <p
                                v-if="form.errors.data_consulta"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.data_consulta }}
                            </p>
                        </div>

                        <!-- Campo Horário -->
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
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                                Horário
                            </label>
                            <select
                                v-model="form.horario"
                                class="input-pastel"
                                required
                            >
                                <option value="">Selecione o horário</option>
                                <option value="08:00">08:00</option>
                                <option value="08:30">08:30</option>
                                <option value="09:00">09:00</option>
                                <option value="09:30">09:30</option>
                                <option value="10:00">10:00</option>
                                <option value="10:30">10:30</option>
                                <option value="11:00">11:00</option>
                                <option value="11:30">11:30</option>
                                <option value="14:00">14:00</option>
                                <option value="14:30">14:30</option>
                                <option value="15:00">15:00</option>
                                <option value="15:30">15:30</option>
                                <option value="16:00">16:00</option>
                                <option value="16:30">16:30</option>
                                <option value="17:00">17:00</option>
                                <option value="17:30">17:30</option>
                            </select>
                            <p
                                v-if="form.errors.horario"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.horario }}
                            </p>
                        </div>
                    </div>

                    <!-- Quarta linha: Forma de Pagamento e Valor -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Forma de Pagamento -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-teal"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                                    />
                                </svg>
                                Forma de Pagamento
                            </label>
                            <select
                                v-model="form.forma_pagamento"
                                class="input-pastel"
                                required
                            >
                                <option value="">Selecione a forma de pagamento</option>
                                <option value="dinheiro">Dinheiro</option>
                                <option value="cartao_credito">Cartão de Crédito</option>
                                <option value="cartao_debito">Cartão de Débito</option>
                                <option value="pix">PIX</option>
                                <option value="transferencia">Transferência Bancária</option>
                            </select>
                            <p
                                v-if="form.errors.forma_pagamento"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.forma_pagamento }}
                            </p>
                        </div>

                        <!-- Campo Valor -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-yellow"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                                Valor da Consulta
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">R$</span>
                                <input
                                    type="number"
                                    v-model="form.valor"
                                    class="input-pastel pl-10"
                                    placeholder="0,00"
                                    min="0"
                                    step="0.01"
                                    required
                                />
                            </div>
                            <p
                                v-if="form.errors.valor"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.valor }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Valor em reais (R$)
                            </p>
                        </div>
                    </div>

                    <!-- Campo Observações -->
                    <div class="form-group">
                        <label
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            <svg
                                class="inline w-4 h-4 mr-2 text-pastel-indigo"
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
                            Observações (Opcional)
                        </label>
                        <textarea
                            v-model="form.observacoes"
                            class="input-pastel min-h-[100px] resize-none"
                            placeholder="Informações adicionais sobre a consulta, sintomas observados, etc..."
                            rows="4"
                        ></textarea>
                        <p
                            v-if="form.errors.observacoes"
                            class="text-xs text-red-500 mt-1"
                        >
                            {{ form.errors.observacoes }}
                        </p>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-xs text-gray-500">
                                Descreva sintomas, comportamentos ou informações relevantes
                            </p>
                            <span 
                                class="text-xs text-gray-400"
                                :class="{ 'text-amber-500': form.observacoes.length > 450, 'text-red-500': form.observacoes.length >= 500 }"
                            >
                                {{ form.observacoes.length }}/500
                            </span>
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
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                </svg>
                                Agendar Consulta
                            </span>
                            <div v-else class="flex items-center justify-center">
                                <div class="spinner-pastel mr-2"></div>
                                Agendando...
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

                <!-- Informações sobre o agendamento -->
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
                                Sobre o Agendamento de Consultas
                            </h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Chegue 15 minutos antes do horário agendado</li>
                                <li>• Traga a carteira de vacinação do animal</li>
                                <li>• Cancele com antecedência mínima de 2 horas</li>
                                <li>• Consultas de emergência têm valores diferenciados</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Links úteis -->
                <div class="text-center mt-8 space-y-2">
                    <p class="text-gray-600">
                        Precisa cadastrar um novo animal?
                        <a
                            href="/animals/create"
                            class="text-pastel-purple font-semibold hover:underline"
                        >
                            Cadastrar animal
                        </a>
                    </p>
                    <p class="text-gray-600">
                        Quer ver os agendamentos existentes?
                        <a
                            href="/consultas"
                            class="text-pastel-blue font-semibold hover:underline"
                        >
                            Ver consultas agendadas
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
            tutor_id: "",
            animal_id: "",
            veterinario_id: "",
            data_consulta: "",
            horario: "",
            forma_pagamento: "",
            valor: "",
            observacoes: "",
        });

        // Data atual para limite mínimo
        const today = computed(() => {
            return new Date().toISOString().split('T')[0];
        });

        // Validação do formulário
        const isFormValid = computed(() => {
            return (
                form.tutor_id &&
                form.animal_id &&
                form.veterinario_id &&
                form.data_consulta &&
                form.horario &&
                form.forma_pagamento &&
                form.valor
            );
        });

        const submit = () => {
            if (!isFormValid.value) return;
            
            form.post(route('consultas.store'), {
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
            today,
            isFormValid,
            submit,
            resetForm,
        };
    },
};
</script>