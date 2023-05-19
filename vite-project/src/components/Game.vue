<template>
    <div>
        <template v-if="isGameStarted">
            <TicTacToe :player1Name="players['1'].name" :player2Name="players['2'].name" />
        </template>
        <template v-else>
            <StartScreen @game-start="handleGameStart" />
        </template>
    </div>
</template>

<script>
import TicTacToe from './TicTacToe.vue';
import StartScreen from './StartScreen.vue';

export default {
    components: {
        TicTacToe,
        StartScreen,
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
            }
        };
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
    },
};
</script>
