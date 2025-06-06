<template>
    <Head :title="`Editar Consulta | ${$page.component}`" />

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
                    Editar Consulta
                </p>
                <div class="mt-2 px-4 py-2 bg-amber-50 border border-amber-200 rounded-lg inline-block">
                    <p class="text-sm text-amber-700">
                        <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
                        </svg>
                        Consulta #{{ consulta.id }} - {{ formatarData(consulta.data_consulta) }}
                        <br/>
                        Tutor: {{ props.consulta.animal?.tutor?.nome || 'Não informado' }}
                        <br/>
                        Animal: {{ props.consulta.animal?.nome || 'Não informado' }}
                    </p>
                </div>
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
                                <option v-for="tutor in props.tutores" :key="tutor.id" :value="tutor.id">
                                    {{ tutor.nome }} ({{ tutor.cpf }})
                                </option>
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
                                <option v-for="animal in AnimaisFiltrados" :key="animal.id" :value="animal.id">
                                    {{ animal.nome }} ({{ animal.especie }})
                                </option>
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

                    <!-- Segunda linha: Veterinário e Tipo de Consulta -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo Veterinário -->
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
                                v-model="form.estudante_id"
                                class="input-pastel"
                                required
                            >
                                <option v-for="estudante in props.estudantes" :key="estudante.id" :value="estudante.id">
                                    {{ estudante.nome }} ({{ estudante.cpf }})
                                </option>
                            </select>
                            <p
                                v-if="form.errors.estudante_id"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.estudante_id }}
                            </p>
                        </div>

                        <!-- Campo Tipo de Consulta -->
                        <div class="form-group">
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                <svg
                                    class="inline w-4 h-4 mr-2 text-pastel-cyan"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                    />
                                </svg>
                                Tipo de Consulta
                            </label>
                            <select
                                v-model="form.tipo_consulta"
                                class="input-pastel"
                                required
                            >
                                <option v-for="tipo of ['Rotina', 'Emergência', 'Retorno', 'Exame', 'Outros']" :key="tipo" :value="tipo">
                                    {{ tipo }}
                                </option>
                            </select>
                            <p
                                v-if="form.errors.tipo_consulta"
                                class="text-xs text-red-500 mt-1"
                            >
                                {{ form.errors.tipo_consulta }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Selecione o tipo da consulta veterinária
                            </p>
                        </div>
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
                            <input
                                type="time"
                                step="60"
                                v-model="form.horario"
                                class="input-pastel"
                                required
                            >
                            </input>
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
                                <option v-for="forma in ['Dinheiro', 'Cartão de Crédito', 'Cartão de Débito', 'Pix', 'Transferência bancária']" :key="forma" :value="forma">
                                    {{ forma }}
                                </option>
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
                            :disabled="!validacaoFormulario || form.processing"
                            class="btn-pastel-primary flex-1 text-lg py-4 relative"
                            :class="{
                                'cursor-not-allowed':
                                    !validacaoFormulario || form.processing,
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
                            @click="cancelarEdicao"
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
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                            Cancelar
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
                            >Informações da Consulta Original</span
                        >
                    </div>
                </div>

                <!-- Informações da consulta original -->
                <div class="bg-gray-50/50 rounded-lg p-4 mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="font-semibold text-gray-700">Criada em:</span>
                            <span class="text-gray-600 ml-2">{{ formatarDataHora(consulta.created_at) }}</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Última atualização:</span>
                            <span class="text-gray-600 ml-2">{{ formatarDataHora(consulta.updated_at) }}</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">ID da consulta:</span>
                            <span class="text-gray-600 ml-2">#{{ consulta.id }}</span>
                        </div>
                    </div>
                </div>

                <!-- Links úteis -->
                <div class="text-center mt-8 space-y-2">
                    <p class="text-gray-600">
                        Quer ver o histórico da consulta?
                        <a
                            :href="`/consultas/${consulta.id}`"
                            class="text-pastel-purple font-semibold hover:underline"
                        >
                            Ver detalhes completos
                        </a>
                    </p>
                    <p class="text-gray-600">
                        Voltar para a lista de consultas?
                        <a
                            href="/consultas"
                            class="text-pastel-blue font-semibold hover:underline"
                        >
                            Ver todas as consultas
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
import { useForm, router } from "@inertiajs/vue3";

export default {
    components: {
        Head,
    },

    props: {
        consulta: {
            type: Object,
            required: true,
        },
        tutores: {
            type: Array,
            default: () => [],
        },
        animals: {
            type: Array,
            default: () => [],
        },
        estudantes: {
            type: Array,
            default: () => [],
        },
    },

    setup(props) {
        const form = useForm({
            tutor_id: props.consulta.tutor_id ? Number(props.consulta.tutor_id) : null,
            animal_id: props.consulta.animal_id ? Number(props.consulta.animal_id) : null,
            estudante_id: props.consulta.estudante_id,
            tipo_consulta: props.consulta.tipo_consulta,
            data_consulta: props.consulta.data_consulta,
            horario: props.consulta.horario,
            forma_pagamento: props.consulta.forma_pagamento,
            valor: props.consulta.valor,
            observacoes: props.consulta.observacoes || "",
        });

        // Lista os animais que o tutor selecionado possui
        const AnimaisFiltrados = computed(() => {
            if(!form.tutor_id) return [];
            return props.animals.filter(animal => animal.tutor_id === form.tutor_id);
        });

        // Data atual para limite mínimo
        const today = computed(() => {
            return new Date().toISOString().split('T')[0];
        });

        // Validação do formulário
        const validacaoFormulario = computed(() => {
            return (
                form.tutor_id &&
                form.animal_id &&
                form.estudante_id &&
                form.tipo_consulta &&
                form.data_consulta &&
                form.horario &&
                form.forma_pagamento &&
                form.valor
            );
        });

        const submit = () => {
            if (!validacaoFormulario.value) return;
            
            form.put(route('consultas.update', props.consulta.id), {
                onSuccess: () => {
                    // Redirecionar ou mostrar mensagem de sucesso
                },
                onError: (errors) => {
                    // Tratar erros se necessário
                },
            });
        };

        const cancelarEdicao = () => {
            router.visit('/consultas');
        };

        const formatarData = (data) => {
            if (!data) return '';
            const [year, month, day] = data.split('-');
            return `${day}/${month}/${year}`;
        };

        const formatarDataHora = (dataHora) => {
            return new Date(dataHora).toLocaleString('pt-BR');
        };

        return {
            form,
            today,
            validacaoFormulario,
            submit,
            cancelarEdicao,
            AnimaisFiltrados,
            formatarData,
            formatarDataHora,
            props,
        };
    },
};
</script>