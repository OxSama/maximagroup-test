<template>
    <AuthenticatedLayoutVue>
        <div class="w-full max-w-xl mx-auto">
            <h2 class="text-2xl font-bold text-blue-600 my-5 border-b pb-3">
                Edit User Named "{{ user.name }}" with id {{ user.id }}
            </h2>
            <form @submit.prevent="editUser(user.id)">
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-bold text-gray-700">Name:</label>
                    <input type="text" id="name" v-model="user.name" placeholder="Enter Name"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="role" class="block mb-2 text-sm font-bold text-gray-700">Role:</label>
                    <select id="role" v-model="user.role_id"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none focus:outline-none focus:shadow-outline">
                        <option v-for="(role, index) in roles" :key="role.id" :value="index + 1">{{ role }}</option>
                    </select>
                </div>

                <div v-if="errorMessage" class="text-red-500">
                    {{ errorMessage }}
                </div>

                <div class="flex items-center justify-between">
                    <ButtonComponent label="Edit User" type="confirm" @click="editUser" />
                </div>
            </form>
        </div>
    </AuthenticatedLayoutVue>
</template>



<script setup>
import ButtonComponent from './BaseButton.vue';
import AuthenticatedLayoutVue from '../layouts/AuthenticatedLayout.vue';
import { useAuthStore } from '../stores/main';
import { useUsersStore } from '../stores/users';
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import router from '../router';


const route = useRoute();
const userId = ref(route.params.userId);
const user = ref({});
const store = useAuthStore();
const errorMessage = ref('');

const roles = ref(store.roles);

onMounted(async () => {
    try {
        await store.fetchUserData(userId.value);
        user.value = store.user;
        console.log(user.value);
    } catch (error) {
        console.error("Error fetching user:", error.message);
    }
});

async function editUser() {
    try {
        await store.updateUser({name:user.value.name, role_id:user.value.role_id},userId.value);
        // Emit an event, show a success message, or navigate to another route
        await useUsersStore().getUsers();
        router.push("/users");
    } catch (error) {
        errorMessage.value = error.message; // Update the error message from the caught error
    }
}

</script>
