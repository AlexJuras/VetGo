<script setup>
import { Link, Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title>VetGo</title>
        <meta head-key="VetGo" name="VetGo" description="Organização que flui, cuidado que se vê!"/>
    </Head>
    <div>
        <header class="bg-indigo-500 text-white">
            <nav class="flex items-center justify-between p-4 max-w-screen-lg mx-auto">
                <div class="space-x-6">
                    <Link href="/"></Link>
                    <Link href="/vetlog"></Link>
                    <a href="/">Home</a>
                    <a href="/vetgo">VetGo</a>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>