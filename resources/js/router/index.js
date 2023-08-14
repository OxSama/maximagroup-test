// Vue Router imports
import { createWebHashHistory, createRouter } from "vue-router";

// Component imports
import EditUserForm from "../components/EditUserForm.vue";
import LoginView from "../views/LoginView.vue";
import RegisterView from "../views/RegisterView.vue";
import UsersView from "../views/DashboardView.vue";

// Define routes
const routes = [
    {
        path: '/',
        name: 'login',
        component: LoginView
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterView
    },
    {
        path: '/users',
        name: 'users.view',
        component: UsersView,
        meta: { requiresAuth: true }
    },
    {
        path: '/edit-user/:userId',
        name: 'usersEdit',
        component: EditUserForm,
        meta: { requiresAuth: true },
        props: true
    }
];



const router = createRouter({
    history: createWebHashHistory(),
    routes
});

// Middleware to check for token
router.beforeEach((to, from, next) => {
    // Check if the route requires authentication
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // Check if token exists
        const token = sessionStorage.getItem('token');
        if (!token) {
            next('/');
        } else {
            next();
        }
    } else {
        next(); // Always call next() at the end
    }
});

// Create and export router instance




export default router;
