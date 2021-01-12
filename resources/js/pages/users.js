console.log(' ____             _   _       _\n' +
    '|  _ \\  _____   _| | | |_   _| |__   __ _ ____\n' +
    '| | | |/ _ \\ \\ / / |_| | | | | \'_ \\ / _` |_  /\n' +
    '| |_| |  __/\\ V /|  _  | |_| | |_) | (_| |/ /\n' +
    '|____/ \\___| \\_/ |_| |_|\\__,_|_.__(_)__,_/___|')

let Vue = require('vue').default;
import httpPlugin from './../scripts/http';

Vue.use(httpPlugin);

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

Vue.component('users-list', require('./../components/users/UserComponent').default);
Vue.component('users-loading', require('./../components/plugins/loading/UsersLoading').default);

/**
 * Parts
 */

Vue.component('user-follow-button', require('./../components/users/UsersFollowButtonComponent').default);
Vue.component('pagination', require('./../components/plugins/pagination').default);

new Vue().$mount('#app');
