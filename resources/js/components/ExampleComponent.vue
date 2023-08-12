<script setup>
import TableComponent from "./TableComponent.vue";
</script>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ 'Dashboard' }}</div>

                    <div class="card-body">
                        <!-- hello -->
                        <TableComponent />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
