require('./../bootstrap');

let Vue = require('vue').default;
import httpPlugin from './../scripts/http';
import VueI18n from 'vue-i18n'
import locales from './../lang/index'

Vue.use(httpPlugin);
Vue.use(VueI18n)

const i18n = new VueI18n({
    locale: 'az',
    messages: locales
})

try {
    window.Popper = require('popper.js').default;
} catch (e) {}

Vue.component('editor', require('./../components/parts/editor').default);

new Vue({
    i18n,
}).$mount('#app');
