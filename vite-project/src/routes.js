import { createRouter, createWebHistory } from 'vue-router';
import Game from './components/Game.vue';
import ViewResults from './components/ViewResults.vue';

const routes = [
    {
        path: '/results',
        component: ViewResults
    },
    {
        path: '/',
        component: Game
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.push(window.initialRoute || '/results');

export default router;
