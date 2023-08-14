<template>
    <div>

        <div class="w-full overflow-x-auto">
            <div class="mb-10">
                <ConfirmModal :show="showModal" @close-modal="closeModal" @confirm="onConfirm" @cancel="onCancel"
                    message="Are you sure you want to delete this user?" />
            </div>
            <div class="my-4 flex items-center">
                <label for="itemsPerPage" class="mr-4 font-medium text-gray-700">Items per page:</label>
                <div class="relative">
                    <select id="itemsPerPage" v-model="itemsPerPage" @change="updateItemsPerPage($event)"
                        class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M5.293 9.293a1 1 0 0 1 1.414 0L10 12.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" />
                        </svg>
                    </div>
                </div>
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
                    <tr v-for="user in paginatedUsers" :key="user.id">
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
            <div class="mt-4">
                <button v-for="page in totalPages" :key="page"
                    :class="{ 'bg-blue-500 text-white': currentPage === page, 'text-blue-500': currentPage !== page }"
                    class="px-3 py-2 mx-1 rounded" @click="changePage(page)">
                    {{ page }}
                </button>
            </div>
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
            userIdToDelete: null,
            currentPage: 1,
            itemsPerPage: 10
        };
    },
    props: {
        users: {
            type: Array,
            required: true
        }
    },
    computed: {
        paginatedUsers() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.users.slice(start, end);
        },
        totalPages() {
            return Math.ceil(this.users.length / this.itemsPerPage);
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
        },
        changePage(page) {
            this.currentPage = page;
        },
        updateItemsPerPage(event) {
            this.itemsPerPage = parseInt(event.target.value, 10);
            this.currentPage = 1;
        }
    }
}
</script>

<style scoped>
/* Add any additional styles you might need here */
</style>
