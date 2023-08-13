<template>
    <div>

        <div class="w-full overflow-x-auto">
            <div class="mb-10">
                <button @click="openModal" class="bg-blue-500 text-white px-4 py-2 rounded">Open Modal</button>
                <ConfirmModal :show="showModal" @close-modal="closeModal" @confirm="onConfirm" @cancel="onCancel" />
            </div>
            <table class="min-w-full bg-white table-auto">
                <thead>
                    <tr>
                        <th class="py-2 px-3 border">ID</th>
                        <th class="py-2 px-3 border">Name</th>
                        <th class="py-2 px-3 border">Email</th>
                        <th class="py-2 px-3 border">Email Verified At</th>
                        <th class="py-2 px-3 border">created_at</th>
                        <th class="py-2 px-3 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td class="py-2 px-3 border">{{ user.id }}</td>
                        <td class="py-2 px-3 border">{{ user.name }}</td>
                        <td class="py-2 px-3 border">{{ user.email }}</td>
                        <td class="py-2 px-3 border">{{ user.email_verified_at }}</td>
                        <td class="py-2 px-3 border">{{ user.created_at }}</td>
                        <td class="py-2 px-3 border">
                            <div class="flex w-full flex-row justify-around">
                                <router-link to="/edit-user"
                                    class="px-4 py-2 bg-blue-500 text-white rounded">Update</router-link>
                                <ButtonComponent label="Delete" @click="deleteUser(user.id)"
                                    styleClass="px-4 py-2 bg-red-500 text-white rounded ml-2" />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import ButtonComponent from './BaseButton.vue';
import ButtonsWrapper from './BaseButtons.vue';
import ConfirmModal from "./CardBoxModal.vue";

export default {
    components: {
        ButtonComponent,
        ButtonsWrapper,
        ConfirmModal
    },
    data() {
        return {
            showModal: false
        };
    },
    props: {
        users: {
            type: Array,
            required: true
        }
    },
    methods: {
        updateUser(userId) {
            this.$emit('update', userId);
        },
        deleteUser(userId) {
            this.$emit('delete', userId);
        },
        openModal() {
            this.showModal = true;
            console.log(this.showModal);
        },
        closeModal() {
            this.showModal = false;
        },
        onConfirm() {
            console.log('Confirmed');
            // Implement your logic on confirmation here
        },
        onCancel() {
            console.log('Cancelled');
        }

    }
}
</script>

<style scoped>
/* Add any additional styles you might need here */
</style>
