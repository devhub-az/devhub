console.log(' ____             _   _       _\n' +
    '|  _ \\  _____   _| | | |_   _| |__   __ _ ____\n' +
    '| | | |/ _ \\ \\ / / |_| | | | | \'_ \\ / _` |_  /\n' +
    '| |_| |  __/\\ V /|  _  | |_| | |_) | (_| |/ /\n' +
    '|____/ \\___| \\_/ |_| |_|\\__,_|_.__(_)__,_/___|')

import Vue from "vue";
import languageBundle from '@kirschbaum-development/laravel-translations-loader!@kirschbaum-development/laravel-translations-loader'
import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

const i18n = new VueI18n({
    locale: window.Language,
    messages: languageBundle,
})

Vue.component('login', require('./components/auth/login').default);
Vue.component('register', require('./components/auth/register').default);
Vue.component('email', require('./components/auth/email').default);

new Vue({i18n:i18n}).$mount('#app');
