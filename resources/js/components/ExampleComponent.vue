<script setup>
import TableComponent from "./TableComponent.vue";
import useUsers from "../composables/Users.js";
import { onMounted,ref,watch } from "vue";



const { users, getUsers} = useUsers();

onMounted(() => {
    getUsers();
});


const userData = ref([]);

const updateUserData = () => {
    userData.value = users.value;
}



watch(users, updateUserData, { immediate: true });

function handleUpdate(userId) {
    console.log('Update', userId);
    // Implement your update logic here
};

function handleDelete(userId) {
    console.log('Delete', userId);
    // Implement your delete logic here
}
</script>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ 'Dashboard' }}</div>

                    <div class="card-body">
                        <!-- hello -->
                        <TableComponent :users="userData" @update="handleUpdate" @delete="handleDelete" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
