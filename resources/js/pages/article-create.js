let Vue = require('vue').default;
import httpPlugin from './../scripts/http'

Vue.use(httpPlugin)

try {
    window.Popper = require('popper.js').default;
} catch (e) {}

Vue.component('editor', require('./../components/parts/editor').default);

import _ from 'lodash';
Vue.prototype.trans = string => _.get(window.i18n, string);

new Vue().$mount('#app');
