<template>
    <div class="max-w-4xl mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-6">Animais Cadastrados</h2>
        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nome</th>
                    <th class="py-2 px-4 border-b">Espécie</th>
                    <th class="py-2 px-4 border-b">Idade</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="animal in animals" :key="animal.id">
                    <td class="py-2 px-4 border-b">{{ animal.nome }}</td>
                    <td class="py-2 px-4 border-b">{{ animal.especie }}</td>
                    <td class="py-2 px-4 border-b">{{ animal.data_nascimento }}</td>
                </tr>
            </tbody>
        </table>
        <Link :href="route('animals.create')" class="btn-pastel-primary mt-6 inline-block">Novo Animal</Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({ 
    animals: Array 
})
</script>