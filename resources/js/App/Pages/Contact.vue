<template>
    <div class="text-center pb-6">
        <p>If you'd like to get in touch with us, please fill in the form below and someone will get back to you as soon as possible.</p>
        <p>Please bear in mind that we are a voluntary organisation and as such there may be a delay in getting back to you.</p>
        <p>Remember, in a medical emergency you should call 999 or 112!</p>
    </div>

    <div class="w-full md:w-96 md:max-w-full mx-auto">
        <div class="p-6 border border-gray-300 sm:rounded-md">
            <form @submit.prevent="submitForm">
                <label class="block mb-6">
                    <span class="text-gray-700">Your name</span>
                    <input
                        type="text"
                        name="name"
                        class="
                            block
                            w-full
                            mt-1
                            border-gray-300
                            rounded-md
                            shadow-sm
                            focus:border-red-300
                            focus:ring
                            focus:ring-red-200
                            focus:ring-opacity-50
                          "
                        placeholder="Joe Bloggs"
                        v-model="contactForm.name"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Email address</span>
                    <input
                        name="email"
                        type="email"
                        class="
                            block
                            w-full
                            mt-1
                            border-gray-300
                            rounded-md
                            shadow-sm
                            focus:border-red-300
                            focus:ring
                            focus:ring-red-200
                            focus:ring-opacity-50
                          "
                        placeholder="joe.bloggs@example.com"
                        required
                        v-model="contactForm.email"
                    />
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Message</span>
                    <textarea
                        name="message"
                        class="
                            block
                            w-full
                            mt-1
                            border-gray-300
                            rounded-md
                            shadow-sm
                            focus:border-red-300
                            focus:ring
                            focus:ring-red-200
                            focus:ring-opacity-50
                          "
                        rows="3"
                        placeholder="Tell us what you're thinking about..."
                        v-model="contactForm.message"
                    ></textarea>
                </label>
                <div class="mb-6">
                    <button
                        type="submit"
                        class="
                            h-10
                            px-5
                            text-red-100
                            bg-red-700
                            rounded-lg
                            transition-colors
                            duration-150
                            focus:shadow-outline
                            hover:bg-red-800
                          "
                        :class="{ 'opacity-25': processing }" :disabled="processing"
                    >
                        Contact Us
                    </button>
                </div>
                <div>
                    <div class="text-gray-700 text-right text-xs" @click="resetContactForm">
                        Reset Form
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import useContact from "../Services/contact";

export default {
    name: "Contact",
    setup() {
        const {processing, successMessage, validationErrors, contactForm, submitForm, resetContactForm} = useContact();

        return {processing, successMessage, validationErrors, contactForm, submitForm, resetContactForm};
    }
}
</script>

<style scoped>

</style>
