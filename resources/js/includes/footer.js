let Vue = require('vue').default;
import languageBundle from '@kirschbaum-development/laravel-translations-loader!@kirschbaum-development/laravel-translations-loader';
import VueI18n from 'vue-i18n';
Vue.use(VueI18n);

const i18n = new VueI18n({
    locale: window.Language,
    messages: languageBundle,
})

Vue.component('select-menu', require('./../components/parts/SelectMenu').default);
Vue.component('switcher', require('./../components/parts/DarkSwitcher').default);

new Vue({i18n: i18n}).$mount('#footer');
