<template>
    <section class="px-8 py-4">
        <header class="container flex justify-between mx-auto mb-6 align-center">
            <h1>
            </h1>
            <h1 class="cursor-pointer">
                <router-link :to="currentRoute" class="px-4 py-1 mr-4 text-xl rounded border-slate-800 text-slate-800">
                    {{ routeLabel }}
                </router-link>
            </h1>
        </header>
    </section>
</template>

<script>
export default {
    computed: {
        homeRoute() {
            return this.$route.name === 'home' ? '#' : '/home';
        },
        currentRoute() {
            return this.$route.name === 'register' ? '/' : '/register';
        },
        routeLabel() {
            return this.$route.name === 'register' ? 'Login' : 'Register';
        }
    }
}
</script>

<style scoped>
/* Styles specific to this component */
</style>
