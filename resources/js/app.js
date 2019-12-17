require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');
window.SimpleMDE = require('simplemde');
import 'notyf/notyf.min.css'; // for React and Vue
require('moment/locale/az');
window.moment.locale('az');

axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};

const input = document.getElementById("form_search");

const nav = document.getElementById("navbar-links");
const search_input = document.getElementById("search_input");

import hotkeys from 'hotkeys-js';

hotkeys.filter = function(event){
    return true;
}
//How to add the filter to edit labels. <div contentEditable="true"></div>
//"contentEditable" Older browsers that do not support drops
hotkeys.filter = function(event) {
    const tagName = (event.target || event.srcElement).tagName;
    return !(tagName.isContentEditable || tagName == 'INPUT' || tagName == 'SELECT' || tagName == 'TEXTAREA');
}

hotkeys.filter = function(event){
    const tagName = (event.target || event.srcElement).tagName;
    hotkeys.setScope(/^(INPUT|TEXTAREA|SELECT)$/.test(tagName) ? 'input' : 'other');
    return true;
}

hotkeys('/', function (event) {
    // Prevent the default refresh event under WINDOWS system
    event.preventDefault()

    const icon = document.getElementById("search-icon");

    icon.style.display = "none";
    nav.style.display = "none";
    input.style.display = "flex";

    search_input.focus();
})

hotkeys('esc', function (event) {
    event.preventDefault()

    if ($("#search_input").is(':focus')) {
        const input = document.getElementById("form_search");
        const icon = document.getElementById("search-icon");
        const nav = document.getElementById("navbar-links");

        nav.removeAttribute("style");
        input.removeAttribute("style");
        icon.removeAttribute("style");
    }
})


Vue.component('posts', require('./components/PostsComponent.vue').default);
Vue.component('pagination', require('./components/pagination.vue').default);
Vue.component('tags', require('./components/tags.vue').default);
Vue.component('hubs-list', require('./components/hubs/HubsComponent.vue').default);
Vue.component('vote', require('./components/vote.vue').default);
Vue.component('hubs-tags', require('./components/hubs/HubsTagComponent.vue').default);
Vue.component('hub-follow-button', require('./components/hubs/HubsFollowButtonComponent.vue').default);
Vue.component('user-follow-button', require('./components/users/UsersFollowButtonComponent.vue').default);
Vue.component('tags-input', require('@voerro/vue-tagsinput').default);
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
