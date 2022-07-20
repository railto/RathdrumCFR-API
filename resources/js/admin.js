import './bootstrap';

window.axios.defaults.withCredentials = true;
window.axios.interceptors.response.use((response) => {
    return response
}, (error) => {
    if (error.response?.status === 401 || error.response?.status === 419) {
        if (JSON.parse(localStorage.getItem('loggedIn'))) {
            localStorage.setItem('loggedIn', JSON.stringify(false));
            location.assign('/admin/login');
        }
    }

    return Promise.reject(error);
});

import {createApp} from "vue/dist/vue.esm-bundler.js";

import router from './Admin/Router';
import '../css/admin.css';

const app = createApp({});
app.use(router);
app.mount('#admin');
