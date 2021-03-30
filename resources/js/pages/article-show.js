let Vue = require('vue').default
import moment from "moment"
import httpPlugin from './../scripts/http'
require('../scripts/tippy')
import languageBundle from '@kirschbaum-development/laravel-translations-loader!@kirschbaum-development/laravel-translations-loader'
import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

const i18n = new VueI18n({
    locale: window.Language,
    messages: languageBundle,
})

Vue.use(httpPlugin)

moment.locale(window.Language)

Vue.filter('moment', function (value, format) {
    return moment(value).format(format)
})
Vue.filter('timeago', function (value) {
    return moment(value).fromNow()
})

try {
    window.Popper = require('popper.js').default
    window.$ = window.jQuery = require('jquery')
} catch (e) {}

Vue.component('article-show', require('./../components/articles/ArticleShowComponent').default)
Vue.component('article-loading', require('./../components/plugins/loading/ArticleLoading').default)

/**
 * Parts
 */
Vue.component('tags', require('./../components/parts/tags.vue').default)
Vue.component('hubs-tags', require('./../components/hubs/HubsTagComponent.vue').default)

Vue.component('vote', require('./../components/parts/vote.vue').default)
Vue.component('comments', require('../components/comments/ArticleCommentsComponent').default)
Vue.component('favorite', require('./../components/parts/PostFavorite').default)
Vue.component('hub-follow-button', require('./../components/hubs/HubsFollowButtonComponent.vue').default)
Vue.component('comment-favorite', require('./../components/parts/CommentFavorite').default)

new Vue({
    i18n: i18n,
    moment,
}).$mount('#app')
