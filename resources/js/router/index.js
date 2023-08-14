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
        component: UsersView
    },
    {
        path: '/edit-user',
        name: 'users.edit',
        component: EditUserForm
    }
];

// Create and export router instance
export default createRouter({
    history: createWebHashHistory(),
    routes
});
