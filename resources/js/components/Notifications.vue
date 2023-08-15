<template>
    <div class="relative inline-block mr-4 text-left">
        <button id="notificationButton" class="text-gray-500 focus:outline-none" @click="toggleDropdown">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
            </svg>
        </button>
        <div v-show="showDropdown"
            class="absolute right-0 z-30 w-32 mt-2 origin-top-right bg-white rounded-md shadow-lg dropdown ring-1 ring-black ring-opacity-5">

            <!-- Check if the notifications array is empty -->
            <div v-if="notifications.length === 0" class="py-1 text-center text-gray-500">
                No new notifications
            </div>

            <!-- Display notifications if they are present -->
            <div v-else class="py-1">
                <a v-for="notification in notifications" :key="notification.id" href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                    {{ notification.message }}
                </a>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showDropdown: false,
            notifications: []
        };
    },
    methods: {
        toggleDropdown() {
            this.showDropdown = !this.showDropdown;
        },
        addNotification(announcement) {
            // console.log(announcement.id);  // Log
            this.notifications.unshift({
                id: announcement.id,
                message: announcement.message
            });
        }
    },
    mounted() {
        // Ensure Pusher and Echo are available
        if (typeof window.Echo !== 'undefined') {
            // console.log(window.Echo);  // Log
            // console.log("Echo is defined");  // Log
            window.Echo.channel('announcements')
                .listen('.announcement', announcement => {
                    // console.log(announcement);
                    this.addNotification(announcement.announcement);
                });
        } else {
            console.log("Echo is not defined");  // Log
        }
    }
};

</script>
