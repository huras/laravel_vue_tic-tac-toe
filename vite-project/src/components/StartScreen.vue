<template>
    <div>
        <input type="text" v-model="player1Name" placeholder="Player 1 name" />
        <input type="text" v-model="player2Name" placeholder="Player 2 name" />
        <button @click="startGame">Start</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            player1Name: 'Player 1',
            player2Name: 'Player 2',
        };
    },
    methods: {
        startGame() {
            // Emit an event to the parent component indicating the start of the game
            this.$emit('game-start', this.player1Name, this.player2Name);
        },
    },
};
</script>
