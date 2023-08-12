<template>
    <div class="container mx-auto p-6">
      <table class="min-w-full leading-normal">
        <thead>
          <tr>
            <th v-for="column in columns" :key="column" class="px-5 py-3 border-b-2 border-gray-200 bg-gray-800 text-left text-xs font-semibold text-white uppercase tracking-wider">
              {{ column }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="row in tableData" :key="row.id">
            <td v-for="column in columns" :key="column" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              {{ row[column] }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script>
  export default {
    props: {
      columns: {
        type: Array,
        required: true
      },
      tableData: {
        type: Array,
        required: true
      }
    }
  };
  </script>

  <style scoped>
  /* Add any additional styles you might need here */
  </style>
