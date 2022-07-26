<template>
    <div>
        <vue-notification-list position="top-right"></vue-notification-list>
        <Header/>
        <main class="max-w-7xl min-w-3/4 mx-auto sm:px-6 lg:px-8 flex-grow">
            <RouterView/>
        </main>
        <Footer/>
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
