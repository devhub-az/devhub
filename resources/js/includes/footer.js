let Vue = require('vue').default;

import _ from 'lodash';
Vue.prototype.trans = string => _.get(window.i18n, string);

Vue.component('select-menu', require('./../components/parts/SelectMenu').default);
Vue.component('switcher', require('./../components/parts/DarkSwitcher').default);

new Vue().$mount('#footer');
