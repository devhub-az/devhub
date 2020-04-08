console.log(
    '      Using DevHub at work? Work for DevHub.\n')

console.log("%c+",
    'font-size: 1px; ' +
    'padding: 150px 87px; ' +
    'line-height: 0; ' +
    'background: url("https://cs.pikabu.ru/assets/images/dev.png"); ' +
    'background-size: 175px 300px; ' +
    'margin: 0 auto;' +
    'color: transparent;')

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment-mini');
import VueCookies from 'vue-cookies'
window.Fingerprint2 = require('fingerprintjs2')

Vue.use(VueCookies)

if (window.requestIdleCallback) {
    requestIdleCallback(function () {
        Fingerprint2.get(function (components) {
            var values = components.map(function (component) { return component.value })
            var murmur = Fingerprint2.x64hash128(values.join(''), 31)
            console.log(murmur)
        })
    })
} else {
    setTimeout(function () {
        Fingerprint2.get(function (components) {
            console.log(components) // an array of components: {key: ..., value: ...}
        })
    }, 500)
}

// import "@mdi/font/css/materialdesignicons.min.css"

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
