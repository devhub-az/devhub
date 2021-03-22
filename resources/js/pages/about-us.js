let Vue = require('vue').default;
import httpPlugin from './../scripts/http';
import languageBundle from '@kirschbaum-development/laravel-translations-loader!@kirschbaum-development/laravel-translations-loader';
import VueI18n from 'vue-i18n';
Vue.use(VueI18n);

const i18n = new VueI18n({
    locale: window.Language,
    messages: languageBundle,
})

Vue.use(httpPlugin);

try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}


// Vue.component('about-slider', require('./../components/about/slider').default);
Vue.component('about-example', require('./../components/about/slider').default);

new Vue({i18n: i18n}).$mount('#app');

