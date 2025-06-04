<template>
    <Head title="Lista de Tutores | VetGo" />

    <!-- Background com gradiente pastel -->
    <div class="min-h-screen bg-gradient-pastel-1 flex items-center justify-center p-4">
        <!-- Container principal -->
        <div class="w-full max-w-6xl">
            <!-- Header com título e subtítulo -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full backdrop-blur-sm mb-4">
                    <svg class="w-8 h-8 text-pastel-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">VetGo</h1>
                <p class="text-gray-600 text-lg">Tutores Cadastrados</p>
            </div>

            <!-- Card principal -->
            <div class="card-pastel">
                <!-- Header do card com botão de adicionar -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <svg class="w-6 h-6 text-pastel-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h2 class="text-xl font-bold text-gray-800">
                            Lista de Tutores
                            <span class="text-sm font-normal text-gray-500 ml-2">
                                ({{ filteredTutores.length }} {{ filteredTutores.length === 1 ? 'tutor' : 'tutores' }})
                            </span>
                        </h2>
                    </div>
                    <Link :href="route('tutors.create')" class="btn-pastel-primary inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Novo Tutor
                    </Link>
                </div>

                <!-- Filtros -->
                <div class="bg-white/30 rounded-lg p-4 mb-6 border border-white/20">
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Busca por nome -->
                        <div class="flex-1">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Buscar por nome
                            </label>
                            <input
                                id="search"
                                v-model="searchTerm"
                                type="text"
                                placeholder="Digite o nome do tutor..."
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-pastel-blue focus:border-transparent bg-white/70 backdrop-blur-sm"
                            />
                        </div>
                        
                        <!-- Filtro por CPF -->
                        <div class="flex-1">
                            <label for="cpf-search" class="block text-sm font-medium text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                </svg>
                                Buscar por CPF
                            </label>
                            <input
                                id="cpf-search"
                                v-model="cpfSearch"
                                type="text"
                                placeholder="Digite o CPF..."
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-pastel-blue focus:border-transparent bg-white/70 backdrop-blur-sm"
                            />
                        </div>

                        <!-- Botão limpar filtros -->
                        <div class="flex items-end">
                            <button
                                @click="clearFilters"
                                class="px-4 py-2 text-gray-600 hover:text-gray-800 hover:bg-white/50 rounded-lg transition-colors duration-200 flex items-center"
                            >
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Limpar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Conteúdo da lista -->
                <div v-if="filteredTutores.length > 0">
                    <!-- Versão desktop - tabela -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-gray-100">
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-pastel-pink mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            Nome
                                        </div>
                                    </th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-pastel-blue mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                            </svg>
                                            CPF
                                        </div>
                                    </th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-pastel-purple mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                            Animais
                                        </div>
                                    </th>
                                    <th class="text-center py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center justify-center">
                                            <svg class="w-4 h-4 text-pastel-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                            </svg>
                                            Ações
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tutor, index) in filteredTutores" :key="tutor.id" 
                                    class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors duration-200"
                                    :class="{ 'bg-gray-25': index % 2 === 0 }">
                                    <td class="py-4 px-6">
                                        <div class="font-semibold text-gray-800">{{ tutor.nome }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-mono text-sm text-gray-600">{{ formatCPF(tutor.cpf) }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <button
                                            @click="showAnimalsModal(tutor)"
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-pastel-purple/10 text-pastel-purple hover:bg-pastel-purple/20 transition-colors duration-200"
                                        >
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            {{ tutor.animais.length }} {{ tutor.animais.length === 1 ? 'animal' : 'animais' }}
                                        </button>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center justify-center space-x-2">
                                            <Link :href="route('tutors.edit', tutor.id)" 
                                                  class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Editar
                                            </Link>
                                            <button
                                                @click="confirmDelete(tutor)"
                                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition-colors duration-200"
                                            >
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Excluir
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Versão mobile - cards -->
                    <div class="md:hidden space-y-4">
                        <div v-for="tutor in filteredTutores" :key="tutor.id" 
                             class="bg-white/50 rounded-lg p-4 border border-gray-100 backdrop-blur-sm">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-pastel-pink mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <h3 class="font-bold text-gray-800 text-lg">{{ tutor.nome }}</h3>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-pastel-blue mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                    </svg>
                                    <span class="text-gray-600">CPF:</span>
                                    <span class="ml-2 font-mono text-sm text-gray-800">{{ formatCPF(tutor.cpf) }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <button
                                        @click="showAnimalsModal(tutor)"
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-pastel-purple/10 text-pastel-purple"
                                    >
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        {{ tutor.animais.length }} {{ tutor.animais.length === 1 ? 'animal' : 'animais' }}
                                    </button>
                                    <div class="flex space-x-2">
                                        <Link :href="route('tutors.edit', tutor.id)" 
                                              class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </Link>
                                        <button
                                            @click="confirmDelete(tutor)"
                                            class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estado vazio -->
                <div v-else class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        {{ tutors.length === 0 ? 'Nenhum tutor cadastrado' : 'Nenhum tutor encontrado' }}
                    </h3>
                    <p class="text-gray-600 mb-6">
                        {{ tutors.length === 0 
                            ? 'Comece cadastrando o primeiro tutor para começar a usar o sistema.' 
                            : 'Tente ajustar os filtros de busca para encontrar o tutor desejado.' 
                        }}
                    </p>
                    <Link v-if="tutors.length === 0" :href="route('tutors.create')" class="btn-pastel-primary inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Cadastrar Primeiro Tutor
                    </Link>
                    <button v-else @click="clearFilters" class="btn-pastel-primary inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Limpar Filtros
                    </button>
                </div>

                <!-- Divider -->
                <div v-if="filteredTutores.length > 0" class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500">Informações</span>
                    </div>
                </div>

                <!-- Informações sobre a listagem -->
                <div v-if="filteredTutores.length > 0" class="bg-blue-50/50 rounded-lg p-4">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">Sobre esta Lista</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Visualização de todos os tutores cadastrados</li>
                                <li>• Filtros de busca por nome e CPF</li>
                                <li>• Visualização dos animais de cada tutor</li>
                                <li>• Interface responsiva para mobile e desktop</li>
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

    <!-- Modal de Animais -->
    <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50" @click="closeModal">
        <div class="bg-white rounded-lg max-w-2xl w-full max-h-[80vh] overflow-y-auto" @click.stop>
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center">
                        <svg class="w-6 h-6 text-pastel-purple mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        Animais de {{ selectedTutor?.nome }}
                    </h3>
                    <button @click="closeModal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div v-if="selectedTutor?.animais && selectedTutor.animais.length > 0" class="space-y-3">
                    <div v-for="animal in selectedTutor.animais" :key="animal.id" 
                         class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-pastel-pink mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-800">{{ animal.nome }}</h4>
                                    <p class="text-sm text-gray-600">{{ animal.especie }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm text-gray-600">{{ formatDate(animal.data_nascimento) }}</div>
                                <div class="text-xs text-gray-500">{{ calculateAge(animal.data_nascimento) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div v-else class="text-center py-8">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-600">Este tutor ainda não possui animais cadastrados.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação de Exclusão -->
    <div v-if="showDeleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50" @click="closeDeleteModal">
        <div class="bg-white rounded-lg max-w-md w-full" @click.stop>
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Confirmar Exclusão</h3>
                </div>
                
                <p class="text-gray-600 mb-6">
                    Tem certeza que deseja excluir o tutor <strong>{{ tutorToDelete?.nome }}</strong>?
                    Esta ação não pode ser desfeita.
                </p>
                
                <div class="flex justify-end space-x-3">
                    <button @click="closeDeleteModal" 
                            class="px-4 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                        Cancelar
                    </button>
                    <button @click="deleteTutor" 
                            class="px-4 py-2 bg-red-600 text-white hover:bg-red-700 rounded-lg transition-colors duration-200">
                        Excluir
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const props = defineProps({
    tutors: Array
})

// Estados reativos
const searchTerm = ref('')
const cpfSearch = ref('')
const showModal = ref(false)
const selectedTutor = ref(null)
const showDeleteModal = ref(false)
const tutorToDelete = ref(null)

// Computed para filtrar tutores
const filteredTutores = computed(() => {
    return props.tutors.filter(tutor => {
        const matchesName = tutor.nome.toLowerCase().includes(searchTerm.value.toLowerCase())
        const matchesCPF = tutor.cpf.includes(cpfSearch.value.replace(/\D/g, ''))
        return matchesName && matchesCPF
    })
})

// Função para formatar CPF
const formatCPF = (cpf) => {
    if (!cpf) return 'CPF não informado'
    
    const numbers = cpf.replace(/\D/g, '')
    if (numbers.length !== 11) return cpf
    
    return numbers.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4')
}

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

// Função para limpar filtros
const clearFilters = () => {
    searchTerm.value = ''
    cpfSearch.value = ''
}

// Função para mostrar modal de animais
const showAnimalsModal = (tutor) => {
    selectedTutor.value = tutor
    showModal.value = true
}

// Função para fechar modal de animais
const closeModal = () => {
    showModal.value = false
    selectedTutor.value = null
}

// Função para confirmar exclusão
const confirmDelete = (tutor) => {
    tutorToDelete.value = tutor
    showDeleteModal.value = true
}

// Função para fechar modal de exclusão
const closeDeleteModal = () => {
    showDeleteModal.value = false
    tutorToDelete.value = null
}

// Função para deletar tutor
const deleteTutor = () => {
    if (tutorToDelete.value) {
        router.delete(route('tutors.destroy', tutorToDelete.value.id), {
            onSuccess: () => {
                closeDeleteModal()
            }
        })
    }
}
</script>

<style>
/* Classes CSS personalizadas que devem estar definidas no seu arquivo de estilos */
.bg-gradient-pastel-1 {
    background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
}

.card-pastel {
    /* @apply bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 p-6; */
    background-color: rgba(255,255,255,0.8);
    backdrop-filter: blur(4px);
    border-radius: 0.75rem; /* rounded-xl */
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -4px rgba(0,0,0,0.1); /* shadow-lg */
    border: 1px solid rgba(255,255,255,0.2);
    padding: 1.5rem; /* p-6 */
}

.btn-pastel-primary {
    /* @apply bg-gradient-to-r from-purple-400 to-pink-400 hover:from-purple-500 hover:to-pink-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-200; */
    background-image: linear-gradient(to right, #a78bfa, #f472b6); /* from-purple-400 to-pink-400 */
    color: #fff;
    font-weight: 600; /* font-semibold */
    padding: 0.5rem 1rem; /* py-2 px-4 */
    border-radius: 0.5rem; /* rounded-lg */
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -2px rgba(0,0,0,0.1); /* shadow-md */
    transition: all 0.2s;
}
.btn-pastel-primary:hover {
    background-image: linear-gradient(to right, #8b5cf6, #ec4899); /* hover:from-purple-500 hover:to-pink-500 */
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -4px rgba(0,0,0,0.1); /* hover:shadow-lg */
}

.text-pastel-purple {
    color: #8b5cf6;
}

.text-pastel-pink {
    color: #ec4899;
}

.text-pastel-blue {
    color: #3b82f6;
}

.text-pastel-green {
    color: #10b981;
}

.bg-pastel-purple\/10 {
    background-color: rgba(139, 92, 246, 0.1);
}

.bg-pastel-purple\/20 {
    background-color: rgba(139, 92, 246, 0.2);
}

.bg-gray-25 {
    background-color: rgba(249, 250, 251, 0.5);
}
</style>