<script setup>
import { Link, Head } from '@inertiajs/vue3';
import { route } from '../../../vendor/tightenco/ziggy/src/js';
</script>

<template>
    <Head>
        <meta head-key="VetGo" name="VetGo" description="Organização que flui, cuidado que se vê!"/>
    </Head>
    <div>
        <header class="bg-indigo-500 text-white">
            <nav class="flex items-center justify-between p-4 max-w-screen-lg mx-auto">
                {{ $page.props.auth.user }}
                <div class="space-x-6">
                    <Link :href="route('home')">Home</Link>
                </div>
                <div class="space-x-6">
                    <Link :href="route('vetgo')">VetGo</Link>
                </div>
                <div class="space-x-6">
                    <Link :href="route('cadastrar')">Cadastrar</Link>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>