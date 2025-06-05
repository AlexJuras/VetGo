<template>
    <Head title="Lista de Animais | VetGo" />

    <!-- Background com gradiente pastel -->
    <div
        class="min-h-screen bg-gradient-pastel-1 flex items-center justify-center p-4"
    >
        <!-- Container principal -->
        <div class="w-full max-w-7xl">
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
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.168 18.477 18.582 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                        />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">VetGo</h1>
                <p class="text-gray-600 text-lg">Animais Cadastrados</p>
            </div>

            <!-- Card principal -->
            <div class="card-pastel">
                <!-- Header do card com botão de adicionar -->
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6"
                >
                    <div class="flex items-center mb-4 sm:mb-0">
                        <svg
                            class="w-6 h-6 text-pastel-green mr-3"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                            />
                        </svg>
                        <h2 class="text-xl font-bold text-gray-800">
                            Lista de Animais
                            <span
                                class="text-sm font-normal text-gray-500 ml-2"
                            >
                                ({{ filteredAnimals.length }}
                                {{
                                    filteredAnimals.length === 1
                                        ? "animal"
                                        : "animais"
                                }})
                            </span>
                        </h2>
                    </div>
                    <Link
                        :href="route('animals.create')"
                        class="btn-pastel-primary inline-flex items-center"
                    >
                        <svg
                            class="w-4 h-4 mr-2"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4v16m8-8H4"
                            />
                        </svg>
                        Novo Animal
                    </Link>
                </div>

                <!-- Barra de pesquisa -->
                <div v-if="animals.length > 0" class="mb-6">
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                />
                            </svg>
                        </div>
                        <input
                            v-model="searchQuery"
                            type="text"
                            placeholder="Pesquisar por nome do animal, espécie ou tutor..."
                            class="w-full pl-10 pr-4 py-3 bg-white/50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-pastel-purple/20 focus:border-pastel-purple transition-colors duration-200 backdrop-blur-sm"
                        />
                        <!-- Botão para limpar pesquisa -->
                        <button
                            v-if="searchQuery"
                            @click="searchQuery = ''"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200"
                        >
                            <svg
                                class="w-5 h-5"
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
                        </button>
                    </div>

                    <!-- Indicador de resultados da pesquisa -->
                    <div
                        v-if="
                            searchQuery &&
                            filteredAnimals.length !== animals.length
                        "
                        class="mt-2 text-sm text-gray-600"
                    >
                        <span v-if="filteredAnimals.length > 0">
                            Encontrados {{ filteredAnimals.length }}
                            {{
                                filteredAnimals.length === 1
                                    ? "resultado"
                                    : "resultados"
                            }}
                            para "{{ searchQuery }}"
                        </span>
                        <span v-else class="text-amber-600">
                            Nenhum resultado encontrado para "{{ searchQuery }}"
                        </span>
                    </div>
                </div>

                <!-- Conteúdo da lista -->
                <div v-if="filteredAnimals.length > 0">
                    <!-- Versão desktop - tabela -->
                    <div class="hidden lg:block overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-gray-100">
                                    <th
                                        class="text-left py-4 px-6 font-semibold text-gray-700"
                                    >
                                        <div class="flex items-center">
                                            <svg
                                                class="w-4 h-4 text-pastel-pink mr-2"
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
                                            Nome
                                        </div>
                                    </th>
                                    <th
                                        class="text-left py-4 px-6 font-semibold text-gray-700"
                                    >
                                        <div class="flex items-center">
                                            <svg
                                                class="w-4 h-4 text-pastel-blue mr-2"
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
                                            Espécie
                                        </div>
                                    </th>
                                    <th
                                        class="text-left py-4 px-6 font-semibold text-gray-700"
                                    >
                                        <div class="flex items-center">
                                            <svg
                                                class="w-4 h-4 text-pastel-orange mr-2"
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
                                        </div>
                                    </th>
                                    <th
                                        class="text-left py-4 px-6 font-semibold text-gray-700"
                                    >
                                        <div class="flex items-center">
                                            <svg
                                                class="w-4 h-4 text-pastel-purple mr-2"
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
                                        </div>
                                    </th>
                                    <th
                                        class="text-left py-4 px-6 font-semibold text-gray-700"
                                    >
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pastel-orange mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.871c1.355 0 2.697.056 4.024.166C17.155 8.51 18 9.473 18 10.608v2.513M15 8.25v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.379a48.474 48.474 0 0 0-6-.371c-2.032 0-4.034.126-6 .371m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.169c0 .621-.504 1.125-1.125 1.125H4.125A1.125 1.125 0 0 1 3 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1-.53 0L12 2.845l.265.265Zm-3 0a.375.375 0 1 1-.53 0L9 2.845l.265.265Zm6 0a.375.375 0 1 1-.53 0L15 2.845l.265.265Z" />
                                            </svg>
                                            Idade
                                        </div>
                                    </th>
                                    <th
                                        class="text-left py-4 px-6 font-semibold text-gray-700"
                                    >
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-pastel-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                            </svg>
                                            Ações
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(animal, index) in filteredAnimals"
                                    :key="animal.id"
                                    class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors duration-200"
                                    :class="{ 'bg-gray-25': index % 2 === 0 }"
                                >
                                    <td class="py-4 px-6">
                                        <div
                                            class="font-semibold text-gray-800"
                                        >
                                            {{ animal.nome }}
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-pastel-blue/10 text-pastel-blue"
                                        >
                                            {{ animal.especie }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div
                                                class="w-8 h-8 bg-pastel-orange/10 rounded-full flex items-center justify-center mr-3"
                                            >
                                                <svg
                                                    class="w-4 h-4 text-pastel-orange"
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
                                            </div>
                                            <div>
                                                <div
                                                    class="font-medium text-gray-800"
                                                >
                                                    {{
                                                        animal.tutor?.nome ||
                                                        "Não informado"
                                                    }}
                                                </div>
                                                <div
                                                    v-if="
                                                        animal.tutor?.telefone
                                                    "
                                                    class="text-xs text-gray-500"
                                                >
                                                    {{ animal.tutor.telefone }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-gray-600">
                                        {{ formatDate(animal.data_nascimento) }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-pastel-purple/10 text-pastel-purple"
                                        >
                                            {{
                                                calculateAge(
                                                    animal.data_nascimento
                                                )
                                            }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div
                                            class="flex items-center space-x-2"
                                        >
                                            <Link
                                                :href="
                                                    route(
                                                        'animals.edit',
                                                        animal.id
                                                    )
                                                "
                                                class="inline-flex items-center px-3 py-1.5 bg-pastel-blue/10 text-pastel-blue rounded-lg hover:bg-pastel-blue/20 transition-colors duration-200 text-sm font-medium"
                                            >
                                                <svg
                                                    class="w-4 h-4 mr-1"
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
                                                Editar
                                            </Link>
                                            <button
                                                @click="confirmDelete(animal)"
                                                class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors duration-200 text-sm font-medium"
                                            >
                                                <svg
                                                    class="w-4 h-4 mr-1"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                    />
                                                </svg>
                                                Excluir
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Versão mobile/tablet - cards -->
                    <div class="lg:hidden space-y-4">
                        <div
                            v-for="animal in filteredAnimals"
                            :key="animal.id"
                            class="bg-white/50 rounded-lg p-4 border border-gray-100 backdrop-blur-sm"
                        >
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center">
                                    <svg
                                        class="w-5 h-5 text-pastel-pink mr-2"
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
                                    <h3 class="font-bold text-gray-800 text-lg">
                                        {{ animal.nome }}
                                    </h3>
                                </div>
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-pastel-purple/10 text-pastel-purple"
                                >
                                    {{ calculateAge(animal.data_nascimento) }}
                                </span>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center text-sm">
                                    <svg
                                        class="w-4 h-4 text-pastel-blue mr-2"
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
                                    <span class="text-gray-600">Espécie:</span>
                                    <span
                                        class="ml-2 font-medium text-gray-800"
                                        >{{ animal.especie }}</span
                                    >
                                </div>

                                <div class="flex items-start text-sm">
                                    <svg
                                        class="w-4 h-4 text-pastel-orange mr-2 mt-0.5"
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
                                    <div>
                                        <span class="text-gray-600"
                                            >Tutor:</span
                                        >
                                        <div
                                            class="ml-2 font-medium text-gray-800"
                                        >
                                            {{
                                                animal.tutor?.nome ||
                                                "Não informado"
                                            }}
                                            <div
                                                v-if="animal.tutor?.telefone"
                                                class="text-xs text-gray-500 mt-1"
                                            >
                                                {{ animal.tutor.telefone }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center text-sm">
                                    <svg
                                        class="w-4 h-4 text-pastel-purple mr-2"
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
                                    <span class="text-gray-600"
                                        >Nascimento:</span
                                    >
                                    <span
                                        class="ml-2 font-medium text-gray-800"
                                        >{{
                                            formatDate(animal.data_nascimento)
                                        }}</span
                                    >
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-end space-x-2 mt-4 pt-3 border-t border-gray-100"
                            >
                                <Link
                                    :href="route('animals.edit', animal.id)"
                                    class="inline-flex items-center px-3 py-1.5 bg-pastel-blue/10 text-pastel-blue rounded-lg hover:bg-pastel-blue/20 transition-colors duration-200 text-sm font-medium"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
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
                                    Editar
                                </Link>
                                <button
                                    @click="confirmDelete(animal)"
                                    class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors duration-200 text-sm font-medium"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        />
                                    </svg>
                                    Excluir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estado vazio (sem animais cadastrados) -->
                <div v-else-if="animals.length === 0" class="text-center py-12">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4"
                    >
                        <svg
                            class="w-10 h-10 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                            />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        Nenhum animal cadastrado
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Comece cadastrando o primeiro animal para começar a usar
                        o sistema.
                    </p>
                    <Link
                        :href="route('animals.create')"
                        class="btn-pastel-primary inline-flex items-center"
                    >
                        <svg
                            class="w-4 h-4 mr-2"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4v16m8-8H4"
                            />
                        </svg>
                        Cadastrar Primeiro Animal
                    </Link>
                </div>

                <!-- Estado vazio (nenhum resultado na pesquisa) -->
                <div v-else class="text-center py-12">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-amber-100 rounded-full mb-4"
                    >
                        <svg
                            class="w-10 h-10 text-amber-500"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        Nenhum resultado encontrado
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Não encontramos animais que correspondam à sua pesquisa
                        "{{ searchQuery }}"
                    </p>
                    <button
                        @click="searchQuery = ''"
                        class="btn-pastel-secondary inline-flex items-center"
                    >
                        <svg
                            class="w-4 h-4 mr-2"
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
                        Limpar Pesquisa
                    </button>
                </div>

                <!-- Divider -->
                <div v-if="filteredAnimals.length > 0" class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500"
                            >Informações</span
                        >
                    </div>
                </div>

                <!-- Informações sobre a listagem -->
                <div
                    v-if="filteredAnimals.length > 0"
                    class="bg-blue-50/50 rounded-lg p-4"
                >
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
                                Sobre esta Lista
                            </h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    • Visualização de todos os animais
                                    cadastrados com seus tutores
                                </li>
                                <li>
                                    • Pesquisa em tempo real por nome, espécie
                                    ou tutor
                                </li>
                                <li>• Idade calculada automaticamente</li>
                                <li>
                                    • Interface responsiva para mobile e desktop
                                </li>
                                <li>• Dados sempre atualizados</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div
                v-if="showDeleteModal"
                class="fixed inset-0 bg-white/10 backdrop-blur-sm flex items-center justify-center p-4 z-50"
                @click="closeDeleteModal"
            >
                <div class="bg-white rounded-lg max-w-md w-full" @click.stop>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3"
                            >
                                <svg
                                    class="w-6 h-6 text-red-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"
                                    />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                Confirmar Exclusão
                            </h3>
                        </div>

                        <p class="text-gray-600 mb-6">
                            Tem certeza que deseja excluir o animal
                            <strong>{{ animalToDelete?.nome }}</strong
                            >? Esta ação não pode ser desfeita.
                        </p>

                        <div class="flex justify-end space-x-3">
                            <button
                                @click="closeDeleteModal"
                                class="px-4 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors duration-200"
                            >
                                Cancelar
                            </button>
                            <button
                                @click="deleteAnimal"
                                class="px-4 py-2 bg-red-600 text-white hover:bg-red-700 rounded-lg transition-colors duration-200"
                            >
                                Excluir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import { ref, computed } from "vue";

const props = defineProps({
    animals: Array,
});

// Estados reativos
const searchQuery = ref("");
const animalToDelete = ref(null);
const showDeleteModal = ref(false);

// Computed para filtrar animais baseado na pesquisa
const filteredAnimals = computed(() => {
    if (!searchQuery.value.trim()) {
        return props.animals;
    }

    const query = searchQuery.value.toLowerCase().trim();

    return props.animals.filter((animal) => {
        const nome = animal.nome?.toLowerCase() || "";
        const especie = animal.especie?.toLowerCase() || "";
        const tutorNome = animal.tutor?.nome?.toLowerCase() || "";
        const tutorTelefone = animal.tutor?.telefone?.toLowerCase() || "";

        return (
            nome.includes(query) ||
            especie.includes(query) ||
            tutorNome.includes(query) ||
            tutorTelefone.includes(query)
        );
    });
});

// Função para formatar data
const formatDate = (dateString) => {
    if (!dateString) return "Não informado";

    const date = new Date(dateString + "T00:00:00");
    return date.toLocaleDateString("pt-BR", {
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
    });
};

// Função para calcular idade
const calculateAge = (dateString) => {
    if (!dateString) return "Idade não informada";

    const birthDate = new Date(dateString + "T00:00:00");
    const today = new Date();

    let age = today.getFullYear() - birthDate.getFullYear();
    const diferencaMeses = today.getMonth() - birthDate.getMonth();

    if (
        diferencaMeses < 0 ||
        (diferencaMeses === 0 && today.getDate() < birthDate.getDate())
    ) {
        age--;
    }

    if (age === 0) {
        const mesesIdade = Math.max(0, diferencaMeses);
        return mesesIdade <= 1 ? "Menos de 1 ano" : `${mesesIdade} meses`;
    }

    return age === 1 ? "1 ano" : `${age} anos`;
};

// Função para confirmar exclusão
const confirmDelete = (animal) => {
    animalToDelete.value = animal;
    showDeleteModal.value = true;
};

// Função para fechar modal de exclusão
const closeDeleteModal = () => {
    showDeleteModal.value = false;
    animalToDelete.value = null;
};

// Função para deletar tutor
const deleteAnimal = () => {
    if (animalToDelete.value) {
        router.delete(route("animals.destroy", animalToDelete.value.id), {
            onSuccess: () => {
                closeDeleteModal();
            },
        });
    }
};
</script>
