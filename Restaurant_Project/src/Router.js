import { createRouter, createWebHistory } from 'vue-router/auto';
import HomePage from './components/HomePage.vue';
import Signup from './components/SignUp.vue';
import LoginPage from './components/LoginPage.vue';

import Update from './components/Update.vue'
import Addr from './components/Add.vue'

const routes = [
    {
        name: "Home",
        component: HomePage,
        path: '/Home'
    },
    {
        name: "SignUp",
        component: Signup,
        path: "/Signup"
    },
    {
        name: "LoginPage",
        component: LoginPage,
        path: '/LoginPage'
    },
    
    {
        name: "Restourant_Update",
        component:Update,
        path: "/restourant/update/:id"
    },
    {
        name:"Add-page",
        component:Addr,
        path:'/Addr'
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
