<template>
    <div>
        <table class="result-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Player Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="result in last5Plays" :key="result.id">
                    <td>{{ result.id }}</td>
                    <td>{{ result.player_name }}</td>
                    <td>{{ formatDateTime(result.created_at) }}</td>
                    <td>{{ formatDateTime(result.updated_at) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props:{
        last5Plays: {
            type: Array,
            required: true,
        }
    },

    methods: {
        formatDateTime(dateTime) {
            // Format the date using moment.js or JavaScript Date object
            // Example using moment.js
            // return moment(dateTime).format('YYYY-MM-DD HH:mm:ss');

            // Example using JavaScript Date object
            const formattedDate = new Date(dateTime).toLocaleString();
            return formattedDate;
        },
    },
};
</script>


<style scoped>
.result-table {
    margin-top: 32px;
  width: 100%;
  border-collapse: collapse;
}

.result-table th,
.result-table td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ccc;
}

.result-table th {
  background-color: #f0f0f0;
}

.result-table tbody tr:hover {
  background-color: #f9f9f9;
}
</style>
