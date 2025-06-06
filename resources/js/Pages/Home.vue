<template>
    <Head :title="`Dashboard | ${$page.component}`" />

    <!-- Background com gradiente pastel -->
    <div class="min-h-screen bg-gradient-pastel-1 p-4">
        <!-- Container principal -->
        <div class="w-full max-w-7xl mx-auto">
            <!-- Header com título -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full backdrop-blur-sm mb-4">
                    <svg class="w-8 h-8 text-pastel-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">VetGo</h1>
                <p class="text-gray-600 text-lg">Dashboard - Clínica Veterinária Universitária</p>
                <p class="text-sm text-gray-500 mt-1">{{ dataAtual }}</p>
            </div>

            <!-- Estatísticas principais -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total de Animais -->
                <div class="card-pastel p-6 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-pastel-blue/20 rounded-full mb-4">
                        <svg class="w-6 h-6 text-pastel-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-pastel-blue mb-2">{{ totalAnimais }}</div>
                    <div class="text-sm text-gray-600">Animais Cadastrados</div>
                    <div class="text-xs text-gray-500 mt-1">+{{ novosAnimaisSemana }} esta semana</div>
                </div>

                <!-- Total de Tutores -->
                <div class="card-pastel p-6 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-pastel-pink/20 rounded-full mb-4">
                        <svg class="w-6 h-6 text-pastel-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-pastel-pink mb-2">{{ totalTutores }}</div>
                    <div class="text-sm text-gray-600">Tutores Cadastrados</div>
                    <div class="text-xs text-gray-500 mt-1">+{{ novosTutoresSemana }} esta semana</div>
                </div>

                <!-- Total de Estudantes -->
                <div class="card-pastel p-6 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-pastel-green/20 rounded-full mb-4">
                        <svg class="w-6 h-6 text-pastel-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-pastel-green mb-2">{{ totalEstudantes }}</div>
                    <div class="text-sm text-gray-600">Estudantes/Veterinários</div>
                    <div class="text-xs text-gray-500 mt-1">{{ estudantesAtivos }} ativos</div>
                </div>

                <!-- Consultas Hoje -->
                <div class="card-pastel p-6 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-pastel-orange/20 rounded-full mb-4">
                        <svg class="w-6 h-6 text-pastel-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-pastel-orange mb-2">{{ consultasHoje }}</div>
                    <div class="text-sm text-gray-600">Consultas para Hoje</div>
                    <div class="text-xs text-gray-500 mt-1">{{ consultasPendentesHoje }} pendentes</div>
                </div>
            </div>

            <!-- Segunda linha de estatísticas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Estudantes Disponíveis Hoje -->
                <div class="card-pastel p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-pastel-purple/20 rounded-full flex items-center justify-center mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-pastel-purple">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-pastel-purple">{{ estudantesDisponiveisHoje }}</div>
                                <div class="text-sm text-gray-600">Disponíveis Hoje</div>
                            </div>
                        </div>
                        <!-- <div class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded-full">
                            Online
                        </div> -->
                    </div>
                </div>

                <!-- Receita do Mês -->
                <div class="card-pastel p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-pastel-yellow/20 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-pastel-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-pastel-yellow">R$ {{ formatarValor(receitaMes) }}</div>
                            <div class="text-sm text-gray-600">Receita do Mês</div>
                        </div>
                    </div>
                    <div class="text-xs text-gray-500">
                        <span class="text-green-600">+15%</span> vs mês anterior
                    </div>
                </div>

                <!-- Próximas Consultas -->
                <div class="card-pastel p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-pastel-indigo/20 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-pastel-indigo" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-pastel-indigo">{{ consultasProximas }}</div>
                            <div class="text-sm text-gray-600">Próximas 2 Horas</div>
                        </div>
                    </div>
                    <div class="text-xs text-gray-500">
                        Próxima às {{ proximaConsultaHorario }}
                    </div>
                </div>
            </div>

            <!-- Gráficos e informações detalhadas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Consultas da Semana -->
                <div class="card-pastel p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-800">Consultas da Semana</h3>
                        <svg class="w-5 h-5 text-pastel-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2-2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div class="space-y-3">
                        <div v-for="(dia, index) in consultasSemana" :key="index" class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">{{ dia.nome }}</span>
                            <div class="flex items-center">
                                <div class="w-24 bg-gray-200 rounded-full h-2 mr-3">
                                    <div 
                                        class="h-2 rounded-full"
                                        :class="dia.cor"
                                        :style="{ width: `${(dia.consultas / Math.max(...consultasSemana.map(d => d.consultas))) * 100}%` }"
                                    ></div>
                                </div>
                                <span class="text-sm font-medium text-gray-800 min-w-[20px]">{{ dia.consultas }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Atividades Recentes -->
                <div class="card-pastel p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-800">Atividades Recentes</h3>
                        <svg class="w-5 h-5 text-pastel-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="space-y-4">
                        <div v-for="atividade in atividadesRecentes" :key="atividade.id" class="flex items-start space-x-3">
                            <div 
                                class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0"
                                :class="atividade.corFundo"
                            >
                                <svg class="w-4 h-4" :class="atividade.corIcone" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="atividade.icone"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800">{{ atividade.descricao }}</p>
                                <p class="text-xs text-gray-500">{{ atividade.tempo }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ações rápidas -->
            <div class="card-pastel p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Ações Rápidas</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="/consultas/create" class="btn-pastel-primary text-center py-4 rounded-lg">
                        <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span class="text-sm font-medium">Nova Consulta</span>
                    </a>
                    
                    <a href="/animals/create" class="btn-pastel-secondary text-center py-4 rounded-lg">
                        <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <span class="text-sm font-medium">Cadastrar Animal</span>
                    </a>
                    
                    <a href="/tutors/create" class="btn-pastel-secondary text-center py-4 rounded-lg">
                        <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span class="text-sm font-medium">Cadastrar Tutor</span>
                    </a>
                    
                    <a href="/relatorios" class="btn-pastel-secondary text-center py-4 rounded-lg">
                        <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <span class="text-sm font-medium">Relatórios</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { computed, ref, reactive } from "vue";
import { Head, router } from "@inertiajs/vue3";

export default {
    components: {
        Head,
    },

    props: {
        estatisticas: {
            type: Object,
            default: () => ({}),
        },
        totalAnimais: {
            type: Number,
            default: 0,
        },
        totalTutores: {
            type: Number,
            default: 0,
        },
        totalEstudantes: {
            type: Number,
            default: 0,
        },
        consultasHoje: {
            type: Number,
            default: 0,
        },
        receitaMes: {
            type: Number,
            default: 0,
        },
        consultasProximas: {
            type: Number,
            default: 0,
        },
        novosAnimaisSemana: {
            type: Number,
            default: 0,
        },
        novosTutoresSemana: {
            type: Number,
            default: 0,
        },
    },

    setup(props) {
        const totalAnimais = ref(props.totalAnimais);
        const totalTutores = ref(props.totalTutores);
        const totalEstudantes = ref(props.totalEstudantes);
        const consultasHoje = ref(props.consultasHoje);
        const estudantesDisponiveisHoje = ref(props.totalEstudantes);
        const receitaMes = ref(props.receitaMes);
        const consultasProximas = ref(props.consultasProximas);
        
        // Dados calculados
        const novosAnimaisSemana = ref(props.novosAnimaisSemana);
        const novosTutoresSemana = ref(props.novosTutoresSemana);
        const estudantesAtivos = ref(props.totalEstudantes);
        const consultasPendentesHoje = ref(4);
        const proximaConsultaHorario = ref("14:30");

        // Data atual formatada
        const dataAtual = computed(() => {
            const agora = new Date();
            return agora.toLocaleDateString('pt-BR', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        });

        // Dados das consultas da semana
        const consultasSemana = ref([
            { nome: 'Segunda', consultas: 8, cor: 'bg-pastel-blue' },
            { nome: 'Terça', consultas: 12, cor: 'bg-pastel-green' },
            { nome: 'Quarta', consultas: 15, cor: 'bg-pastel-purple' },
            { nome: 'Quinta', consultas: 10, cor: 'bg-pastel-orange' },
            { nome: 'Sexta', consultas: 18, cor: 'bg-pastel-pink' },
            { nome: 'Sábado', consultas: 6, cor: 'bg-pastel-yellow' },
            { nome: 'Domingo', consultas: 3, cor: 'bg-pastel-indigo' }
        ]);

        // Atividades recentes
        const atividadesRecentes = ref([
            {
                id: 1,
                descricao: 'Nova consulta agendada para Rex com Dr. Silva',
                tempo: 'há 5 minutos',
                icone: 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                corFundo: 'bg-blue-100',
                corIcone: 'text-blue-600'
            },
            {
                id: 2,
                descricao: 'Animal "Mia" cadastrado por Ana Costa',
                tempo: 'há 12 minutos',
                icone: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                corFundo: 'bg-pink-100',
                corIcone: 'text-pink-600'
            },
            {
                id: 3,
                descricao: 'Consulta de Toby foi concluída',
                tempo: 'há 25 minutos',
                icone: 'M5 13l4 4L19 7',
                corFundo: 'bg-green-100',
                corIcone: 'text-green-600'
            },
            {
                id: 4,
                descricao: 'Novo tutor cadastrado: João Santos',
                tempo: 'há 1 hora',
                icone: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                corFundo: 'bg-purple-100',
                corIcone: 'text-purple-600'
            }
        ]);

        // Métodos
        const formatarValor = (valor) => {
            return parseFloat(valor).toFixed(2).replace('.', ',');
        };

        return {
            totalAnimais,
            totalTutores,
            totalEstudantes,
            consultasHoje,
            estudantesDisponiveisHoje,
            receitaMes,
            consultasProximas,
            novosAnimaisSemana,
            novosTutoresSemana,
            estudantesAtivos,
            consultasPendentesHoje,
            proximaConsultaHorario,
            dataAtual,
            consultasSemana,
            atividadesRecentes,
            formatarValor
        };
    },
};
</script>

<style scoped>
/* Gradientes pastéis personalizados */
.bg-gradient-pastel-1 {
    background: linear-gradient(135deg, #fef7ff 0%, #f0f9ff 25%, #f0fdf4 50%, #fefce8 75%, #fdf2f8 100%);
}

/* Cores pastéis personalizadas */
.text-pastel-purple { color: #a855f7; }
.text-pastel-blue { color: #3b82f6; }
.text-pastel-green { color: #10b981; }
.text-pastel-orange { color: #f59e0b; }
.text-pastel-pink { color: #ec4899; }
.text-pastel-yellow { color: #eab308; }
.text-pastel-indigo { color: #6366f1; }

/* Backgrounds pastéis */
.bg-pastel-blue { background-color: #3b82f6; }
.bg-pastel-green { background-color: #10b981; }
.bg-pastel-purple { background-color: #a855f7; }
.bg-pastel-orange { background-color: #f59e0b; }
.bg-pastel-pink { background-color: #ec4899; }
.bg-pastel-yellow { background-color: #eab308; }
.bg-pastel-indigo { background-color: #6366f1; }

/* Cards pastéis */
.card-pastel {
    background: rgba(255, 255, 255, 0.6);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 24px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* Botões pastéis */
.btn-pastel-primary {
    background: linear-gradient(135deg, #a855f7, #3b82f6);
    color: white;
    border: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 500;
    text-decoration: none;
}

.btn-pastel-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(168, 85, 247, 0.3);
}

.btn-pastel-secondary {
    background: rgba(255, 255, 255, 0.8);
    color: #6b7280;
    border: 1px solid rgba(255, 255, 255, 0.3);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 500;
    text-decoration: none;
}

.btn-pastel-secondary:hover {
    background: rgba(255, 255, 255, 0.9);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}
</style>