<template>
    <div class="flex flex-col h-full bg-gray-100">

        <!-- Navbar Section -->
        <navbar :app-name="appName" :home-url="homeUrl">
            <template v-slot:auth-links>
                <notification-dropdown class="block px-4 py-2 transition-all hover:bg-gray-100"></notification-dropdown>
                <logout-button :logout-route="logoutRoute"
                    class="block px-4 py-2 transition-all hover:bg-gray-100"></logout-button>
            </template>
        </navbar>

        <!-- Main Content Section -->
        <main class="flex-grow py-8 bg-gray-100 shadow-inner">
            <div class="flex justify-center items-center min-h-screen px-4 md:px-8 lg:px-16 xl:px-32">
                <div class="w-full">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="bg-gray-700 text-white font-bold p-5">Dashboard</div>
                        <div class="p-5">
                            <slot></slot>
                        </div>
                    </div>
                </div>
            </div>
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
