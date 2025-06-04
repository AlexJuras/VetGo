<script setup>
import { Link, Head, router } from "@inertiajs/vue3";
import { route } from "../../../vendor/tightenco/ziggy/src/js";
import { ref } from "vue";

const isMobileMenuOpen = ref(false);
const isDrawerOpen = ref(false);
const expandedMenus = ref({
    tutors: false,
    animals: false,
    estudantes: false,
    consultas: false,
    users: false
});

function logout() {
    router.post(route('logout'));
}

function toggleMobileMenu() {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
}

function toggleDrawer() {
    isDrawerOpen.value = !isDrawerOpen.value;
}

function toggleSubmenu(menu) {
    expandedMenus.value[menu] = !expandedMenus.value[menu];
}

function closeDrawer() {
    isDrawerOpen.value = false;
    // Fechar todos os submenus
    Object.keys(expandedMenus.value).forEach(key => {
        expandedMenus.value[key] = false;
    });
}
</script>

<template>
    <Head>
        <meta
            head-key="VetGo"
            name="VetGo"
            description="Organização que flui, cuidado que se vê!"
        />
    </Head>

    <div class="min-h-screen bg-gradient-pastel-1">
        <!-- Overlay para mobile -->
        <div 
            v-if="isDrawerOpen" 
            @click="closeDrawer"
            class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
        ></div>

        <!-- Navigation Drawer -->
        <aside 
            :class="[
                'fixed top-0 left-0 z-50 h-full w-80 drawer-background backdrop-blur-lg shadow-2xl border-r border-white/20 transform transition-transform duration-300 ease-in-out',
                isDrawerOpen ? 'translate-x-0' : '-translate-x-full'
            ]"
        >
            <!-- Drawer Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200/50">
                <div class="flex items-center space-x-3">
                    <div class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-br from-pastel-purple to-pastel-pink rounded-lg shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l5-3 5 3z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">Navegação</h2>
                        <p class="text-xs text-gray-500">Menu Principal</p>
                    </div>
                </div>
                <button 
                    @click="closeDrawer"
                    class="p-2 rounded-lg text-gray-500 hover:text-gray-700 hover:bg-gray-100/50 transition-colors"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Drawer Content -->
            <nav class="flex-1 px-4 py-6 space-y-2 max-h-[calc(100vh-120px)] overflow-y-auto">
                <!-- Início/Home -->
                <Link
                    :href="route('home')"
                    @click="closeDrawer"
                    class="drawer-nav-item group"
                >
                    <div class="w-10 h-10 bg-gradient-to-br from-pastel-blue to-pastel-green rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <span class="flex-1 drawer-nav-text">Início</span>
                </Link>

                <!-- tutors -->
                <div class="drawer-section">
                    <button 
                        @click="toggleSubmenu('tutors')"
                        class="drawer-nav-item group w-full"
                    >
                        <div class="w-10 h-10 bg-gradient-to-br from-pastel-purple rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                        </div>
                        <span class="drawer-nav-text">Tutores</span>
                        <svg 
                            :class="['w-4 h-4 text-gray-400 ml-auto transition-transform', expandedMenus.tutors ? 'rotate-180' : '']"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div v-show="expandedMenus.tutors" class="ml-6 mt-2 space-y-1">
                        <Link 
                            :href="route('tutors.create')"
                            @click="closeDrawer"
                            class="drawer-sub-item"
                        >
                            <svg class="w-4 h-4 text-pastel-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Criar Tutor
                        </Link>
                        <Link 
                            :href="route('tutors.index')"
                            @click="closeDrawer"
                            class="drawer-sub-item"
                        >
                            <svg class="w-4 h-4 text-pastel-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            Listar tutors
                        </Link>
                    </div>
                </div>

                <!-- animals -->
                <div class="drawer-section">
                    <button 
                        @click="toggleSubmenu('animals')"
                        class="drawer-nav-item group w-full"
                    >
                        <div class="w-10 h-10 bg-gradient-to-br from-pastel-blue to-pastel-purple rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform">
                            <svg fill="#ffffff" height="28px" width="28px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M464.369,143.408c0-12.906-5.032-25.034-14.158-34.172c-9.126-9.126-21.266-14.146-34.172-14.146 s-25.046,5.021-34.172,14.146l-17.836,17.844c-14.795-13.032-31.953-23.432-50.736-30.469V57.293 C313.296,25.701,287.594,0,256.003,0c-31.592,0-57.294,25.701-57.294,57.293v39.327c-0.001,0-0.002,0.001-0.003,0.001 c-18.783,7.038-35.944,17.438-50.74,30.46l-17.835-17.844c-9.126-9.126-21.266-14.146-34.172-14.146s-25.046,5.021-34.172,14.146 c-9.126,9.137-14.158,21.266-14.158,34.172c0,12.917,5.032,25.046,14.158,34.183l34.844,34.844 c-2.841,12.071-4.348,24.64-4.348,37.569v51.495c0,25.533,5.867,49.709,16.338,71.265l-18.703,18.703 c-10.621,10.621-16.465,24.733-16.465,39.749c0,15.016,5.844,29.139,16.465,39.749c10.61,10.621,24.733,16.465,39.749,16.465 s29.128-5.844,39.749-16.465l19.932-19.932c8.859,3.966,18.135,7.166,27.748,9.52h0.001l9.584,24.521 c9.157,23.427,22.304,26.926,29.326,26.926c7.021,0,20.168-3.5,29.325-26.927l9.584-24.521c9.611-2.354,18.887-5.554,27.757-9.519 l0.001-0.001l19.943,19.934c10.61,10.621,24.733,16.465,39.749,16.465c15.016,0,29.128-5.844,39.749-16.465 c21.915-21.915,21.915-57.571,0-79.498l-18.718-18.709c0.001-0.002,0.002-0.003,0.003-0.006 c10.471-21.556,16.338-45.732,16.338-71.254v-51.495c0-12.929-1.507-25.51-4.36-37.581l34.832-34.832 C459.336,168.454,464.369,156.325,464.369,143.408z M396.547,250.004v14.145h-53.791l-32.258-55.877l-0.003-0.005l37.294-64.604 C377.635,169.451,396.547,207.565,396.547,250.004z M322.673,275.757l-33.337,57.733h-66.662l-33.337-57.733l33.337-57.745h66.662 L322.673,275.757z M221.902,64.572c1.869,1.51,4.245,2.418,6.834,2.418c6.014,0,10.89-4.876,10.89-10.892 c0-6.014-4.876-10.89-10.89-10.89c-1.827,0-3.547,0.456-5.059,1.251c4.538-13.507,17.31-23.268,32.327-23.268 c15.015,0,27.786,9.759,32.327,23.264c-1.511-0.793-3.227-1.248-5.052-1.248c-6.014,0-10.89,4.876-10.89,10.89 c0,6.015,4.876,10.892,10.89,10.892c2.587,0,4.959-0.907,6.829-2.413V89.85c-0.001,0-0.002-0.001-0.005-0.001 c-11.004-2.342-22.402-3.571-34.09-3.571c-11.699,0-23.107,1.229-34.11,3.583V64.572z M184.653,128.982 c20.931-12.406,45.327-19.514,71.359-19.514c26.688,0,51.661,7.477,72.936,20.448l-37.468,64.905h-68.813l-38.014-65.838V128.982z M165.656,142.462l36.935,63.969l-33.324,57.719h-53.791v-14.145C115.476,206.896,134.989,168.25,165.656,142.462z M104.634,187.633l-26.449-26.449c-4.742-4.742-7.363-11.062-7.363-17.776c0-6.714,2.621-13.022,7.363-17.764 c4.742-4.754,11.062-7.363,17.776-7.363c6.714,0,13.022,2.609,17.776,7.363l17.938,17.938 C120.473,156.65,111.301,171.492,104.634,187.633z M153.01,454.569c-6.227,6.238-14.529,9.671-23.341,9.671 c-8.824,0-17.115-3.432-23.353-9.671c-6.238-6.238-9.671-14.529-9.671-23.353c0-8.812,3.432-17.115,9.671-23.341l14.34-14.348 c0.001,0.001,0.002,0.003,0.003,0.005c12.511,18.344,28.664,34.032,47.39,45.999c0.001,0.001,0.003,0.001,0.005,0.002 L153.01,454.569z M167.101,410.254c-0.001-0.001-0.001-0.001-0.002-0.002c-31.493-25.788-51.623-64.969-51.623-108.753V287.34 h53.779v0.001l34.402,59.587L167.101,410.254z M263.732,476.632c-3.283,8.402-6.522,11.471-7.724,12.1 c-1.202-0.628-4.441-3.698-7.725-12.1l-4.639-11.869c4.08,0.313,8.206,0.464,12.368,0.464c4.163,0,8.279-0.151,12.359-0.464 L263.732,476.632z M327.346,422.543c-1.878,1.113-3.792,2.192-5.728,3.212c-0.012,0-0.023,0.012-0.035,0.012 c-1.229,0.661-2.458,1.287-3.711,1.89c-18.68,9.207-39.679,14.378-61.861,14.378s-43.181-5.172-61.861-14.378 c-1.252-0.603-2.493-1.229-3.722-1.902c-0.012,0-0.012,0-0.012,0c-1.403-0.731-2.794-1.496-4.163-2.284 c-0.001,0-0.002-0.001-0.003-0.002l38.556-66.787h64.526l38.019,65.858C327.35,422.541,327.347,422.542,327.346,422.543z M309.421,345.094l33.347-57.753v-0.001h53.779v14.159c0,43.123-19.515,81.77-50.196,107.559 c-0.001,0.001-0.002,0.001-0.003,0.002L309.421,345.094z M405.708,407.875c12.882,12.871,12.882,33.824,0,46.695 c-6.227,6.238-14.529,9.671-23.341,9.671c-8.824,0-17.115-3.432-23.353-9.671l-15.044-15.036c0.001-0.001,0.003-0.002,0.005-0.003 c18.725-11.978,34.878-27.654,47.389-46.008L405.708,407.875z M433.815,161.184l-26.426,26.426 c-6.679-16.129-15.862-30.971-27.064-44.028l17.938-17.938c4.754-4.754,11.062-7.363,17.776-7.363s13.033,2.609,17.776,7.363 c4.742,4.743,7.363,11.05,7.363,17.764C441.178,150.122,438.557,156.441,433.815,161.184z"></path> </g> </g> </g></svg>
                        </div>
                        <span class="drawer-nav-text">Animais</span>
                        <svg 
                            :class="['w-4 h-4 text-gray-400 ml-auto transition-transform', expandedMenus.animals ? 'rotate-180' : '']"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div v-show="expandedMenus.animals" class="ml-6 mt-2 space-y-1">
                        <Link 
                            :href="route('animals.create')"
                            @click="closeDrawer"
                            class="drawer-sub-item"
                        >
                            <svg class="w-4 h-4 text-pastel-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Criar Animal
                        </Link>
                        <Link 
                            :href="route('animals.index')"
                            @click="closeDrawer"
                            class="drawer-sub-item"
                        >
                            <svg class="w-4 h-4 text-pastel-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            Listar animals
                        </Link>
                    </div>
                </div>

                <!-- Veterinários -->
                <div class="drawer-section">
                    <button 
                        @click="toggleSubmenu('estudantes')"
                        class="drawer-nav-item group w-full"
                    >
                        <div class="w-10 h-10 bg-gradient-to-br to-pastel-green rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        </div>
                        <span class="drawer-nav-text">Estudantes</span>
                        <svg 
                            :class="['w-4 h-4 text-gray-400 ml-auto transition-transform', expandedMenus.estudantes ? 'rotate-180' : '']"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div v-show="expandedMenus.estudantes" class="ml-6 mt-2 space-y-1">
                        <Link 
                            :href="route('estudantes.create')"
                            @click="closeDrawer"
                            class="drawer-sub-item"
                        >
                            <svg class="w-4 h-4 text-pastel-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Criar Veterinário
                        </Link>
                        <Link 
                            :href="route('estudantes.index')"
                            @click="closeDrawer"
                            class="drawer-sub-item"
                        >
                            <svg class="w-4 h-4 text-pastel-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            Listar Veterinários
                        </Link>
                    </div>
                </div>

                <!-- Consultas -->
                <div class="drawer-section">
                    <button 
                        @click="toggleSubmenu('consultas')"
                        class="drawer-nav-item group w-full"
                    >
                        <div class="w-10 h-10 bg-gradient-to-br from-pastel-purple rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="drawer-nav-text">Consultas</span>
                        <svg 
                            :class="['w-4 h-4 text-gray-400 ml-auto transition-transform', expandedMenus.consultas ? 'rotate-180' : '']"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div v-show="expandedMenus.consultas" class="ml-6 mt-2 space-y-1">
                        <Link 
                            :href="route('consultas.create')"
                            @click="closeDrawer"
                            class="drawer-sub-item"
                        >
                            <svg class="w-4 h-4 text-pastel-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Criar Consulta
                        </Link>
                        <Link 
                            :href="route('consultas.index')"
                            @click="closeDrawer"
                            class="drawer-sub-item"
                        >
                            <svg class="w-4 h-4 text-pastel-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            Listar Consultas
                        </Link>
                    </div>
                </div>

                <!-- Usuários -->
                <div class="drawer-section">
                    <button 
                        @click="toggleSubmenu('users')"
                        class="drawer-nav-item group w-full"
                    >
                        <div class="w-10 h-10 bg-gradient-to-br from-pastel-blue rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <span class="drawer-nav-text">Usuários</span>
                        <svg 
                            :class="['w-4 h-4 text-gray-400 ml-auto transition-transform', expandedMenus.users ? 'rotate-180' : '']"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div v-show="expandedMenus.users" class="ml-6 mt-2 space-y-1">
                        <Link 
                            :href="route('users.create')"
                            @click="closeDrawer"
                            class="drawer-sub-item"
                        >
                            <svg class="w-4 h-4 text-pastel-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Criar Usuário
                        </Link>
                        <Link 
                            :href="route('users.index')"
                            @click="closeDrawer"
                            class="drawer-sub-item"
                        >
                            <svg class="w-4 h-4 text-pastel-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            Listar Usuários
                        </Link>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Header Moderno -->
        <header class="bg-white/80 backdrop-blur-lg shadow-lg border-b border-white/20 sticky top-0 z-30">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Menu Button + Logo e Brand -->
                    <div class="flex items-center space-x-4">
                        <!-- Menu Hamburger Button -->
                        <button
                            @click="toggleDrawer"
                            class="p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100/50 transition-colors"
                        >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <div class="flex items-center space-x-3">
                            <div class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-br from-pastel-purple to-pastel-pink rounded-lg shadow-md">
                                <svg
                                    class="w-6 h-6 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l5-3 5 3z"
                                    />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-gray-800">VetGo</h1>
                                <p class="text-xs text-gray-500 hidden sm:block">Clínica Veterinária Acadêmica</p>
                            </div>
                        </div>
                    </div>

                    <!-- User Info & Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- User Welcome -->
                        <div class="hidden sm:flex items-center space-x-3">
                            <div class="text-right user-info">
                                <p class="text-sm font-medium text-gray-700">
                                    {{ $page.props.auth.user ? 'Olá!' : 'Bem-vindo!' }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $page.props.auth.user ? $page.props.auth.user.name : 'Visitante' }}
                                </p>
                            </div>
                            <div class="w-8 h-8 bg-gradient-to-br from-pastel-blue to-pastel-green rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7c0-2.21-1.79-4-4-4S8 4.79 8 7s1.79 4 4 4 4-1.79 4-4z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14c-5.33 0-8 2.67-8 4v2h16v-2c0-1.33-2.67-4-8-4z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Logout Button - Desktop -->
                        <button 
                            v-if="$page.props.auth.user"
                            @click="logout" 
                            class="hidden md:flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white/50 hover:bg-white/80 rounded-lg border border-gray-200 hover:border-gray-300 transition-all duration-200"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Sair
                        </button>

                        <!-- Mobile Menu Button -->
                        <button
                            @click="toggleMobileMenu"
                            class="md:hidden p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-colors"
                        >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path v-if="!isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div v-show="isMobileMenuOpen" class="md:hidden">
                    <div class="px-2 pt-2 pb-3 space-y-1 bg-white/90 backdrop-blur-sm rounded-lg mt-2 shadow-lg border border-gray-200">
                        <!-- User Info Mobile -->
                        <div class="px-3 py-2 border-b border-gray-200 mb-2 user-info">
                            <p class="text-sm font-medium text-gray-700">
                                {{ $page.props.auth.user ? $page.props.auth.user.name : 'Visitante' }}
                            </p>
                            <p class="text-xs text-gray-500">
                                {{ $page.props.auth.user ? 'Estudante de Veterinária' : 'Bem-vindo ao VetGo' }}
                            </p>
                        </div>

                        <!-- Mobile Logout -->
                        <button 
                            v-if="$page.props.auth.user"
                            @click="logout; isMobileMenuOpen = false" 
                            class="mobile-nav-link w-full text-left text-red-600 hover:bg-red-50"
                        >
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Sair
                        </button>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="flex-1">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-white/50 backdrop-blur-sm border-t border-gray-200 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-pastel-purple to-pastel-pink rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l5-3 5 3z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">VetGo</p>
                            <p class="text-xs text-gray-500">Organização que flui, cuidado que se vê!</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500">
                        © 2025 VetGo - Clínica Veterinária Acadêmica. Todos os direitos reservados.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
