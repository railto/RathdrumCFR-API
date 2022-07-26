import {ref, reactive} from 'vue';
import {useRouter} from 'vue-router';

const user = reactive({
    name: '',
    email: '',
});

export default function useAuth() {
    const router = useRouter();
    const validationErrors = ref({});
    const processing = ref(false);

    const loginForm = reactive({
        email: '',
        password: '',
    });

    const submitLogin = async () => {
        if (processing.value) return;

        processing.value = true;
        validationErrors.value = {};

        await axios.post('/api/auth/login', loginForm)
            .then(async (response) => {
                await loginUser(response);
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

    const loginUser = async (response) => {
        user.name = response.data.user.name;
        user.email = response.data.user.email;

        localStorage.setItem('loggedIn', JSON.stringify(true))
        localStorage.setItem('token', response.data.token);
        await router.push({name: 'dashboard'});
    }

    return {loginForm, validationErrors, processing, submitLogin, user};
};
