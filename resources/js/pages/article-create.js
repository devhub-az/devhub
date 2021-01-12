console.log(' ____             _   _       _\n' +
    '|  _ \\  _____   _| | | |_   _| |__   __ _ ____\n' +
    '| | | |/ _ \\ \\ / / |_| | | | | \'_ \\ / _` |_  /\n' +
    '| |_| |  __/\\ V /|  _  | |_| | |_) | (_| |/ /\n' +
    '|____/ \\___| \\_/ |_| |_|\\__,_|_.__(_)__,_/___|')

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
