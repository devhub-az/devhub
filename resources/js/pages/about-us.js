let Vue = require('vue').default;
import httpPlugin from './../scripts/http';
import languageBundle from '@kirschbaum-development/laravel-translations-loader!@kirschbaum-development/laravel-translations-loader';
import VueI18n from 'vue-i18n';
import AOS from 'aos';
import 'aos/dist/aos.css';
Vue.use(VueI18n);

const i18n = new VueI18n({
    locale: window.Language,
    messages: languageBundle,
})

Vue.use(httpPlugin);

try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}
AOS.init({
    easing: "linear",
    duration: 3000,
    delay: 0,
    once: true
});


// Vue.component('about-slider', require('./../components/about/slider').default);
Vue.component('about-example', require('./../components/about/slider').default);

new Vue({i18n: i18n}).$mount('#app');

