<script setup>
import TableComponent from "./TableComponent.vue";
const columns = ['Name', 'Age', 'Location'];
const tableData = [
        { id: 1, Name: 'John', Age: 25, Location: 'NY' },
        { id: 2, Name: 'Doe', Age: 30, Location: 'LA' }
      ];
</script>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ 'Dashboard' }}</div>

                    <div class="card-body">
                        <!-- hello -->
                        <TableComponent :columns="columns" :tableData="tableData" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
