console.log(' ____             _   _       _\n' +
    '|  _ \\  _____   _| | | |_   _| |__   __ _ ____\n' +
    '| | | |/ _ \\ \\ / / |_| | | | | \'_ \\ / _` |_  /\n' +
    '| |_| |  __/\\ V /|  _  | |_| | |_) | (_| |/ /\n' +
    '|____/ \\___| \\_/ |_| |_|\\__,_|_.__(_)__,_/___|')

// console.log("%c+",
//     'font-size: 1px; ' +
//     'padding: 150px 87px; ' +
//     'line-height: 0; ' +
//     'background: url("https://cs.pikabu.ru/assets/images/dev.png"); ' +
//     'background-size: 175px 300px; ' +
//     'margin: 0 auto;' +
//     'color: transparent;')

require('./bootstrap');

window.Vue = require('vue');
import VueCookies from 'vue-cookies'
Vue.use(VueCookies)

window.Noty = require('noty');

window.moment.locale('az');

Noty.overrideDefaults({
    layout: 'topLeft',
    dismissQueue: true,
    force: false,
    maxVisible: 5,


    timeout: 3000,
    progressBar: false,

    animation: {
        open: 'animated fadeInLeft',
        close: 'animated fadeOutLeft'
    },
    closeWith: ['click'],

    buttons: false
});

import './components'

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
