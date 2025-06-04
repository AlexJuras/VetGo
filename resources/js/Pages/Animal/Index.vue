<template>
    <Head title="Lista de Animais | VetGo" />

    <!-- Background com gradiente pastel -->
    <div class="min-h-screen bg-gradient-pastel-1 flex items-center justify-center p-4">
        <!-- Container principal -->
        <div class="w-full max-w-6xl">
            <!-- Header com título e subtítulo -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full backdrop-blur-sm mb-4">
                    <svg class="w-8 h-8 text-pastel-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.168 18.477 18.582 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">VetGo</h1>
                <p class="text-gray-600 text-lg">Animais Cadastrados</p>
            </div>

            <!-- Card principal -->
            <div class="card-pastel">
                <!-- Header do card com botão de adicionar -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <svg class="w-6 h-6 text-pastel-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <h2 class="text-xl font-bold text-gray-800">
                            Lista de Animais
                            <span class="text-sm font-normal text-gray-500 ml-2">
                                ({{ animals.length }} {{ animals.length === 1 ? 'animal' : 'animais' }})
                            </span>
                        </h2>
                    </div>
                    <Link :href="route('animals.create')" class="btn-pastel-primary inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Novo Animal
                    </Link>
                </div>

                <!-- Conteúdo da lista -->
                <div v-if="animals.length > 0">
                    <!-- Versão desktop - tabela -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-gray-100">
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-pastel-pink mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                            Nome
                                        </div>
                                    </th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-pastel-blue mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                            </svg>
                                            Espécie
                                        </div>
                                    </th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-pastel-purple mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            Data de Nascimento
                                        </div>
                                    </th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-pastel-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            Idade
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(animal, index) in animals" :key="animal.id" 
                                    class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors duration-200"
                                    :class="{ 'bg-gray-25': index % 2 === 0 }">
                                    <td class="py-4 px-6">
                                        <div class="font-semibold text-gray-800">{{ animal.nome }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-pastel-blue/10 text-pastel-blue">
                                            {{ animal.especie }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-gray-600">
                                        {{ formatDate(animal.data_nascimento) }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-pastel-purple/10 text-pastel-purple">
                                            {{ calculateAge(animal.data_nascimento) }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Versão mobile - cards -->
                    <div class="md:hidden space-y-4">
                        <div v-for="animal in animals" :key="animal.id" 
                             class="bg-white/50 rounded-lg p-4 border border-gray-100 backdrop-blur-sm">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-pastel-pink mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    <h3 class="font-bold text-gray-800 text-lg">{{ animal.nome }}</h3>
                                </div>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-pastel-purple/10 text-pastel-purple">
                                    {{ calculateAge(animal.data_nascimento) }}
                                </span>
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-pastel-blue mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                    </svg>
                                    <span class="text-gray-600">Espécie:</span>
                                    <span class="ml-2 font-medium text-gray-800">{{ animal.especie }}</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-pastel-purple mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-gray-600">Nascimento:</span>
                                    <span class="ml-2 font-medium text-gray-800">{{ formatDate(animal.data_nascimento) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estado vazio -->
                <div v-else class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Nenhum animal cadastrado</h3>
                    <p class="text-gray-600 mb-6">
                        Comece cadastrando o primeiro animal para começar a usar o sistema.
                    </p>
                    <Link :href="route('animals.create')" class="btn-pastel-primary inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Cadastrar Primeiro Animal
                    </Link>
                </div>

                <!-- Divider -->
                <div v-if="animals.length > 0" class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500">Informações</span>
                    </div>
                </div>

                <!-- Informações sobre a listagem -->
                <div v-if="animals.length > 0" class="bg-blue-50/50 rounded-lg p-4">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">Sobre esta Lista</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Visualização de todos os animais cadastrados</li>
                                <li>• Idade calculada automaticamente</li>
                                <li>• Interface responsiva para mobile e desktop</li>
                                <li>• Dados sempre atualizados</li>
                            </ul>
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

<script setup>
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    animals: Array
})

// Função para formatar data
const formatDate = (dateString) => {
    if (!dateString) return 'Não informado'
    
    const date = new Date(dateString + 'T00:00:00')
    return date.toLocaleDateString('pt-BR', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    })
}

// Função para calcular idade
const calculateAge = (dateString) => {
    if (!dateString) return 'Idade não informada'
    
    const birthDate = new Date(dateString + 'T00:00:00')
    const today = new Date()
    
    let age = today.getFullYear() - birthDate.getFullYear()
    const diferencaMeses = today.getMonth() - birthDate.getMonth()
    
    if (diferencaMeses < 0 || (diferencaMeses === 0 && today.getDate() < birthDate.getDate())) {
        age--
    }
    
    if (age === 0) {
        const mesesIdade = Math.max(0, diferencaMeses)
        return mesesIdade <= 1 ? 'Menos de 1 ano' : `${mesesIdade} meses`
    }
    
    return age === 1 ? '1 ano' : `${age} anos`
}
</script>