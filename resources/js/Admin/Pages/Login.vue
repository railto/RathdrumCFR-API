<template>
    <div class="relative flex flex-col justify-center min-h-screen overflow-hidden">
        <div class="w-full p-6 m-auto bg-white rounded shadow-lg ring-2 ring-red-800/50 lg:max-w-md">
            <h1 class="text-3xl font-semibold text-center text-red-700">Rathdrum CFR</h1>

            <form class="mt-6" @submit.prevent="submitLogin">
                <div>
                    <label for="email" class="block text-sm text-gray-800">Email</label>
                    <input type="email" v-model="loginForm.email"
                           class="block w-full px-4 py-2 mt-2 text-red-700 bg-white border rounded-md focus:border-red-400 focus:ring-red-300 focus:outline-none focus:ring focus:ring-opacity-40">
                    <div class="text-red-600 mt-1">
                        <div v-if="validationErrors?.message">
                            {{ validationErrors.message }}
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div>
                        <label for="password" class="block text-sm text-gray-800">Password</label>
                        <input type="password" v-model="loginForm.password"
                               class="block w-full px-4 py-2 mt-2 text-red-700 bg-white border rounded-md focus:border-red-400 focus:ring-red-300 focus:outline-none focus:ring focus:ring-opacity-40">
                        <div class="text-red-600 mt-1">
                            <div v-if="validationErrors?.message">
                                {{ validationErrors.message }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button
                            class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600"
                            :class="{ 'opacity-25': processing }" :disabled="processing">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import useAuth from "../Services/auth";

export default {
    name: "Login",
    setup() {
        const {loginForm, validationErrors, processing, submitLogin} = useAuth();

        return {loginForm, validationErrors, processing, submitLogin};
    }
}
</script>

<style scoped>

</style>
