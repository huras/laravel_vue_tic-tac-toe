<template>
    <header>
        <nav class="header">
            <hr>
            <ul>
                <li><router-link to="/">Game</router-link></li>
                <li><router-link to="/results">Results</router-link></li>
            </ul>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style>
.header {
    margin-top: 32px;
    width: 100%;
}
.header ul{
    margin-top: 32px;
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}
</style>
