<template>
    <nav class="bg-white shadow-sm">
        <div class="container px-6 py-3 mx-auto">
            <div class="flex items-center justify-between">
                <!-- Logo / App Name -->
                <a :href="homeUrl" class="text-xl font-bold text-gray-800 transition-all hover:text-gray-900">{{ appName
                }}</a>

                <!-- Mobile Menu Button & Dropdown -->
                <div class="relative md:hidden">
                    <button @click="isDropdownOpen = !isDropdownOpen"
                        class="p-2 text-gray-500 transition-all rounded hover:bg-gray-100 hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                        </svg>
                    </button>

                    <!-- Dropdown overlay for mobile -->
                    <div v-if="isDropdownOpen" class="fixed inset-0 bg-black opacity-40" @click="isDropdownOpen = false">
                    </div>

                    <div v-if="isDropdownOpen"
                        class="absolute right-0 z-50 w-48 mt-3 bg-white border border-gray-300 rounded-md shadow-lg">
                        <slot name="auth-links"></slot>
                    </div>
                </div>

                <!-- Desktop Nav Links -->
                <div class="items-center hidden md:flex">
                    <!-- Placeholder for left side of navbar -->

                    <!-- Right Side of Navbar -->
                    <div class="ml-auto space-x-4">
                        <slot name="auth-links"></slot>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    props: {
        appName: {
            type: String,
            default: "User Management"
        },
        homeUrl: {
            type: String,
            default: "/"
        }
    },
    data() {
        return {
            isDropdownOpen: false
        };
    }
};
</script>
