<script>
import Game from './components/Game.vue'
import axios from 'axios';

import { mapState } from 'vuex'

export default {
    data() {
        return {
            dataFromLaravel: null,
        };
    },
    name: 'App',
    components: {
        Game
    },
    computed: {
        ...mapState(['user'])
    },
    mounted() {
        this.fetchDataFromLaravel();
    },
    methods: {
        fetchDataFromLaravel() {
            axios.get('http://localhost:8000/api/last5results')
                .then(response => {
                    this.dataFromLaravel = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
    },
}

</script>

<template>
    <div>
        <h1> {{ player1Name }} </h1>
        <h1> {{ player2Name }} </h1>
        <Game />
    </div>
</template>

<style scoped>
.logo {
    height: 6em;
    padding: 1.5em;
    will-change: filter;
    transition: filter 300ms;
}

.logo:hover {
    filter: drop-shadow(0 0 2em #646cffaa);
}

.logo.vue:hover {
    filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
