<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
    faculdade: String,
});
</script>

<template>
    <Head title=" | Sobre Nós" />

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-teal-100 py-10">
        <div class="bg-white shadow-2xl rounded-3xl p-10 max-w-2xl w-full border border-teal-200">
            <h1 class="text-3xl font-extrabold text-teal-700 mb-4 text-center">
                Bem-vindo ao <span class="text-blue-600">VetGo</span>
            </h1>
            <p class="text-gray-700 text-lg mb-6 text-center">
                Um projeto desenvolvido com dedicação por alunos da <span class="font-semibold text-teal-800">{{ faculdade }}</span> de Parnaíba, com o objetivo de modernizar e facilitar o gerenciamento das consultas da clínica veterinária acadêmica.
            </p>
            <p class="text-gray-600 mb-6">
                A ideia surgiu a partir da necessidade de tornar mais eficiente o agendamento, acompanhamento e organização dos atendimentos realizados pelos alunos nos plantões práticos da faculdade. Diante disso, criamos uma plataforma digital intuitiva e funcional que integra alunos, professores e coordenadores em um único ambiente virtual.
            </p>
            <p class="text-gray-600 mb-6">
                O <span class="text-blue-600 font-semibold">VetGo</span> não é apenas uma ferramenta tecnológica: é um reflexo do compromisso com a inovação e a qualidade no ensino prático da medicina veterinária. Nosso sistema permite:
            </p>
            <ol class="space-y-2 mb-8">
                <li class="flex items-center gap-2 text-teal-800 font-medium"><span class="text-teal-500">✔</span> Agendamento online de consultas</li>
                <li class="flex items-center gap-2 text-teal-800 font-medium"><span class="text-teal-500">✔</span> Lembretes e notificações automatizadas</li>
                <li class="flex items-center gap-2 text-teal-800 font-medium"><span class="text-teal-500">✔</span> Controle de histórico de atendimentos</li>
                <li class="flex items-center gap-2 text-teal-800 font-medium"><span class="text-teal-500">✔</span> Gestão de disponibilidade de alunos e professores</li>
                <li class="flex items-center gap-2 text-teal-800 font-medium"><span class="text-teal-500">✔</span> Relatórios e análise de dados para melhor tomada de decisão</li>
            </ol>
            <p class="text-gray-700 text-base text-center">
                Nosso propósito vai além do ambiente acadêmico — queremos preparar futuros profissionais com soluções reais e inspirar mudanças positivas na forma como a clínica veterinária se relaciona com seus pacientes e tutores.<br>
                <span class="font-semibold text-teal-800">Venha conhecer conosco um novo tempo para a clínica veterinária da {{ faculdade }}.</span><br>
                <span class="text-blue-600 font-bold">Juntos, cuidando com tecnologia e carinho.</span>
            </p>
        </div>
    </div>
</template>
