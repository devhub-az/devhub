console.log(
    '      Using DevHub at work? Work for DevHub.\n')

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');
window.SimpleMDE = require('simplemde');
import 'notyf/notyf.min.css'; // for React and Vue
require('moment/locale/az');
window.moment.locale('az');
import '@github/markdown-toolbar-element';

axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};

Vue.component('posts', require('./components/PostsComponent.vue').default);
Vue.component('pagination', require('./components/pagination.vue').default);
Vue.component('tags', require('./components/tags.vue').default);
Vue.component('hubs-list', require('./components/hubs/HubsComponent.vue').default);
Vue.component('vote', require('./components/vote.vue').default);
Vue.component('hubs-tags', require('./components/hubs/HubsTagComponent.vue').default);
Vue.component('hub-follow-button', require('./components/hubs/HubsFollowButtonComponent.vue').default);
Vue.component('user-follow-button', require('./components/users/UsersFollowButtonComponent.vue').default);
Vue.component('vue-chosen', require('./components/plugins/vue-chosen.vue').default);
Vue.component('search', require('./components/search.vue').default);
Vue.component('dropdown', require('./components/plugins/Dropdown.vue').default);
Vue.component('profile-settings', require('./components/auth/settings/ProfileComponent.vue').default);
Vue.component('users-list', require('./components/users/UserComponent.vue').default);
Vue.component('editor', require('./components/plugins/editor.vue').default);

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
