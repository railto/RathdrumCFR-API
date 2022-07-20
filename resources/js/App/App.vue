<template>
    <div>
        <Header />
        <RouterView />
        <Footer />
    </div>
</template>

<script>
import Header from "./Components/Header.vue";
import Footer from "./Components/Footer.vue";
export default {
    name: "App",
    components: {Header, Footer}
}
</script>

<style scoped>

</style>
