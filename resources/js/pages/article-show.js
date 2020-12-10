console.log(' ____             _   _       _\n' +
    '|  _ \\  _____   _| | | |_   _| |__   __ _ ____\n' +
    '| | | |/ _ \\ \\ / / |_| | | | | \'_ \\ / _` |_  /\n' +
    '| |_| |  __/\\ V /|  _  | |_| | |_) | (_| |/ /\n' +
    '|____/ \\___| \\_/ |_| |_|\\__,_|_.__(_)__,_/___|')

import Vue from 'vue'
import moment from "moment-mini"

Vue.filter('moment', function (value, format) {
    return moment(value).format(format);
});
Vue.filter('timeago', function (value) {
    return moment(value).fromNow();
});

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

Vue.component('article-show', require('./../components/articles/ArticleShowComponent').default);
Vue.component('article-loading', require('./../components/plugins/loading/ArticleLoading').default)

/**
 * Parts
 */
Vue.component('tags', require('./../components/parts/tags.vue').default);
Vue.component('hubs-tags', require('./../components/hubs/HubsTagComponent.vue').default);

Vue.component('vote', require('./../components/parts/vote.vue').default);
Vue.component('favorite', require('./../components/parts/PostFavorite').default);
Vue.component('hub-follow-button', require('./../components/hubs/HubsFollowButtonComponent.vue').default);
Vue.component('comment-favorite', require('./../components/parts/CommentFavorite').default);


new Vue({
    moment,
}).$mount('#app');
