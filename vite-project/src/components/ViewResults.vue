<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Player Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="player in results.data" :key="player.id">
                    <td>{{ player.id }}</td>
                    <td>{{ player.player_name }}</td>
                    <td>{{ formatDate(player.created_at) }}</td>
                    <td>{{ formatDate(player.updated_at) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="pagination">
            <button @click="prevPage" :disabled="!results.prev_page_url">Prev</button>
            <button v-for="page in results.last_page" :key="page" @click="goToPage(page)"
                :class="{ 'current-page': currentPage === page, 'page': true }">
                {{ page }}
            </button>

            <button @click="nextPage" :disabled="!results.next_page_url">Next</button>
        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            results: {},
            currentPage: 1,
            itemsPerPage: 10
        };
    },

    created() {
        this.fetchData();
    },

    methods: {
        fetchData() {
            axios.get(`http://localhost:8000/api/results?page=${this.currentPage}&itemsPerPage=${this.itemsPerPage}`)
                .then(response => {
                    this.results = response.data.results;
                });
        },

        prevPage() {
            if (this.results.prev_page_url) {
                this.currentPage--;
                this.fetchData();
            }
        },

        nextPage() {
            if (this.results.next_page_url) {
                this.currentPage++;
                this.fetchData();
            }
        },

        goToPage(page) {
            this.currentPage = page;
            this.fetchData();
        },

        formatDate(date) {
            const formattedDate = new Date(date);
            return formattedDate.toLocaleString();
        }
    }
}
</script>

<style scoped>
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    border: 1px solid #000;
    padding: 10px;
}

.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination button {
    margin: 0 5px;
}

.page{
    padding: 0px 16px;
    background-color: #ddd;
    color: black;
}

.current-page {
    background-color: #9499ff;
    color: black;
}
</style>
