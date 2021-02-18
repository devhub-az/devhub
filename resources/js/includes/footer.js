let Vue = require('vue').default;

Vue.component('select-menu', require('./../components/parts/SelectMenu').default);

new Vue().$mount('#footer');
