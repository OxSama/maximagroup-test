<script setup>
import TableComponent from "./TableComponent.vue";
const userData = [
    {
        id: 1,
        name: "Mo",
        email: "user@example.com",
        email_verified_at: "2013",
        password: "*************",
        created_at: "2013"
    },
    {
        id: 2,
        name: "Mo",
        email: "user@example.com",
        email_verified_at: "2013",
        password: "*************",
        created_at: "2013"
    },
];

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
