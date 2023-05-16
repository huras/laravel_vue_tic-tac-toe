<script>
import HelloWorld from './components/HelloWorld.vue'
import TicTacToe from './components/TicTacToe.vue'

import {mapState} from 'vuex'

export default {
  name: 'App',
  components: {
    TicTacToe
  },
  computed: {
    ...mapState(['user'])
  }
}

</script>

<template>
  <!-- <HelloWorld msg="Vite + Vue" /> -->
  <TicTacToe />
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
