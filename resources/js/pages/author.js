let Vue = require('vue').default
import httpPlugin from './../scripts/http'
import languageBundle from '@kirschbaum-development/laravel-translations-loader!@kirschbaum-development/laravel-translations-loader'
import VueI18n from 'vue-i18n'
require('../scripts/tippy')
Vue.use(VueI18n)

const i18n = new VueI18n({
    locale: window.Language,
    messages: languageBundle,
})

Vue.use(httpPlugin)

try {
    window.$ = window.jQuery = require('jquery')
} catch (e) {}

Vue.component('articles', require('../components/articles/ArticlesComponent').default)
Vue.component('articles-loading', require('./../components/plugins/loading/PostsLoading').default)
Vue.component('user-follow', require('../components/users/UsersFollowButtonComponent').default)

Vue.component('vote', require('./../components/parts/vote').default)
Vue.component('hubs-tags', require('./../components/hubs/HubsTagComponent').default)
Vue.component('favorite', require('./../components/parts/PostFavorite').default)
Vue.component('hub-follow-button', require('./../components/hubs/HubsFollowButtonComponent').default)
Vue.component('comment-favorite', require('./../components/parts/CommentFavorite').default)
Vue.component('pagination', require('./../components/plugins/pagination').default)

new Vue({i18n: i18n}).$mount('#app')
