<script setup>
import { defineOptions } from 'vue';
import { Head } from '@inertiajs/vue3';
import AuthLayout from '../Layouts/AuthLayout.vue';

defineOptions({
 layout: AuthLayout,
})

defineProps({
 faculdade: String,
});
</script>

<template>
    <Head title=" | Sobre Nós"/>
    
    <div class="min-h-screen bg-gradient-pastel-1">
        <!-- Hero Section -->
        <div class="bg-white/50 backdrop-blur-sm border-b border-gray-200">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="text-center">
                    <div class="flex justify-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-pastel-purple to-pastel-pink rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">Sobre o VetGo</h1>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Organização que flui, cuidado que se vê!
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Nossa História -->
            <div class="bg-white/60 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-8 mb-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-pastel-blue to-pastel-green rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Nossa História</h2>
                </div>
                <p class="text-gray-700 leading-relaxed text-lg">
                    Bem-vindo ao <span class="font-semibold text-pastel-purple">VetGo</span>, um projeto desenvolvido com dedicação por 
                    alunos da <span class="font-semibold">{{ faculdade }}</span> de Parnaíba. Nossa missão é modernizar 
                    e facilitar o gerenciamento das consultas da clínica veterinária acadêmica.
                </p>
                <p class="text-gray-700 leading-relaxed text-lg mt-4">
                    A ideia surgiu da necessidade de tornar mais eficiente o agendamento, acompanhamento e organização dos 
                    atendimentos realizados pelos alunos nos plantões práticos. Criamos uma plataforma digital intuitiva que 
                    integra alunos, professores e coordenadores em um único ambiente virtual.
                </p>
            </div>

            <!-- Funcionalidades -->
            <div class="bg-white/60 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-8 mb-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-pastel-pink to-pastel-purple rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">O que oferecemos</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-pastel-blue to-pastel-green rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white font-bold text-sm">1</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Agendamento Online</h3>
                                <p class="text-gray-600">Sistema intuitivo para marcar consultas de forma rápida e eficiente</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-pastel-purple to-pastel-pink rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white font-bold text-sm">2</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Lembretes Inteligentes</h3>
                                <p class="text-gray-600">Notificações automatizadas para não perder nenhum atendimento</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-pastel-green to-pastel-blue rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white font-bold text-sm">3</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Histórico Completo</h3>
                                <p class="text-gray-600">Controle detalhado de todos os atendimentos realizados</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-pastel-pink to-pastel-purple rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white font-bold text-sm">4</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Gestão de Disponibilidade</h3>
                                <p class="text-gray-600">Organização otimizada de horários de alunos e professores</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-pastel-blue to-pastel-green rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white font-bold text-sm">5</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Relatórios e Análises</h3>
                                <p class="text-gray-600">Dados precisos para melhor tomada de decisão institucional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nossa Missão -->
            <div class="bg-white/60 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-pastel-green to-pastel-blue rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Nossa Missão</h2>
                </div>
                <p class="text-gray-700 leading-relaxed text-lg mb-4">
                    O <span class="font-semibold text-pastel-purple">VetGo</span> não é apenas uma ferramenta tecnológica: 
                    é um reflexo do compromisso com a inovação e a qualidade no ensino prático da medicina veterinária.
                </p>
                <p class="text-gray-700 leading-relaxed text-lg">
                    Nosso propósito vai além do ambiente acadêmico — queremos preparar futuros profissionais com soluções reais 
                    e inspirar mudanças positivas na forma como a clínica veterinária se relaciona com seus pacientes e tutores.
                </p>
                
                <!-- Call to Action -->
                <div class="mt-8 p-6 bg-gradient-to-r from-pastel-purple/10 to-pastel-pink/10 rounded-xl border border-pastel-purple/20">
                    <div class="text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            Juntos, cuidando com tecnologia e carinho
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Venha conhecer conosco um novo tempo para a clínica veterinária da {{ faculdade }}.
                        </p>
                        <div class="flex justify-center">
                            <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-pastel-purple to-pastel-pink text-white font-semibold rounded-lg shadow-md">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                Organização que flui, cuidado que se vê!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Gradiente de fundo pastel */
.bg-gradient-pastel-1 {
    background: linear-gradient(135deg, #f3e8ff 0%, #e0e7ff 25%, #dbeafe 50%, #dcfce7 75%, #fef3cd 100%);
    min-height: 100vh;
}

/* Pastel Colors */
.text-pastel-purple { color: #a855f7; }
.text-pastel-pink { color: #ec4899; }
.text-pastel-blue { color: #3b82f6; }
.text-pastel-green { color: #10b981; }

.from-pastel-purple { background-color: #a855f7; }
.to-pastel-pink { background-color: #ec4899; }
.from-pastel-blue { background-color: #3b82f6; }
.to-pastel-green { background-color: #10b981; }
.from-pastel-pink { background-color: #ec4899; }
.from-pastel-green { background-color: #10b981; }

.border-pastel-purple\/20 { border-color: rgba(168, 85, 247, 0.2); }
</style>