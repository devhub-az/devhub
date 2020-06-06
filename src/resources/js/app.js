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
window.moment = require('moment-mini');
import VueCookies from 'vue-cookies'
Vue.use(VueCookies)

window.Noty = require('noty');

require('moment/locale/az');
window.moment.locale('az');
//
// window.parse = require('./parser');
//
Noty.overrideDefaults({
    layout: 'topLeft',
    dismissQueue: true, // [boolean] If you want to use queue feature set this true
    force: false, // [boolean] adds notification to the beginning of queue when set to true
    maxVisible: 5, // [integer] you can set max visible notification count for dismissQueue true option,


    timeout: 3000, // [integer|boolean] delay for closing event in milliseconds. Set false for sticky notifications
    progressBar: false, // [boolean] - displays a progress bar

    animation: {
        open: 'animated fadeInLeft', // Animate.css class names
        close: 'animated fadeOutLeft' // Animate.css class names
    },
    closeWith: ['click'], // ['click', 'button', 'hover', 'backdrop'] // backdrop click will close all notifications

    buttons: false // [boolean|array] an array of buttons, for creating confirmation dialogs.
});
//
import './components'
//
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
