<template>
    <div class="tic-tac-toe">
        <div class="board">
            <div v-for="(cell, index) in cells" :key="index" class="cell" @click="makeMove(index)">
                {{ cell }}
            </div>
        </div>
        <div v-if="winner" class="message">{{ winner }} wins!</div>
        <div v-else class="message" v-if="isDraw">It's a draw!</div>
        <button @click="resetGame" class="reset-button">Reset</button>
    </div>
</template>

<script>
import Cell from './TicTacToeCell.vue';

export default {
    components: {
        Cell,
    },
    data() {
        return {
            cells: Array(9).fill(null),
            currentPlayer: "X",
            winner: null,
            isDraw: false,
        };
    },
    methods: {
        makeMove(index) {
            if (!this.cells[index] && !this.winner) {
                this.cells.splice(index, 1, this.currentPlayer);
                if (this.checkWin(this.currentPlayer)) {
                    this.winner = this.currentPlayer;
                } else if (!this.cells.includes(null)) {
                    this.isDraw = true;
                } else {
                    this.currentPlayer = this.currentPlayer === "X" ? "O" : "X";
                }
            }
        },
        checkWin(player) {
            const winCombinations = [
                [0, 1, 2],
                [3, 4, 5],
                [6, 7, 8],
                [0, 3, 6],
                [1, 4, 7],
                [2, 5, 8],
                [0, 4, 8],
                [2, 4, 6],
            ];

            return winCombinations.some((combination) =>
                combination.every((index) => this.cells[index] === player)
            );
        },
        resetGame() {
            this.cells = Array(9).fill(null);
            this.currentPlayer = "X";
            this.winner = null;
            this.isDraw = false;
        },
    },
};
</script>

<style>
.tic-tac-toe {
    display: flex;
    flex-direction: column;
    align-items: center;
    color: black;
}

.board {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
}

.cell {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80px;
    font-size: 24px;
    font-weight: bold;
    background-color: #f2f2f2;
    cursor: pointer;
}

.message {
    margin-top: 10px;
    font-size: 24px;
    font-weight: bold;
}

.reset-button {
    margin-top: 10px;
    padding: 8px 16px;
    font-size: 16px;
    font-weight: bold;
    background-color: #4caf50;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
