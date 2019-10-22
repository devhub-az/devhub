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

Vue.component('posts', require('./components/PostsComponent.vue').default);
Vue.component('pagination', require('./components/pagination.vue').default);
Vue.component('tags', require('./components/tags.vue').default);
Vue.component('hubs-list', require('./components/hubs/HubsComponent.vue').default);
Vue.component('vote', require('./components/vote.vue').default);
Vue.component('notification', require('./components/NotificationComponent.vue').default);
Vue.component('hubs-tags', require('./components/hubs/HubsTagComponent.vue').default);
Vue.component('hub-follow-button', require('./components/hubs/HubsFollowButtonComponent.vue').default);
Vue.component('tags-input', require('@voerro/vue-tagsinput').default);
Vue.component('vue-chosen', require('./components/plugins/vue-chosen.vue').default);
Vue.component('search', require('./components/search.vue').default);

Vue.config.devtools=false;
Vue.config.productionTip = false;
Vue.config.silent = false;
Vue.config.keyCodes.backspace = 8;

//Chrome extension
Vue.config.devtools = true;

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
