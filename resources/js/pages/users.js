let Vue = require('vue').default
import httpPlugin from './../scripts/http'
import languageBundle from '@kirschbaum-development/laravel-translations-loader!@kirschbaum-development/laravel-translations-loader'
import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

const i18n = new VueI18n({
    locale: window.Language,
    messages: languageBundle,
})

Vue.use(httpPlugin)

try {
    window.Popper = require('popper.js').default
    window.$ = window.jQuery = require('jquery')
} catch (e) {}

Vue.component('users-list', require('./../components/users/UserComponent').default)
Vue.component('users-loading', require('./../components/plugins/loading/UsersLoading').default)

/**
 * Parts
 */

Vue.component('user-follow-button', require('./../components/users/UsersFollowButtonComponent').default)
Vue.component('pagination', require('./../components/plugins/pagination').default)

new Vue({i18n: i18n}).$mount('#app')
