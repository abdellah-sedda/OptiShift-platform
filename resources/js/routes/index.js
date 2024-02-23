import { createWebHistory, createRouter } from "vue-router";
import store from '../store';
import Login from '../pages/auth/Login.vue';
import Register from '../pages/auth/Register.vue';
import Dashboard from '../pages/Dashboard.vue';
import Profile from '../pages/Profile.vue';
import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Orders from '../pages/Orders.vue';
import OrderCreate from '../pages/OrderCreate.vue';
import Order from '../pages/Order.vue';
import Packages from '../pages/Packages.vue';
import PackageCreate from '../pages/PackageCreate.vue';
import Clients from '../pages/Clients.vue';
import Deliverymans from '../pages/Deliverymans.vue';


const isAuthenticated = () => {
    // Your authentication logic here, e.g., check if the user is logged in
    // For example, you can check if there is a token in localStorage
    return store.state.auth.authenticated;
};


const router = createRouter({
    history: createWebHistory(),
    routes: [
        { 
            path: '/', 
            name: 'Home',
            component: Home 
        },
        {
            path: '/about',
            name: 'About',
            component: About
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/register',
            name: 'Register',
            component: Register
        },
        {
            path: '/dashboard',
            name: 'Dashboard',
            component: Dashboard,
            meta: { requiresAuth: true }
        },
        {
            path: '/profile',
            name: 'Profile',
            component: Profile,
            meta: { requiresAuth: true }
        },
        {
            path: '/orders',
            name: 'Orders',
            component: Orders,
            meta: { requiresAuth: true }
        },
        {
            path: '/order/create',
            name: 'OrderCreate',
            component: OrderCreate,
            meta: { requiresAuth: true }
        },
        {
            path: '/order/:id',
            name: 'Order',
            component: Order,
            meta: { requiresAuth: true }
        },
        {
            path: '/packages',
            name: 'Packages',
            component: Packages,
            meta: { requiresAuth: true }
        },
        {
            path: '/package/create',
            name: 'PackageCreate',
            component: PackageCreate,
            meta: { requiresAuth: true }
        },
        {
            path: '/clients',
            name: 'Clients',
            component: Clients,
            meta: { requiresAuth: true }
        },
        {
            path: '/deliverymans',
            name: 'Deliverymans',
            component: Deliverymans,
            meta: { requiresAuth: true }
        },
    ],
});


router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // This route requires authentication
        if (!isAuthenticated()) {
            // User is not authenticated, redirect to login page
            next({ name: 'Login' });
        } else {
            // User is authenticated, proceed to the route
            next();
        }
    } else {
        // This route doesn't require authentication, proceed normally
        next();
    }
});


export default router;
