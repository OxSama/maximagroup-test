<template>
    <div>
        <navbar :app-name="appName" :home-url="homeUrl">
            <template v-slot:auth-links>
                <notification-dropdown></notification-dropdown>
                <logout-button :logout-route="logoutRoute"></logout-button>
            </template>
        </navbar>
        <main class="py-4">
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
