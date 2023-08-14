<template>
    <AuthenticatedLayoutVue>
        <div class="w-full max-w-xl mx-auto">
            <form @submit.prevent="editUser">
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-bold text-gray-700">Name:</label>
                    <input type="text" id="name" v-model="user.name" placeholder="Enter Name"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-bold text-gray-700">Email:</label>
                    <input type="email" id="email" v-model="user.email" placeholder="Enter Email"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-bold text-gray-700">Password:</label>
                    <input type="password" id="password" v-model="user.password" placeholder="Enter Password"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-6">
                    <label for="confirmPassword" class="block mb-2 text-sm font-bold text-gray-700">Confirm
                        Password:</label>
                    <input type="password" id="confirmPassword" v-model="user.confirmPassword"
                        placeholder="Confirm Password"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <div class="flex items-center justify-between">
                    <ButtonComponent label="Edit User" type="confirm" @click="editUser" />
                </div>
            </form>
        </div>
    </AuthenticatedLayoutVue>
</template>


<script>
import ButtonComponent from './BaseButton.vue';
import AuthenticatedLayoutVue from '../layouts/AuthenticatedLayout.vue';

export default {
    components: {
        ButtonComponent,
        AuthenticatedLayoutVue
    },
    props: {
        userData: {
            type: Object,
            default: () => ({
                name: '',
                email: '',
                password: '',
                confirmPassword: ''
            })
        }
    },
    data() {
        return {
            user: { ...this.userData }
        };
    },
    methods: {
        editUser() {
            if (this.user.password !== this.user.confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            // You can make an API call here to update the user data in the database.
            // As before, in a real-world scenario, handle with proper validation, error handling, and feedback.

            this.$emit('user-edited', this.user); // Emit an event with the updated user data
        }
    }
}
</script>
