import { createWebHashHistory, createRouter } from "vue-router";
import ExampleComponent from "../components/ExampleComponent.vue"
import EditUserForm from "../components/EditUserForm.vue"


const routes = [
    {
        path: '/',
        name: 'users.index',
        component: ExampleComponent
    },
    {
        path: '/edit-user',
        name: 'users.edit',
        component: EditUserForm
    }
];


export default createRouter({
    history: createWebHashHistory(),
    routes
});
