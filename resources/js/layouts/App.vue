<template>
    <Header v-if="!$route.meta.requiresAuth" />
    <router-view />
    <Footer v-if="!$route.meta.requiresAuth" />
</template>

<script>
import Header from '@/components/Header.vue';
import Footer from '@/components/Footer.vue';

export default {
    name: 'App',
    components: {
        Header,
        Footer,
    },
};
</script>