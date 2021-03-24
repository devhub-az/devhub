let Vue = require('vue').default;
import moment from "moment-mini"
import httpPlugin from './../scripts/http';
import languageBundle from '@kirschbaum-development/laravel-translations-loader!@kirschbaum-development/laravel-translations-loader';
import VueI18n from 'vue-i18n';
Vue.use(VueI18n);

const i18n = new VueI18n({
    locale: window.Language,
    messages: languageBundle,
})

Vue.filter('moment', function (value, format) {
    return moment(value).format(format);
});
Vue.filter('timeago', function (value) {
    return moment(value).fromNow();
});

Vue.use(httpPlugin);

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

Vue.component('hubs-list', require('./../components/hubs/HubsComponent.vue').default);
Vue.component('hubs-loading', require('./../components/plugins/loading/HubsLoading').default);

/**
 * Parts
 */
Vue.component('tags', require('./../components/parts/tags.vue').default);
Vue.component('hubs-tags', require('./../components/hubs/HubsTagComponent.vue').default);

Vue.component('hub-follow-button', require('./../components/hubs/HubsFollowButtonComponent.vue').default);
Vue.component('pagination', require('./../components/plugins/pagination.vue').default);


new Vue({
    i18n: i18n,
    moment,
}).$mount('#app');
