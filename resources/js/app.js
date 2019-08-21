
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');
window.SimpleMDE = require('simplemde');
require('moment/locale/az');
window.moment.locale('az');

$(document).ready(function() {
   $('pre code').each(function(i, e) {hljs.highlightBlock(e)});
});

axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('posts', require('./components/PostsComponent.vue').default);
Vue.component('pagination', require('./components/pagination.vue').default);
Vue.component('tags', require('./components/tags.vue').default);
Vue.component('hubs-list', require('./components/HubsComponent.vue').default);
Vue.component('vote', require('./components/vote.vue').default);
Vue.component('notification', require('./components/NotificationComponent.vue').default);
Vue.component('hubs-tags', require('./components/HubsTagComponent.vue').default);
Vue.component('hub-follow-button', require('./components/HubsFollowButtonComponent.vue').default);
Vue.component('tags-input', require('@voerro/vue-tagsinput').default);
Vue.component('vue-chosen', require('./components/plugins/vue-chosen.vue').default);
Vue.component('search', require('./components/search.vue').default);


Vue.config.devtools=false;
Vue.config.productionTip = false;
Vue.config.silent = false;
Vue.config.keyCodes.backspace = 8;

Vue.filter('moment', function(value, format) {
    return moment(value).format(format);
});
Vue.filter('timeago', function(value) {
    return moment(value).fromNow();
});

if (document.getElementById('app')){
    const app = new Vue({
        el: '#app'
    });
}

if (document.getElementById('header_app')){
    const app = new Vue({
        el: '#header_app'
    });
}