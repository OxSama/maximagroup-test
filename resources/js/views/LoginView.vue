<template>
    <AppLayout>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="mb-10 text-3xl card-header text-bold">
                            Login
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="handleLogin">
                                <div class="mb-3">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Email Address
                                    </label>
                                    <input v-model="email" id="email" type="email"
                                        class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="oxsama@gmail.com" required autocomplete="email" autofocus />
                                    <span v-if="errors.email" class="text-red-700 invalid-feedback">
                                        {{ errors.email }}
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Password
                                    </label>
                                    <input v-model="password" id="password" type="password"
                                        class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required autocomplete="current-password" />
                                    <span v-if="errors.password" class="text-red-800 invalid-feedback">
                                        {{ errors.password }}
                                    </span>
                                </div>

                                <div v-if="errors" class="text-red-800 invalid-feedback">
                                    {{ errors }}
                                </div>

                                <div class="flex items-start mb-6">
                                    <div class="flex items-center h-5">
                                        <input v-model="remember"
                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                            type="checkbox" name="remember" id="remember" />
                                        <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                            for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="flex items-center justify-between w-full">
                                        <button type="submit"
                                            style="background-color: rgb(37 99 235 / var(--tw-bg-opacity));;"
                                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-1/4 px-2 py-2.5 text-center ">
                                            Login
                                        </button>
                                        <a class="btn btn-link" v-if="passwordRequestRoute" :href="passwordRequestRoute">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import router from '../router';
import AppLayout from '../layouts/AppLayout.vue';
import { useAuthStore } from "../stores/main";


const email = ref("");
const password = ref("");
const remember = ref(false);
const errors = ref({});

const authStore = useAuthStore();

const passwordRequestRoute = computed(() => {
    // Replace with your route logic if necessary
    return "/password/request";
});


async function handleLogin() {
    const response = await authStore.login({ email: email.value, password: password.value });
    if (response) router.push("/users");
}



</script>


<style scoped>
/* You can add styles specific to this component here */
</style>
