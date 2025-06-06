<script setup>
import { Link, Head, router } from "@inertiajs/vue3";
import { route } from "../../../vendor/tightenco/ziggy/src/js";
import { ref } from "vue";

const isMobileMenuOpen = ref(false);

function logout() {
    router.post(route('logout'));
}

function toggleMobileMenu() {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
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
        <!-- Header Moderno -->
        <header class="bg-white/80 backdrop-blur-lg shadow-lg border-b border-white/20 sticky top-0 z-50">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo e Brand -->
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

                    <!-- Actions -->
                    <div class="flex items-center space-x-3">
                        <!-- Botão Sobre - Menos destacado -->
                        <Link 
                            :href="route('vetgo')"
                            class="hidden md:flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 bg-white/40 hover:bg-white/60 rounded-lg border border-gray-200/50 hover:border-gray-300 transition-all duration-200"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Sobre
                        </Link>

                        <!-- Botão Login - Menos destacado -->
                        <Link 
                            v-if="!$page.props.auth?.user"
                            :href="route('login')"
                            class="hidden md:flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 bg-white/40 hover:bg-white/60 rounded-lg border border-gray-200/50 hover:border-gray-300 transition-all duration-200"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Login
                        </Link>

                        <!-- Cadastrar Button - Destacado -->
                        <Link 
                            :href="route('cadastrar')"
                            class="hidden md:flex items-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-pastel-purple to-pastel-pink hover:from-purple-600 hover:to-pink-600 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Cadastrar
                        </Link>

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
                        <!-- Mobile Navigation Links -->
                        <Link 
                            :href="route('home')"
                            class="mobile-nav-link"
                            @click="isMobileMenuOpen = false"
                        >
                            Home
                        </Link>
                        
                        <Link 
                            :href="route('vetgo')"
                            class="mobile-nav-link"
                            @click="isMobileMenuOpen = false"
                        >
                            VetGo
                        </Link>

                        <Link 
                            :href="route('vetgo')"
                            class="mobile-nav-link"
                            @click="isMobileMenuOpen = false"
                        >
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Sobre
                        </Link>

                        <Link 
                            v-if="!$page.props.auth?.user"
                            :href="route('login')"
                            class="mobile-nav-link"
                            @click="isMobileMenuOpen = false"
                        >
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Login
                        </Link>

                        <Link 
                            :href="route('cadastrar')"
                            class="mobile-nav-link-destacado"
                            @click="isMobileMenuOpen = false"
                        >
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Cadastrar
                        </Link>

                        <!-- Mobile Logout -->
                        <button 
                            v-if="$page.props.auth?.user"
                            @click="logout; isMobileMenuOpen = false" 
                            class="mobile-nav-link w-full text-left text-red-600 hover:bg-red-50"
                        >
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
/* Gradiente de fundo pastel */
.bg-gradient-pastel-1 {
    background: linear-gradient(135deg, #f3e8ff 0%, #e0e7ff 25%, #dbeafe 50%, #dcfce7 75%, #fef3cd 100%);
    min-height: 100vh;
}

/* Navigation Links */
.nav-link-pastel {
    display: flex;
    align-items: center;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    border-radius: 0.5rem;
    transition: all 0.2s;
    background: transparent;
}
.nav-link-pastel:hover {
    background: rgba(255,255,255,0.5);
    color: #111827;
}

.nav-link-active {
    background: rgba(255,255,255,0.8);
    color: #111827;
    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.05);
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

.mobile-nav-link-destacado {
    display: flex;
    align-items: center;
    padding: 0.75rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: white;
    border-radius: 0.5rem;
    transition: all 0.2s;
    background: linear-gradient(135deg, #a855f7, #ec4899);
    margin: 0.5rem 0;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}
.mobile-nav-link-destacado:hover {
    background: linear-gradient(135deg, #9333ea, #db2777);
    transform: translateY(-1px);
    box-shadow: 0 6px 8px -1px rgba(0, 0, 0, 0.15);
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
</style>