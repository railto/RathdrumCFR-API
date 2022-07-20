import './bootstrap';

import {createApp} from "vue";
import App from './App/App.vue';

import router from './App/Router';
import '../css/app.css';

createApp(App).use(router).mount('#app');
