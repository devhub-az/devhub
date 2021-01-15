let Vue = require('vue').default;
import httpPlugin from './../scripts/http';

Vue.use(httpPlugin);

try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}


// Vue.component('about-slider', require('./../components/about/slider').default);
Vue.component('profile-settings', require('./../components/auth/settings/ProfileComponent').default);

new Vue().$mount('#app');

