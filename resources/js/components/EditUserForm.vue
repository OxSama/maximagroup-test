<template>
    <div class="w-full max-w-xl mx-auto">
        <form @submit.prevent="editUser">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" v-model="user.name" placeholder="Enter Name"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" v-model="user.email" placeholder="Enter Email"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                <input type="password" id="password" v-model="user.password" placeholder="Enter Password"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-6">
                <label for="confirmPassword" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password:</label>
                <input type="password" id="confirmPassword" v-model="user.confirmPassword" placeholder="Confirm Password"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <ButtonComponent label="Edit User" type="confirm" @click="editUser" />
            </div>
        </form>
    </div>
</template>


<script>
import ButtonComponent from './BaseButton.vue';

export default {
    components: {
        ButtonComponent
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
