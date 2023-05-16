<template>
    <div class="cell" @click="handleClick">
        {{ value }}
    </div>
</template>

<script>
export default {
    props: {
        value: {
            type: String,
            required: true,
        },
        disabled: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        handleClick() {
            if (!this.disabled) {
                this.$emit('cell-click');
            }
        },
    },
};
</script>

<style>
.cell {
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ccc;
    height: 100px;
    width: 100px;
    cursor: pointer;
    font-size: 2em;
}
</style>
