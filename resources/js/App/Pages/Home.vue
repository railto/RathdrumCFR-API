<template>
    <section class="align-middle justify-center">
        <h2 class="text-center text-2xl">
            We are currently working on a new website,<br />
            but in the mean time you can view a map of our available defibrillators in the Rathdrum area
        </h2>

        <DefibMap class="pt-4" />
    </section>

</template>

<script>
import DefibMap from "../Components/DefibMap.vue";

export default {
    name: "Home",
    components: {DefibMap},
}
</script>

<style scoped>

</style>
