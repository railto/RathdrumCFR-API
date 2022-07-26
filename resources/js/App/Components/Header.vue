<template>
    <header class="bg-red-700">
        <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center text-gray-100 mb-8">
            <div class="flex items-center justify-between">
                <a href="/" class="text-md font-semibold md:text-2xl">
                    Rathdrum Community First Responders
                </a>
                <!-- Mobile menu button -->
                <div @click="toggleMenu" class="flex md:hidden">
                    <button type="button"
                            class="focus:outline-none">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                  d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <ul :class="showMenu ? 'flex' : 'hidden'" class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0 text-md font-semibold md:text-lg">
                <li>
                    <router-link :to="{name: 'home'}" @click="showMenu = false">
                        Home
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'contact'}" @click="showMenu = false">
                        Contact Us
                    </router-link>
                </li>
            </ul>
        </nav>
    </header>
</template>

<script>
import {ref} from 'vue'

export default {
    setup() {
        let showMenu = ref(false);

        const toggleMenu = () => {
            showMenu.value = !showMenu.value;
        }

        return {showMenu, toggleMenu}
    }
}
</script>

<style scoped>

</style>
