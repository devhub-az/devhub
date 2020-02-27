console.log(
    '      Using DevHub at work? Work for DevHub.\n')

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment-mini');
import VueCookies from 'vue-cookies'
Vue.use(VueCookies)

import "@mdi/font/css/materialdesignicons.min.css"

window.Noty = require('noty');

require('moment/locale/az');
window.moment.locale('az');
//
// window.parse = require('./parser');
//
Noty.overrideDefaults( {
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
