import Vue from 'vue'
import moment from "moment-mini";

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

Vue.component('posts', require('./../components/posts/PostsComponent').default);
Vue.component('posts-loading', require('./../components/plugins/loading/PostsLoading').default);

/**
 * Parts
 */
Vue.component('tags', require('./../components/parts/tags.vue').default);
Vue.component('vote', require('./../components/parts/vote.vue').default);
Vue.component('favorite', require('./../components/parts/PostFavorite').default);
Vue.component('comment-favorite', require('./../components/parts/CommentFavorite').default);
Vue.component('pagination', require('./../components/plugins/pagination.vue').default);

new Vue({
    moment,
}).$mount('#app');
