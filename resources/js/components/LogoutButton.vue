<template>
    <div class="inline-flex items-center justify-center space-x-2 text-gray-700 hover:text-gray-900">
        <div class="py-1">
            <a :href="logoutRoute" @click.prevent="logout"
                class="block px-4 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                Logout
            </a>
        </div>
    </div>
</template>

<script>
import { useAuthStore } from '../stores/main';
export default {
    props: {
        logoutRoute: {
            type: String,
            required: true
        }
    },
    data(){
        return {
            authStore: useAuthStore()
        }
    },
    methods: {
        logout() {
            this.authStore.logout();
            this.$router.push("/");
        }
    }
};
</script>
