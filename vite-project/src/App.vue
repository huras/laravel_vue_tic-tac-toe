<template>
    <div id="app">
        <header>
        </header>

        <main>
            <router-view></router-view>
        </main>

        <footer>
            <Header></Header>
        </footer>
    </div>
</template>

<script>
import Header from './components/Header.vue';

export default {
    name: 'App',
    components: {
        Header,
    },
}
</script>

<style>
/* App styles */
</style>
