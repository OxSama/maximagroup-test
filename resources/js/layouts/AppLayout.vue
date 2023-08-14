<template>
    <Header />
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                <div class="lg:w-3/6"></div>
                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                    <slot></slot>
                </div>
            </div>
        </main>
    </section>
</template>

<script setup>
import Header from '../components/Header.vue'
// import MainContent from '../components/MainContent.vue'


</script>

<style scoped>
/* Add any global styles here */
</style>
