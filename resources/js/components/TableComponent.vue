<template>
    <div>

        <div class="w-full overflow-x-auto">
            <div class="mb-10">
                <ConfirmModal :show="showModal" @close-modal="closeModal" @confirm="onConfirm" @cancel="onCancel"
                    message="Are you sure you want to delete this user?" />
            </div>
            <table class="min-w-full bg-white table-auto">
                <thead>
                    <tr>
                        <th class="px-3 py-2 border">ID</th>
                        <th class="px-3 py-2 border">Name</th>
                        <th class="px-3 py-2 border">Email</th>
                        <th class="px-3 py-2 border">Email Verified At</th>
                        <th class="px-3 py-2 border">created_at</th>
                        <th class="px-3 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td class="px-3 py-2 border">{{ user.id }}</td>
                        <td class="px-3 py-2 border">{{ user.name }}</td>
                        <td class="px-3 py-2 border">{{ user.email }}</td>
                        <td class="px-3 py-2 border">{{ user.email_verified_at }}</td>
                        <td class="px-3 py-2 border">{{ user.created_at }}</td>
                        <td class="px-3 py-2 border">
                            <div class="flex flex-row justify-around w-full">
                                <router-link to="/edit-user"
                                    class="px-4 py-2 text-white bg-blue-500 rounded">Update</router-link>
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
            showModal: false,
            userIdToDelete: null
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
            this.userIdToDelete = userId;  // Store the user id temporarily
            this.openModal();
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
            this.$emit('delete', this.userIdToDelete);
            this.userIdToDelete = null; // Clear the user id
            this.closeModal(); // Close the modal
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