/* Import da fonte Google Fonts - Roboto Slab para o campo do usuário */
@import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;600;700&display=swap');

/* Gradiente de fundo pastel */
.bg-gradient-pastel-1 {
    background: linear-gradient(135deg, #f3e8ff 0%, #e0e7ff 25%, #dbeafe 50%, #dcfce7 75%, #fef3cd 100%);
    min-height: 100vh;
}

/* Estilo especial para informações do usuário */
.user-info {
    font-family: 'Roboto Slab', serif;
}

.user-info p {
    font-family: 'Roboto Slab', serif;
}

.drawer-background {
    background: linear-gradient(180deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 250, 252, 0.85) 100%);
}

/* Mobile Navigation Links */
.mobile-nav-link {
    display: flex;
    align-items: center;
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    border-radius: 0.5rem;
    transition: background 0.2s;
    background: transparent;
}
.mobile-nav-link:hover {
    background: #f3f4f6;
}

/* Drawer Styles */
.drawer-nav-item {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    text-decoration: none;
    color: #374151;
    border-radius: 0.75rem;
    transition: all 0.3s ease;
    background: transparent;
    border: none;
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.drawer-nav-item:hover {
    background: linear-gradient(135deg, rgba(168, 85, 247, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
    transform: translateX(4px);
    box-shadow: 0 4px 12px rgba(168, 85, 247, 0.15);
}

.drawer-nav-text {
    margin-left: 0.75rem;
    font-weight: 500;
    flex: 1;
}

.drawer-sub-item {
    display: flex;
    align-items: center;
    padding: 0.5rem 0.75rem;
    text-decoration: none;
    color: #6b7280;
    border-radius: 0.5rem;
    transition: all 0.2s ease;
    font-size: 0.8125rem;
    font-weight: 400;
    margin-bottom: 0.25rem;
}

.drawer-sub-item:hover {
    background: rgba(59, 130, 246, 0.1);
    color: #3b82f6;
    transform: translateX(2px);
}

.drawer-sub-item svg {
    margin-right: 0.5rem;
    flex-shrink: 0;
}

.drawer-section {
    margin-bottom: 0.5rem;
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

/* Scrollbar personalizado para o drawer */
.drawer-nav-item::-webkit-scrollbar {
    width: 4px;
}

.drawer-nav-item::-webkit-scrollbar-track {
    background: transparent;
}

.drawer-nav-item::-webkit-scrollbar-thumb {
    background: rgba(168, 85, 247, 0.3);
    border-radius: 2px;
}

.drawer-nav-item::-webkit-scrollbar-thumb:hover {
    background: rgba(168, 85, 247, 0.5);
}

/* Animações suaves */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.drawer-sub-item {
    animation: slideIn 0.3s ease-out;
}

/* Responsive adjustments */
@media (max-width: 1024px) {
    .drawer-nav-item {
        padding: 0.625rem 0.875rem;
    }
    
    .drawer-nav-text {
        font-size: 0.8125rem;
    }
}
</style>