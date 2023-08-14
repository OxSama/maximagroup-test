<script setup>
import { onMounted, ref, watch } from "vue";
import { useUsersStore } from "../stores/users";
import TableComponent from "../components/TableComponent.vue";
import AuthenticatedLayoutVue from "../layouts/AuthenticatedLayout.vue";


const usersStore = useUsersStore();

onMounted(async () => {
    await usersStore.getUsers();
});

// As usersStore.users is reactive, you don't need a separate ref to watch it.
// However, if you wish to derive some computation from it, you can use computed or watch.
// Given the current scenario, it seems unnecessary.

function handleUpdate(userId) {
    console.log('Update', userId);
    // Implement your update logic here
    // If you have update logic in the store, you can call it here.
}

async function handleDelete(userId) {
    console.log('Delete', userId);
    await usersStore.destroyUser(userId);
    await usersStore.getUsers();
}



</script>

<template>
    <AuthenticatedLayoutVue>
        <TableComponent :users="usersStore.users" @update="handleUpdate" @delete="handleDelete" />
    </AuthenticatedLayoutVue>>
</template>
