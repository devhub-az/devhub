let Vue = require('vue').default
import httpPlugin from './../scripts/http'

Vue.use(httpPlugin)

try {
    window.$ = window.jQuery = require('jquery')
} catch (e) {}

Vue.component('articles', require('../components/articles/ArticlesComponent').default)
Vue.component('articles-loading', require('./../components/plugins/loading/PostsLoading').default)
Vue.component('user-follow', require('../components/users/UsersFollowButtonComponent').default)

new Vue().$mount('#app')
