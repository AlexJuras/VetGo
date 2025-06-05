<template>
    <Head title="Lista de Estudantes | VetGo" />

    <!-- Background com gradiente pastel -->
    <div class="min-h-screen bg-gradient-pastel-1 flex items-center justify-center p-4">
        <!-- Container principal -->
        <div class="w-full max-w-6xl">
            <!-- Header com título e subtítulo -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full backdrop-blur-sm mb-4">
                    <svg class="w-8 h-8 text-pastel-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">VetGo</h1>
                <p class="text-gray-600 text-lg">Estudantes de Medicina Veterinária</p>
            </div>

            <!-- Card principal -->
            <div class="card-pastel">
                <!-- Header do card com botão de adicionar -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <svg class="w-6 h-6 text-pastel-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                        <h2 class="text-xl font-bold text-gray-800">
                            Lista de Estudantes
                            <span class="text-sm font-normal text-gray-500 ml-2">
                                ({{ filteredEstudantes.length }} {{ filteredEstudantes.length === 1 ? 'estudante' : 'estudantes' }})
                            </span>
                        </h2>
                    </div>
                    <Link :href="route('estudantes.create')" class="btn-pastel-primary inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Novo Estudante
                    </Link>
                </div>

                <!-- Filtros -->
                <div class="bg-white/30 rounded-lg p-4 mb-6 border border-white/20">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Busca por nome -->
                        <div>
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
                                placeholder="Digite o nome do estudante..."
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-pastel-blue focus:border-transparent bg-white/70 backdrop-blur-sm"
                            />
                        </div>
                        
                        <!-- Filtro por CPF -->
                        <div>
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

                        <!-- Filtro por matrícula -->
                        <div>
                            <label for="matricula-search" class="block text-sm font-medium text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Buscar por matrícula
                            </label>
                            <input
                                id="matricula-search"
                                v-model="matriculaSearch"
                                type="text"
                                placeholder="Digite a matrícula..."
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-pastel-blue focus:border-transparent bg-white/70 backdrop-blur-sm"
                            />
                        </div>
                    </div>

                    <!-- Botão limpar filtros -->
                    <div class="flex justify-end mt-4">
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

                <!-- Conteúdo da lista -->
                <div v-if="filteredEstudantes.length > 0">
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Matrícula
                                        </div>
                                    </th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <!-- <svg class="w-4 h-4 text-pastel-orange mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-6-6h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2v-8a2 2 0 012-2z" />
                                            </svg> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pastel-orange mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.871c1.355 0 2.697.056 4.024.166C17.155 8.51 18 9.473 18 10.608v2.513M15 8.25v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.379a48.474 48.474 0 0 0-6-.371c-2.032 0-4.034.126-6 .371m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.169c0 .621-.504 1.125-1.125 1.125H4.125A1.125 1.125 0 0 1 3 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1-.53 0L12 2.845l.265.265Zm-3 0a.375.375 0 1 1-.53 0L9 2.845l.265.265Zm6 0a.375.375 0 1 1-.53 0L15 2.845l.265.265Z" />
                                            </svg>

                                            Idade
                                        </div>
                                    </th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-pastel-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            Telefone
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
                                <tr v-for="(estudante, index) in filteredEstudantes" :key="estudante.id" 
                                    class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors duration-200"
                                    :class="{ 'bg-gray-25': index % 2 === 0 }">
                                    <td class="py-4 px-6">
                                        <div class="font-semibold text-gray-800">{{ estudante.nome }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-mono text-sm text-gray-600">{{ formatCPF(estudante.cpf) }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-pastel-purple/10 text-pastel-purple">
                                            {{ estudante.matricula }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="text-sm text-gray-600">
                                            <div class="font-medium">{{ calculateAge(estudante.data_nascimento) }}</div>
                                            <div class="text-xs text-gray-500">{{ formatDate(estudante.data_nascimento) }}</div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-mono text-sm text-gray-600">{{ formatPhone(estudante.telefone) }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center justify-center space-x-2">
                                            <Link :href="route('estudantes.edit', estudante.id)" 
                                                  class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Editar
                                            </Link>
                                            <button
                                                @click="confirmDelete(estudante)"
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
                        <div v-for="estudante in filteredEstudantes" :key="estudante.id" 
                             class="bg-white/50 rounded-lg p-4 border border-gray-100 backdrop-blur-sm">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-pastel-pink mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <h3 class="font-bold text-gray-800 text-lg">{{ estudante.nome }}</h3>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-pastel-blue mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                    </svg>
                                    <span class="text-gray-600">CPF:</span>
                                    <span class="ml-2 font-mono text-sm text-gray-800">{{ formatCPF(estudante.cpf) }}</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-pastel-purple mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-gray-600">Matrícula:</span>
                                    <span class="ml-2 font-medium text-gray-800">{{ estudante.matricula }}</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-pastel-orange mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-6-6h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2v-8a2 2 0 012-2z" />
                                    </svg>
                                    <span class="text-gray-600">Idade:</span>
                                    <span class="ml-2 text-gray-800">{{ calculateAge(estudante.data_nascimento) }}</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-pastel-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span class="text-gray-600">Telefone:</span>
                                    <span class="ml-2 font-mono text-sm text-gray-800">{{ formatPhone(estudante.telefone) }}</span>
                                </div>
                                <div class="flex justify-end space-x-2 pt-2">
                                    <Link :href="route('estudantes.edit', estudante.id)" 
                                          class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </Link>
                                    <button
                                        @click="confirmDelete(estudante)"
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

                <!-- Estado vazio -->
                <div v-else class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        {{ estudantes.length === 0 ? 'Nenhum estudante cadastrado' : 'Nenhum estudante encontrado' }}
                    </h3>
                    <p class="text-gray-600 mb-6">
                        {{ estudantes.length === 0 
                            ? 'Comece cadastrando o primeiro estudante para começar a usar o sistema.' 
                            : 'Tente ajustar os filtros de busca para encontrar o estudante desejado.' 
                        }}
                    </p>
                    <Link v-if="estudantes.length === 0" :href="route('estudantes.create')" class="btn-pastel-primary inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Cadastrar Primeiro Estudante
                    </Link>
                    <button v-else @click="clearFilters" class="btn-pastel-primary inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Limpar Filtros
                    </button>
                </div>

                <!-- Divider -->
                <div v-if="filteredEstudantes.length > 0" class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                        </div>
                    <div class="relative flex justify-center">
                        <span class="bg-white px-3 text-sm text-gray-500 font-medium">
                            Informações
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmação de exclusão -->
    <div v-if="showDeleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">
                Confirmar Exclusão
            </h3>
            <p class="text-gray-600 text-center mb-6">
                Tem certeza que deseja excluir o estudante <strong>{{ estudanteParaExcluir?.nome }}</strong>?
                Esta ação não pode ser desfeita.
            </p>
            <div class="flex justify-end space-x-3">
                <button
                    @click="showDeleteModal = false"
                    class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200"
                >
                    Cancelar
                </button>
                <button
                    @click="deleteEstudante"
                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200"
                >
                    Excluir
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, computed, onMounted } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

export default {
    components: {
        Head,
        Link
    },
    props: {
        estudantes: {
            type: Array,
            default: () => []
        }
    },
    setup(props) {
        const searchTerm = ref('')
        const cpfSearch = ref('')
        const matriculaSearch = ref('')
        const showDeleteModal = ref(false)
        const estudanteParaExcluir = ref(null)

        // Computed para filtrar estudantes
        const filteredEstudantes = computed(() => {
            return props.estudantes.filter(estudante => {
                const nomeMatch = estudante.nome.toLowerCase().includes(searchTerm.value.toLowerCase())
                const cpfMatch = estudante.cpf.replace(/\D/g, '').includes(cpfSearch.value.replace(/\D/g, ''))
                const matriculaMatch = estudante.matricula.toLowerCase().includes(matriculaSearch.value.toLowerCase())
                
                return nomeMatch && cpfMatch && matriculaMatch
            })
        })

        // Função para limpar filtros
        const clearFilters = () => {
            searchTerm.value = ''
            cpfSearch.value = ''
            matriculaSearch.value = ''
        }

        // Função para formatar CPF
        const formatCPF = (cpf) => {
            if (!cpf) return ''
            const numbers = cpf.replace(/\D/g, '')
            return numbers.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4')
        }

        // Função para formatar telefone
        const formatPhone = (phone) => {
            if (!phone) return ''
            const numbers = phone.replace(/\D/g, '')
            if (numbers.length === 11) {
                return numbers.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3')
            } else if (numbers.length === 10) {
                return numbers.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3')
            }
            return phone
        }

        // Função para calcular idade
        const calculateAge = (birthDate) => {
            if (!birthDate) return ''
            const today = new Date()
            const birth = new Date(birthDate)
            let age = today.getFullYear() - birth.getFullYear()
            const monthDiff = today.getMonth() - birth.getMonth()
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
                age--
            }
            
            return `${age} anos`
        }

        // Função para formatar data
        const formatDate = (date) => {
            if (!date) return ''
            return new Date(date).toLocaleDateString('pt-BR')
        }

        // Função para confirmar exclusão
        const confirmDelete = (estudante) => {
            estudanteParaExcluir.value = estudante
            showDeleteModal.value = true
        }

        // Função para excluir estudante
        const deleteEstudante = () => {
            if (estudanteParaExcluir.value) {
                router.delete(`/estudantes/${estudanteParaExcluir.value.id}`, {
                    onSuccess: () => {
                        showDeleteModal.value = false
                        estudanteParaExcluir.value = null
                    }
                })
            }
        }

        return {
            searchTerm,
            cpfSearch,
            matriculaSearch,
            filteredEstudantes,
            showDeleteModal,
            estudanteParaExcluir,
            clearFilters,
            formatCPF,
            formatPhone,
            calculateAge,
            formatDate,
            confirmDelete,
            deleteEstudante
        }
    }
}
</script>

<style scoped>
.bg-gradient-pastel-1 {
    /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
    background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
}

.card-pastel {
    background: rgba(255,255,255,0.8);
    backdrop-filter: blur(16px);
    border-radius: 1rem;
    box-shadow: 0 10px 25px 0 rgba(0,0,0,0.08), 0 1.5px 4px 0 rgba(0,0,0,0.03);
    border: 1px solid rgba(255,255,255,0.2);
    padding: 2rem;
}

.btn-pastel-primary {
    background: linear-gradient(to right, #8b5cf6, #ec4899);
    color: #fff;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    box-shadow: 0 4px 16px 0 rgba(139,92,246,0.15);
    transition: all 0.2s;
    transform: scale(1);
    border: none;
    cursor: pointer;
}
.btn-pastel-primary:hover {
    background: linear-gradient(to right, #7c3aed, #db2777);
    transform: scale(1.05);
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

.text-pastel-orange {
    color: #f59e0b;
}

.bg-pastel-purple\/10 {
    background-color: rgba(139, 92, 246, 0.1);
}

.focus\:ring-pastel-blue:focus {
    --tw-ring-color: #3b82f6;
}

.bg-gray-25 {
    background-color: #fafafa;
}
</style>