let Vue = require('vue').default;
// import hljs from 'highlight.js';
import moment from "moment-mini"
import httpPlugin from './../scripts/http';

Vue.use(httpPlugin);
// Vue.use(hljs.vuePlugin);

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
Vue.component('comments', require('./../components/comments/PostCommentsComponent').default);
Vue.component('favorite', require('./../components/parts/PostFavorite').default);
Vue.component('hub-follow-button', require('./../components/hubs/HubsFollowButtonComponent.vue').default);
Vue.component('comment-favorite', require('./../components/parts/CommentFavorite').default);

new Vue({
    moment,
}).$mount('#app');
