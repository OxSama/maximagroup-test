import { defineStore } from "pinia";
import axios from "axios";
import { useToast } from 'vue-toast-notification';


axios.defaults.baseURL = '/api';

export const useAuthStore = defineStore("auth", {
    state: () => ({
        user: {
            id: null,
            email: null,
            name: null,
            role: null,
            role_id: null,
        },
        token: sessionStorage.getItem('token') || null,
        roles: ["admin", "user"]
    }),
    actions: {
        async login(credentials) {

            try {
                const response = await axios.post('/login', credentials, { excludeToken: true });
                console.log(response);
                if (response.data) {
                    sessionStorage.setItem('token', response.data.token);
                    useToast().open({ message: 'Logged In ! ', position: 'bottom-right', type: 'success' });
                    this.token = response.data.token;
                    this.user = response.data.user;
                    return true;
                }
                else {
                    if (response.status !== 200) {
                        console.log(`Error: ${response.statusText}`);
                        throw new Error(response.data.data);
                    }
                    if (response.data.code !== 200) {
                        console.log(`Error: ${response.data.message}`);
                        throw new Error(response.data.message);
                    }
                }
            } catch (error) {
                console.log(error);
                useToast().open({ message:  error.response.data.error, position: 'bottom-right', type: 'error' });
            }
        },
        logout() {
            sessionStorage.removeItem('token');
            this.token = null;
            this.user = {
                id: null,
                email: null,
                name: null,
                role: null,
                role_id: null,
            };
        },
        async register(credentials) {
            try {
                const response = await axios.post('/register', credentials, { excludeToken: true });

                if (response.status === 201 && response.data.token && response.data.user) {
                    sessionStorage.setItem('token', response.data.token);
                    useToast().open({ message: 'Logged In !', position: 'bottom-right', type: 'success' });
                    this.token = response.data.token;
                    this.user = response.data.user;
                    return { success: true };
                } else {
                    console.log(`Error: ${response.data.message || 'Unexpected response structure'}`);
                    throw new Error(response.data.message || 'Unexpected response structure');
                }

            } catch (error) {
                return {
                    success: false,
                    data: error.response.data,
                    message: error.message
                };
            }
        },
        async fetchUserData() {
            if (this.token) {
                try {
                    const response = await axios.get('/user');
                    this.user = response.data;
                } catch (error) {
                    if (error.response && error.response.data) {
                        throw new Error(error.response.data.message || 'Error fetching user data');
                    } else {
                        throw new Error('Unable to fetch user data. Please try again.');
                    }
                }
            }
        }
    }
});
