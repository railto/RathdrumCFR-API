<template>
    <div>
        <Header />
        <main class="max-w-7xl min-w-3/4 mx-auto sm:px-6 lg:px-8 flex-grow">
            <RouterView/>
        </main>
    </div>
</template>

<script>
import Header from "../Components/Header.vue";

export default {
    name: "Authenticated",
    components: {Header},
}
</script>

<style scoped>

</style>
