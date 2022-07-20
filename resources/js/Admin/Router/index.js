import {createRouter, createWebHistory} from "vue-router";

import GuestLayout from '../Layouts/Guest.vue';
import AuthenticatedLayout from '../Layouts/Authenticated.vue';

import Dashboard from "../Pages/Dashboard.vue";
import Login from "../Pages/Login.vue";

function auth(to, from, next) {
    if (JSON.parse(localStorage.getItem('loggedIn'))) {
        next();
    }

    next('/admin/login');
}

const routes = [
    {
        component: AuthenticatedLayout,
        beforeEnter: auth,
        children: [
            {
                path: '/admin',
                component: Dashboard,
                name: 'dashboard',
            },
        ]
    },
    {
        path: '/admin',
        redirect: {name: 'login'},
        component: GuestLayout,
        children: [
            {
                path: '/admin/login',
                component: Login,
                name: 'login',
            }
        ]
    }
];

export default createRouter({
    history: createWebHistory(),
    routes,
});