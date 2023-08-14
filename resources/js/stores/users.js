import { defineStore } from 'pinia';
import axios from 'axios';
import { useToast } from 'vue-toast-notification';

export const useUsersStore = defineStore({
    // unique id of the store across your application
    id: 'users',

    state: () => ({
        users: []
    }),

    actions: {
        async getUsers() {
            try {
                const response = await axios.get("/users");
                if (response.status === 200 && response.data.data) {
                    this.users = response.data.data;
                    return { success: true, data: this.users };
                } else {
                    console.log(`Error: ${response.data.message || 'Unexpected response structure'}`);
                    throw new Error(response.data.message || 'Unexpected response structure');
                }
            } catch (error) {
                useToast().open({ message: `Error fetching users: ${error.message}`, position: 'bottom-right', type: 'error' });
            }
        },

        async destroyUser(id) {
            try {
                const response = await axios.delete("/users/" + id);
                // console.log(response)
                if (response.status === 204) { // or whatever success status code the DELETE endpoint returns
                    useToast().open({ message: 'User deleted successfully', position: 'bottom-right', type: 'success' });
                    return { success: true };
                } else {
                    console.log(`Error: ${response.data.message || 'Unexpected response structure'}`);
                    throw new Error(response.data.message || 'Unexpected response structure');
                }
            } catch (error) {
                // useToast().open({ message: `Error deleting user: ${error.message}`, position: 'bottom-right', type: 'error' });
            }
        }
    }

});
