<script setup></script>
<template>
    <Head :title="` | ${$page.component}`" />
    <Layout>
        <div>
            <span v-if="$page.props.auth.user">
                {{ $page.props.auth.user.name }}
            </span>
            <span v-else> Visitante </span>
        </div>
    </Layout>
</template>
