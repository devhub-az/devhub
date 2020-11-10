console.log(' ____             _   _       _\n' +
    '|  _ \\  _____   _| | | |_   _| |__   __ _ ____\n' +
    '| | | |/ _ \\ \\ / / |_| | | | | \'_ \\ / _` |_  /\n' +
    '| |_| |  __/\\ V /|  _  | |_| | |_) | (_| |/ /\n' +
    '|____/ \\___| \\_/ |_| |_|\\__,_|_.__(_)__,_/___|')

require('./bootstrap');
window.Vue = require('vue');

import "@mdi/font/css/materialdesignicons.min.css"

Vue.component('login', require('./components/auth/Login.vue').default);

if (document.getElementById('app')) {
    const app = new Vue({
        el: '#app',
    });
}
