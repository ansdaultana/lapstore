import { createRouter, createWebHistory } from "vue-router";
import Login from '../views/Login.vue'
import Dashboard from '../views/Dashboard.vue'
import RequestReset from '../views/RequestReset.vue'
import Resetpassword from '../views/Resetpassword.vue'
import AppLayout from '../Layouts/AppLayout.vue'
import store from '../store/index.js';
import NotFound from '../views/NotFound.vue';
import Users from '../views/Users.vue';
import Products from '../Products/Products.vue';
import Reports from '../views/Reports.vue';
import NewProduct from '../Products/NewProduct.vue'
import EditProduct from '../Products/editProduct.vue'
import { newProduct } from "../store/actions";
const routes = [
    {
        path: '/',
        name: 'app.dashboard',
        component: Dashboard,
        meta: {
            requiresAuth: true
        }

    },
    {
        path: '/app/dashboard',
        name: 'app.dashboard',
        component: Dashboard,
        meta: {
            requiresAuth: true
        }

    },
    {
        path: '/app/reports',
        name: 'app.reports',
        component: Reports,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/app/users',
        name: 'app.users',
        component: Users,
        meta: {
            requiresAuth: true
        }
    }, {
        path: '/app/products',
        name: 'app.products',
        component: Products,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/app/new-product',
        name: 'newproduct',
        component: NewProduct,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/app/edit-product/:slug',
        name: 'editproduct',
        component: NewProduct,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            requiresGuest: true,
        },
    },
    {
        path: '/request-password',
        name: 'request-password',
        component: RequestReset,

        meta: {
            requiresGuest: true,
        },
    },

    {
        path: '/reset-password/:token',
        name: 'reset-password',
        component: Resetpassword,

        meta: {
            requiresGuest: true,
        },
    },
    {
        path: '/:pathMatch(.*)',
        name: 'notfound',
        component: NotFound,
    }
];
const router = createRouter({
    history: createWebHistory(),
    routes
})


router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: 'login' })
    }
    else if (to.meta.requiresAuth === false && store.state.user.token) {
        next({ name: 'app.dashboard' })

    }
    else {
        next();
    }
})

export default router;