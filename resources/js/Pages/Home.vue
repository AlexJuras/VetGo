<script setup>
</script>
<template>
    <Head :title="` | ${$page.component}`" />
    <Layout>
        <div>
            <h1>{{ $page.props.auth.user }}</h1>
        </div>
    </Layout>
</template>
