<template>
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

<script>
export default {
    // Props and methods go here
}
</script>

<style scoped>
/* Styles specific to this component */
</style>
