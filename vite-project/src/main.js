
import { createApp } from 'vue';
import router from './routes.js';
import App from './App.vue';
import './style.css'
import './index.css'

createApp(App)
  .use(router)
  .mount('#app');


