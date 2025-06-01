<script setup>
import { Link, Head, router } from "@inertiajs/vue3";
import { route } from "../../../vendor/tightenco/ziggy/src/js";

function logout() {
    router.post(route('logout'));
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
    <div>
        <header class="bg-indigo-500 text-white">
            <nav
                class="flex items-center justify-between p-4 max-w-screen-lg mx-auto"
            >
                <span v-if="$page.props.auth.user">
                    {{ $page.props.auth.user.name }}
                </span>
                <span v-else> Visitante </span>
                <!-- ...restante do código... -->
                <div class="space-x-6">
                    <Link :href="route('home')">Home</Link>
                </div>
                <div class="space-x-6">
                    <Link :href="route('vetgo')">VetGo</Link>
                </div>
                <div class="space-x-6">
                    <Link :href="route('cadastrar')">Cadastrar</Link>
                </div>
                <button @click="logout" class="text-white-500">Sair</button>
            </nav>
        </header>

        <main class="p-4">
            <slot />
        </main>
    </div>
</template>
