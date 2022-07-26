import './bootstrap';

import {createApp} from 'vue';
import VueGoogleMaps from '@fawmi/vue-google-maps';

import App from './App/App.vue';
import router from './App/Router';
import '../css/app.css';

const app = createApp(App);
app.use(router);
app.use(VueGoogleMaps, {
    load: {
        key: import.meta.env.VITE_GOOGLE_MAPS_KEY,
    },
});

app.mount('#app');
