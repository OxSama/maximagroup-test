<template>
    <AppLayout>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="mb-1 text-xl text-center card-header text-bold">Register</div>

                        <div class="card-body">
                            <form @submit.prevent="handleSubmit">
                                <FormInput v-model="form.name" id="name" type="name" placeholder="Name"
                                    @error="handleError('name')" />
                                <div v-if="formErrors.name" class="text-red-500">{{ formErrors.name[0] }}</div>
                                <FormInput v-model="form.email" id="email" type="email" placeholder="Email Address"
                                    @error="handleError('email')" />
                                <div v-if="formErrors.email" class="text-red-500">{{ formErrors.email[0] }}</div>

                                <FormInput v-model="form.password" id="password" type="password" placeholder="Password"
                                    @error="handleError('password')" />
                                <div v-if="formErrors.password" class="text-red-500">{{ formErrors.password[0] }}</div>

                                <FormInput v-model="form.password_confirmation" id="password-confirm" type="password"
                                    placeholder="Confirm Password" />
                                <div v-if="formErrors.password_confirmation" class="text-red-500">{{ formErrors.password_confirmation[0] }}</div>


                                <div class="mb-0">
                                    <div class="flex justify-start">
                                        <button type="submit"
                                            class="px-5 py-2 text-white transition duration-200 ease-in-out transform bg-green-700 rounded shadow-sm hover:bg-green-600 focus:bg-green-700 ">
                                            Register
                                        </button>
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
import FormInput from '../components/FormInput.vue';
import AppLayout from '../layouts/AppLayout.vue';
import { useAuthStore } from '../stores/main';
import { reactive } from 'vue';
import router from '../router';

const formErrors = reactive({
    name: null,
    email: null,
    password: null,
    password_confirmation: null
});


const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
});

const authStore = useAuthStore();
const handleSubmit = async () => {
    const result = await authStore.register(form);

    if (result.success) {
        // Clear form if registration is successful
        form.name = "";
        form.email = "";
        form.password = "";
        form.password_confirmation = "";

        router.push("/users");

    } else {
        console.log(result.message); // Logs the error message
        if (result.data && result.data.errors) {
            Object.assign(formErrors, result.data.errors);
        } else {
            useToast().open({ message: result.message, position: 'bottom-right', type: 'error' });
            console.log(result.message);
        }
    }
};

</script>

<style scoped>
button[type='submit'] {
    background-color: rgb(21 128 61 / var(--tw-bg-opacity));
    opacity: var(--tw-bg-opacity);
}
</style>
