import Vue from "vue";

Vue.component('dropdown', require('./../components/plugins/dropdown.vue').default);
Vue.component('dropdown-notification', require('./../components/plugins/dropdown-notification.vue').default);

new Vue().$mount('#header');
