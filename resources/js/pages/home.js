console.log(' ____             _   _       _\n' +
    '|  _ \\  _____   _| | | |_   _| |__   __ _ ____\n' +
    '| | | |/ _ \\ \\ / / |_| | | | | \'_ \\ / _` |_  /\n' +
    '| |_| |  __/\\ V /|  _  | |_| | |_) | (_| |/ /\n' +
    '|____/ \\___| \\_/ |_| |_|\\__,_|_.__(_)__,_/___|')

let Vue = require('vue').default;
import moment from "moment-mini"
import httpPlugin from './../scripts/http';
import Notifications from 'vue-notification'

Vue.filter('moment', function (value, format) {
    return moment(value).format(format);
});
Vue.filter('timeago', function (value) {
    return moment(value).fromNow();
});

Vue.use(httpPlugin);
Vue.use(Notifications)

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

Vue.component('posts', require('../components/articles/PostsComponent').default);
Vue.component('posts-loading', require('./../components/plugins/loading/PostsLoading').default);

/**
 * Parts
 */
Vue.component('tags', require('./../components/parts/tags.vue').default);
Vue.component('hubs-tags', require('./../components/hubs/HubsTagComponent.vue').default);

Vue.component('vote', require('./../components/parts/vote.vue').default);
Vue.component('favorite', require('./../components/parts/PostFavorite').default);
Vue.component('hub-follow-button', require('./../components/hubs/HubsFollowButtonComponent.vue').default);
Vue.component('comment-favorite', require('./../components/parts/CommentFavorite').default);
Vue.component('pagination', require('./../components/plugins/pagination.vue').default);


new Vue({
    moment,
}).$mount('#app');
