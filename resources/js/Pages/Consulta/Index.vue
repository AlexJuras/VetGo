<template>
    <Head :title="`Consultas Agendadas | ${$page.component}`" />

    <!-- Background com gradiente pastel -->
    <div class="min-h-screen bg-gradient-pastel-1 p-4">
        <!-- Container principal -->
        <div class="w-full max-w-7xl mx-auto">
            <!-- Header com título e estatísticas -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full backdrop-blur-sm mb-4">
                    <svg class="w-8 h-8 text-pastel-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">VetGo</h1>
                <p class="text-gray-600 text-lg">Consultas Agendadas</p>
                
                <!-- Estatísticas rápidas -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6 max-w-2xl mx-auto">
                    <div class="bg-white/30 backdrop-blur-sm rounded-lg p-3">
                        <div class="text-2xl font-bold text-pastel-blue">{{ totalConsultas }}</div>
                        <div class="text-xs text-gray-600">Total</div>
                    </div>
                    <div class="bg-white/30 backdrop-blur-sm rounded-lg p-3">
                        <div class="text-2xl font-bold text-pastel-green">{{ consultasHoje }}</div>
                        <div class="text-xs text-gray-600">Hoje</div>
                    </div>
                    <div class="bg-white/30 backdrop-blur-sm rounded-lg p-3">
                        <div class="text-2xl font-bold text-pastel-orange">{{ consultasPendentes }}</div>
                        <div class="text-xs text-gray-600">Pendentes</div>
                    </div>
                    <div class="bg-white/30 backdrop-blur-sm rounded-lg p-3">
                        <div class="text-2xl font-bold text-pastel-pink">{{ consultasConcluidas }}</div>
                        <div class="text-xs text-gray-600">Concluídas</div>
                    </div>
                </div>
            </div>

            <!-- Barra de pesquisa e filtros -->
            <div class="card-pastel mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    <!-- Campo de pesquisa -->
                    <div class="lg:col-span-2">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input
                                v-model="filtros.busca"
                                type="text"
                                placeholder="Buscar por tutor, animal ou veterinário..."
                                class="input-pastel pl-10"
                            />
                        </div>
                    </div>

                    <!-- Filtro por data -->
                    <div>
                        <input
                            v-model="filtros.data"
                            type="date"
                            class="input-pastel"
                            placeholder="Data"
                        />
                    </div>

                    <!-- Filtro por status -->
                    <div>
                        <select v-model="filtros.status" class="input-pastel">
                            <option value="">Todos os Status</option>
                            <option value="agendada">Agendada</option>
                            <option value="em_andamento">Em Andamento</option>
                            <option value="concluida">Concluída</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                    </div>

                    <!-- Botão limpar filtros -->
                    <div>
                        <button
                            @click="limparFiltros"
                            class="btn-pastel-secondary w-full h-full"
                        >
                            <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Limpar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Botão para nova consulta -->
            <div class="text-center mb-6">
                <a href="/consultas/create" class="btn-pastel-primary inline-flex items-center px-6 py-3">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Agendar Nova Consulta
                </a>
            </div>

            <!-- Grid de consultas -->
            <div v-if="consultasFiltradas.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div
                    v-for="consulta in consultasFiltradas"
                    :key="consulta.id"
                    class="card-pastel relative group hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1"
                >
                    <!-- Badge de status -->
                    <div class="absolute top-4 right-4">
                        <span
                            class="px-2 py-1 text-xs font-semibold rounded-full"
                            :class="getStatusClass(consulta.status)"
                        >
                            {{ getStatusText(consulta.status) }}
                        </span>
                    </div>

                    <!-- Conteúdo do card -->
                    <div class="pt-2">
                        <!-- Data e Horário -->
                        <div class="flex items-center mb-3">
                            <svg class="w-4 h-4 text-pastel-purple mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-sm font-semibold text-gray-700">
                                {{ formatarData(consulta.data_consulta) }}
                            </span>
                        </div>

                        <div class="flex items-center mb-4">
                            <svg class="w-4 h-4 text-pastel-orange mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-sm text-gray-600">{{ consulta.horario }}</span>
                        </div>

                        <!-- Informações do Tutor -->
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-pastel-pink mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-800">{{ consulta.tutor }}</span>
                        </div>

                        <!-- Informações do Animal -->
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 text-pastel-blue mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            <span class="text-sm text-gray-700">{{ consulta.animal }}</span>
                        </div>

                        <!-- Veterinário -->
                        <div class="flex items-center mb-3">
                            <svg class="w-4 h-4 text-pastel-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                            <span class="text-xs text-gray-600">{{ consulta.veterinario }}</span>
                        </div>

                        <!-- Valor -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-pastel-yellow mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm font-semibold text-gray-800">
                                    R$ {{ formatarValor(consulta.valor) }}
                                </span>
                            </div>
                            <span class="text-xs px-2 py-1 bg-gray-100 rounded text-gray-600">
                                {{ consulta.forma_pagamento }}
                            </span>
                        </div>

                        <!-- Observações (se houver) -->
                        <div v-if="consulta.observacoes" class="mb-4">
                            <div class="flex items-start">
                                <svg class="w-4 h-4 text-pastel-indigo mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p class="text-xs text-gray-600">
                                    {{ consulta.observacoes.substring(0, 100) }}{{ consulta.observacoes.length > 100 ? '...' : '' }}
                                </p>
                            </div>
                        </div>

                        <!-- Ações do card -->
                        <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                            <button
                                @click="visualizarConsulta(consulta)"
                                class="text-pastel-blue hover:text-blue-600 text-sm font-medium transition-colors"
                            >
                                Ver detalhes
                            </button>
                            
                            <div class="flex space-x-2">
                                <button
                                    v-if="consulta.status === 'agendada'"
                                    @click="editarConsulta(consulta.id)"
                                    class="text-pastel-purple hover:text-purple-600 transition-colors"
                                    title="Editar consulta"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                
                                <button
                                    v-if="consulta.status === 'agendada'"
                                    @click="cancelarConsulta(consulta.id)"
                                    class="text-red-400 hover:text-red-600 transition-colors"
                                    title="Cancelar consulta"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estado vazio -->
            <div v-else class="text-center py-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-700 mb-2">Nenhuma consulta encontrada</h3>
                <p class="text-gray-500 mb-4">
                    {{ filtros.busca || filtros.data || filtros.status 
                        ? 'Tente ajustar os filtros de pesquisa.' 
                        : 'Não há consultas agendadas no momento.' }}
                </p>
                <a href="/consultas/create" class="btn-pastel-primary inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Agendar Primeira Consulta
                </a>
            </div>
        </div>
    </div>

    <!-- Modal de detalhes (se necessário) -->
    <div
        v-if="consultaSelecionada"
        class="fixed inset-0 bg-white/10 backdrop-blur-sm flex items-center justify-center p-4 z-50"
        @click="fecharModal"
    >
        <div
            class="card-pastel max-w-lg w-full max-h-[90vh] overflow-y-auto"
            @click.stop
        >
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-800">Detalhes da Consulta</h3>
                <button
                    @click="fecharModal"
                    class="text-gray-400 hover:text-gray-600"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <!-- Conteúdo detalhado da consulta -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Data e Horário</label>
                    <p class="text-sm text-gray-600">
                        {{ formatarData(consultaSelecionada.data_consulta) }} às {{ consultaSelecionada.horario }}
                    </p>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tutor</label>
                    <p class="text-sm text-gray-600">{{ consultaSelecionada.tutor }}</p>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Animal</label>
                    <p class="text-sm text-gray-600">{{ consultaSelecionada.animal }}</p>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Veterinário</label>
                    <p class="text-sm text-gray-600">{{ consultaSelecionada.veterinario }}</p>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Valor</label>
                    <p class="text-sm text-gray-600">
                        R$ {{ formatarValor(consultaSelecionada.valor) }} - {{ consultaSelecionada.forma_pagamento }}
                    </p>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                    <span
                        class="inline-block px-2 py-1 text-xs font-semibold rounded-full"
                        :class="getStatusClass(consultaSelecionada.status)"
                    >
                        {{ getStatusText(consultaSelecionada.status) }}
                    </span>
                </div>
                
                <div v-if="consultaSelecionada.observacoes">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Observações</label>
                    <p class="text-sm text-gray-600">{{ consultaSelecionada.observacoes }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { computed, ref, reactive } from "vue";
import { Head } from "@inertiajs/vue3";

export default {
    components: {
        Head,
    },

    setup() {
        // Dados mock das consultas
        const consultas = ref([
            {
                id: 1,
                tutor: "João Silva",
                animal: "Princesa (Cachorro)",
                veterinario: "Dr. Carlos Mendes - Clínico Geral",
                data_consulta: "2025-06-05",
                horario: "09:00",
                forma_pagamento: "PIX",
                valor: 120.00,
                status: "agendada",
                observacoes: "Animal apresentando sintomas de apatia e perda de apetite há 3 dias."
            },
            {
                id: 2,
                tutor: "Maria Santos",
                animal: "Bambi (Gato)",
                veterinario: "Dra. Fernanda Lima - Cardiologia",
                data_consulta: "2025-06-03",
                horario: "14:30",
                forma_pagamento: "Cartão de Crédito",
                valor: 180.00,
                status: "em_andamento",
                observacoes: ""
            },
            {
                id: 3,
                tutor: "Pedro Oliveira",
                animal: "Nina (Cachorro)",
                veterinario: "Dr. Roberto Alves - Cirurgia",
                data_consulta: "2025-06-02",
                horario: "16:00",
                forma_pagamento: "Dinheiro",
                valor: 250.00,
                status: "concluida",
                observacoes: "Cirurgia de castração realizada com sucesso. Animal se recuperando bem."
            },
            {
                id: 4,
                tutor: "Ana Costa",
                animal: "Chaline (Gato)",
                veterinario: "Dra. Luciana Costa - Dermatologia",
                data_consulta: "2025-06-06",
                horario: "10:30",
                forma_pagamento: "PIX",
                valor: 150.00,
                status: "agendada",
                observacoes: "Lesões na pele, possível alergia alimentar."
            },
            {
                id: 5,
                tutor: "Carlos Lima",
                animal: "Thor (Cachorro)",
                veterinario: "Dr. Carlos Mendes - Clínico Geral",
                data_consulta: "2025-06-01",
                horario: "08:00",
                forma_pagamento: "Cartão de Débito",
                valor: 100.00,
                status: "cancelada",
                observacoes: "Consulta de rotina cancelada pelo tutor."
            }
        ]);

        // Filtros reativos
        const filtros = reactive({
            busca: "",
            data: "",
            status: ""
        });

        // Consulta selecionada para modal
        const consultaSelecionada = ref(null);

        // Consultas filtradas
        const consultasFiltradas = computed(() => {
            let resultado = consultas.value;

            // Filtro por busca
            if (filtros.busca) {
                const termo = filtros.busca.toLowerCase();
                resultado = resultado.filter(consulta =>
                    consulta.tutor.toLowerCase().includes(termo) ||
                    consulta.animal.toLowerCase().includes(termo) ||
                    consulta.veterinario.toLowerCase().includes(termo)
                );
            }

            // Filtro por data
            if (filtros.data) {
                resultado = resultado.filter(consulta =>
                    consulta.data_consulta === filtros.data
                );
            }

            // Filtro por status
            if (filtros.status) {
                resultado = resultado.filter(consulta =>
                    consulta.status === filtros.status
                );
            }

            return resultado;
        });

        // Estatísticas computadas
        const totalConsultas = computed(() => consultas.value.length);
        const consultasHoje = computed(() => {
            const hoje = new Date().toISOString().split('T')[0];
            return consultas.value.filter(c => c.data_consulta === hoje).length;
        });
        const consultasPendentes = computed(() =>
            consultas.value.filter(c => c.status === 'agendada').length
        );
        const consultasConcluidas = computed(() =>
            consultas.value.filter(c => c.status === 'concluida').length
        );

        // Métodos
        const limparFiltros = () => {
            filtros.busca = "";
            filtros.data = "";
            filtros.status = "";
        };

        const visualizarConsulta = (consulta) => {
            consultaSelecionada.value = consulta;
        };

        const fecharModal = () => {
            consultaSelecionada.value = null;
        };

        const editarConsulta = (id) => {
            // Redirecionar para página de edição
            window.location.href = `/consultas/${id}/edit`;
        };

        const cancelarConsulta = (id) => {
            if (confirm('Tem certeza que deseja cancelar esta consulta?')) {
                const index = consultas.value.findIndex(c => c.id === id);
                if (index !== -1) {
                    consultas.value[index].status = 'cancelada';
                }
            }
        };

        const getStatusClass = (status) => {
            const classes = {
                'agendada': 'bg-blue-100 text-blue-800',
                'em_andamento': 'bg-yellow-100 text-yellow-800',
                'concluida': 'bg-green-100 text-green-800',
                'cancelada': 'bg-red-100 text-red-800'
            };
            return classes[status] || 'bg-gray-100 text-gray-800';
        };

        const getStatusText = (status) => {
            const texts = {
                'agendada': 'Agendada',
                'em_andamento': 'Em Andamento',
                'concluida': 'Concluída',
                'cancelada': 'Cancelada'
            };
            return texts[status] || status;
        };

        const formatarData = (data) => {
            const date = new Date(data + 'T00:00:00');
            return date.toLocaleDateString('pt-BR', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
        };

        const formatarValor = (valor) => {
            return parseFloat(valor).toFixed(2).replace('.', ',');
        };

        return {
            consultas,
            filtros,
            consultaSelecionada,
            consultasFiltradas,
            totalConsultas,
            consultasHoje,
            consultasPendentes,
            consultasConcluidas,
            limparFiltros,
            visualizarConsulta,
            fecharModal,
            editarConsulta,
            cancelarConsulta,
            getStatusClass,
            getStatusText,
            formatarData,
            formatarValor
        };
    },
};
</script>