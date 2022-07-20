import {ref, reactive} from 'vue';
import {useRouter} from 'vue-router';

export default function useAuth() {
    const processing = ref(false);
    const validationErrors = ref({});
    const router = useRouter();
    const loginForm = reactive({
        email: '',
        password: '',
    });

    const submitLogin = async () => {
        if (processing.value) return;

        processing.value = true;
        validationErrors.value = {};

        const loginUser = (response) => {
            localStorage.setItem('loggedIn', JSON.stringify(true))
            router.push({name: 'dashboard'});
        }

        await axios.post('/api/auth/login', loginForm)
            .then(async (response) => {
                loginUser(response);
            })
            .catch((error) => {
                if (error.response?.data) {
                    validationErrors.value.message = error.response.data.message;
                }
            })
            .finally(() => {
                processing.value = false;
            });
    }

    return {loginForm, validationErrors, processing, submitLogin};
};
