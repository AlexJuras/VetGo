<script setup>
defineProps({
    faculdade: String,
});
</script>
<template>
    <Head title=" | Sobre Nós"/>
    <div>
        <h1>
            Bem-vindo ao VetGo , um projeto desenvolvido com dedicação por
            alunos da {{ faculdade }} de Parnaíba, com o objetivo de modernizar
            e facilitar o gerenciamento das consultas da clínica veterinária
            acadêmica. A ideia surgiu a partir da necessidade de tornar mais
            eficiente o agendamento, acompanhamento e organização dos
            atendimentos realizados pelos alunos nos plantões práticos da
            faculdade. Diante disso, criamos uma plataforma digital intuitiva e
            funcional que integra alunos, professores e coordenadores em um
            único ambiente virtual. O VetGo não é apenas uma ferramenta
            tecnológica: é um reflexo do compromisso com a inovação e a
            qualidade no ensino prático da medicina veterinária. Nosso sistema
            permite:
        </h1>
        <ol class="text-1xl font-bold">
            <li>Agendamento online de consultas</li>
            <li>Lembretes e notificações automatizadas</li>
            <li>Controle de histórico de atendimentos</li>
            <li>Gestão de disponibilidade de alunos e professores</li>
            <li>Relatórios e análise de dados para melhor tomada de decisão</li>
        </ol>
        <h1>
            Nosso propósito vai além do ambiente acadêmico — queremos preparar
            futuros profissionais com soluções reais e inspirar mudanças
            positivas na forma como a clínica veterinária se relaciona com seus
            pacientes e tutores. Venha conhecer conosco um novo tempo para a
            clínica veterinária da {{ faculdade }}. Juntos, cuidando com
            tecnologia e carinho.
        </h1>
    </div>
</template>
