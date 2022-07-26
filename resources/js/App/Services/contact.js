import {ref, reactive} from 'vue';
import {useNotificationStore} from '@dafcoe/vue-notification'

export default function useContact() {
    const {setNotification} = useNotificationStore()
    const processing = ref(false);
    const validationErrors = ref({});
    const successMessage = ref(false);
    const contactForm = reactive({
        name: '',
        email: '',
        message: '',
    });

    const resetContactForm = () => {
        Object.assign(contactForm, {
            name: '',
            email: '',
            message: '',
        });
    }

    const submitForm = async () => {
        if (processing.value) return;

        processing.value = true;
        validationErrors.value = {};

        await axios.post('/api/contact', contactForm)
            .then(async (res) => {
                if (res.data.data.success === true) {
                    resetContactForm();

                    setNotification({
                        message: 'Your message has been successfully sent, thank you for getting in touch',
                        type: 'success',
                        showIcon: true,
                        dismiss: {
                            'manually': true,
                            'automatically': true
                        },
                        duration: 10000,
                        showDurationProgress: true,
                        appearance: 'light'
                    });
                }
            })
            .catch((error) => {
                console.error(error);
            })
            .finally(() => {
                processing.value = false;
            });
    }
    return {processing, validationErrors, successMessage, contactForm, submitForm, resetContactForm};
};
