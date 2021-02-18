let Vue = require('vue').default;
import httpPlugin from './../scripts/http';

Vue.use(httpPlugin);

try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

Vue.component('user-follow', require('../components/users/UsersFollowButtonComponent').default)

new Vue().$mount('#app');
