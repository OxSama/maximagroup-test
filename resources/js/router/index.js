import { createWebHashHistory, createRouter } from "vue-router";
import ExampleComponent from "../components/ExampleComponent.vue"


const routes = [
    {
        path: '/',
        name:'',
        component: ExampleComponent
    }
];


export default createRouter({
    history: createWebHashHistory(),
    routes
});