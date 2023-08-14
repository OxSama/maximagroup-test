<template>
    <div>
        <navbar :app-name="appName" :home-url="homeUrl">
            <template v-slot:auth-links>
                <notification-dropdown class="block px-4 py-2 transition-all hover:bg-gray-100"></notification-dropdown>
                <logout-button :logout-route="logoutRoute" class="block px-4 py-2 transition-all hover:bg-gray-100"></logout-button>
            </template>
        </navbar>
        <main class="py-8 bg-gray-100 shadow-inner">
            <slot></slot>
        </main>
    </div>
</template>


<script>
// Component Imports
import Navbar from '@/components/Navbar.vue';
import NotificationDropdown from '@/components/Notifications.vue';
import LogoutButton from '@/components/LogoutButton.vue';

export default {
    components: {
        Navbar,
        NotificationDropdown,
        LogoutButton
    },
    data() {
        return {
            appName: "User Management",
            homeUrl: "/",
            logoutRoute: "/logout"
        };
    }
};
</script>
