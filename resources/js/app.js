require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.userId = document.querySelector("meta[name='di-resu']").content;

import App from './App.vue';

const app = new Vue({
    el: '#app',
    render: h => h(App)
})