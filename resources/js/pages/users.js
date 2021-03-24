let Vue = require('vue').default
import httpPlugin from './../scripts/http'

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

new Vue().$mount('#app')
