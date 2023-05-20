
<template>
    <div>
        <template v-if="isGameStarted">
            <TicTacToe @game-ended="update5Results" :player1Name="players['1'].name" :player2Name="players['2'].name" :storeResult="storeResult" />
            <LastFiveList :last5Plays="last5Plays" />
        </template>
        <template v-else>
            <StartScreen @game-start="handleGameStart" />
        </template>
    </div>
</template>

<script>
import axios from 'axios';

import TicTacToe from './TicTacToe.vue';
import StartScreen from './StartScreen.vue';
import LastFiveList from './LastFiveList.vue';

export default {
    components: {
        TicTacToe,
        StartScreen,
        LastFiveList
    },
    data() {
        return {
            isGameStarted: false,
            players: {
                '1': {
                    name: ''
                },
                '2': {
                    name: ''
                },
            },
            last5Plays: []
        };
    },
    mounted() {
        this.fetchLastFiveResults();
    },
    methods: {
        handleGameStart(player1Name, player2Name) {
            // Check if both player names are filled
            if (player1Name && player2Name) {
                this.isGameStarted = true;
                this.players['1'].name = player1Name;
                this.players['2'].name = player2Name;
            }
        },
        storeResult(result){
            axios.post('http://localhost:8000/api/store-results', {
                    ...result
                })
                .then(response => {
                    this.last5Plays = response.data.last5;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        fetchLastFiveResults() {
            axios.get('http://localhost:8000/api/last5results')
                .then(response => {
                    this.last5Plays = response.data.last5;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
};
</script>
