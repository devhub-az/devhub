require('./../bootstrap');

let Vue = require('vue').default;
import httpPlugin from './../scripts/http';

Vue.use(httpPlugin);

try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

Vue.component('posts', require('../components/articles/PostsComponent').default);
Vue.component('posts-loading', require('./../components/plugins/loading/PostsLoading').default);
Vue.component('user-follow', require('../components/users/UsersFollowButtonComponent').default)

new Vue().$mount('#app');
