console.log(
    '      Using DevHub at work? Work for DevHub.\n')

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');
import VueCookies from 'vue-cookies'
Vue.use(VueCookies)

window.Noty = require('noty');
import "animate.css/animate.min.css";

import "@mdi/font/css/materialdesignicons.min.css"

require('moment/locale/az');
window.moment.locale('az');

window.parse = require('./parser');

Noty.overrideDefaults( {
    layout: 'topLeft',
    dismissQueue: true, // [boolean] If you want to use queue feature set this true
    force: false, // [boolean] adds notification to the beginning of queue when set to true
    maxVisible: 5, // [integer] you can set max visible notification count for dismissQueue true option,


    timeout: 3000, // [integer|boolean] delay for closing event in milliseconds. Set false for sticky notifications
    progressBar: false, // [boolean] - displays a progress bar

    animation: {
        open: 'animated fadeInLeft', // Animate.css class names
        close: 'animated fadeOutLeft' // Animate.css class names
    },
    closeWith: ['click'], // ['click', 'button', 'hover', 'backdrop'] // backdrop click will close all notifications

    buttons: false // [boolean|array] an array of buttons, for creating confirmation dialogs.
});

Vue.component('posts', require('./components/posts/PostsComponent.vue').default);
Vue.component('pagination', require('./components/plugins/pagination.vue').default);
Vue.component('tags', require('./components/parts/tags.vue').default);
Vue.component('hubs-list', require('./components/hubs/HubsComponent.vue').default);
Vue.component('vote', require('./components/parts/vote.vue').default);
Vue.component('hubs-tags', require('./components/hubs/HubsTagComponent.vue').default);
Vue.component('hub-follow-button', require('./components/hubs/HubsFollowButtonComponent.vue').default);
Vue.component('user-follow-button', require('./components/users/UsersFollowButtonComponent.vue').default);
Vue.component('vue-chosen', require('./components/plugins/vue-chosen.vue').default);
Vue.component('search', require('./components/plugins/search.vue').default);
Vue.component('dropdown', require('./components/plugins/dropdown.vue').default);
Vue.component('profile-settings', require('./components/auth/settings/ProfileComponent.vue').default);
Vue.component('users-list', require('./components/users/UserComponent.vue').default);
Vue.component('dropdown-notification', require('./components/plugins/dropdown-notification.vue').default);
Vue.component('posts-loading', require('./components/plugins/loading/PostsLoading').default);
Vue.component('favorite', require('./components/plugins/favorite').default);
Vue.component('post-show', require('./components/posts/PostShowComponent').default);
Vue.component('comments', require('./components/comments/CommentsComponent.vue').default);

Vue.config.productionTip = false;
Vue.config.silent = false;
Vue.config.keyCodes.backspace = 8;
Vue.config.devtools = false

Vue.filter('moment', function (value, format) {
    return moment(value).format(format);
});
Vue.filter('timeago', function (value) {
    return moment(value).fromNow();
});

if (document.getElementById('app')) {
    const app = new Vue({
        el: '#app',
    });
}

if (document.getElementById('header_app')) {
    const app = new Vue({
        el: '#header_app',
    });
}
