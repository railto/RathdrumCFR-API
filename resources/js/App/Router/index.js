import {createRouter, createWebHistory} from 'vue-router';

import Home from '../Pages/Home.vue';
import Contact from "../Pages/Contact.vue";

const routes = [
    {
        path: '/',
        component: Home,
        name: 'home',
    },
    {
        path: '/contact',
        component: Contact,
        name: 'contact',
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});

