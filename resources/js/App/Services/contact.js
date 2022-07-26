import {ref, reactive} from 'vue';

export default function useContact() {
    const processing = ref(false);
    const validationErrors = ref({});
    const successMessage = ref(false);
    const contactForm = reactive({
        name: '',
        email: '',
        message: '',
    });

    const submitForm = async () => {
        if (processing.value) return;

        processing.value = true;
        validationErrors.value = {};

        await axios.post('/api/contact', contactForm)
            .then(async (res) => {
                successMessage.value = true;
            })
            .catch((error) => {
                console.error(error);
            })
            .finally(() => {
                processing.value = false;
            });
    }

    return {processing, validationErrors, successMessage, contactForm, submitForm};
};
