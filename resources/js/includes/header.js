console.log('oooooooooo.                         ooooo   ooooo              .o8      \n' +
    '`888\'   `Y8b                        `888\'   `888\'             "888      \n' +
    ' 888      888  .ooooo.  oooo    ooo  888     888  oooo  oooo   888oooo.     Using DevHub at work? Work for Devhub.\n' +
    ' 888      888 d88\' `88b  `88.  .8\'   888ooooo888  `888  `888   d88\' `88b     https://github.com/hose1021/DevHub\n' +
    ' 888      888 888ooo888   `88..8\'    888     888   888   888   888   888\n' +
    ' 888     d88\' 888    .o    `888\'     888     888   888   888   888   888            Made with ❤ by Hose\n' +
    'o888bood8P\'   `Y8bod8P\'     `8\'     o888o   o888o  `V88V"V8P\'  `Y8bod8P\'')

import Vue from "vue";
import moment from "moment-mini"

Vue.filter('moment', function (value, format) {
    return moment(value).format(format);
});
Vue.filter('timeago', function (value) {
    return moment(value).fromNow();
});

Vue.component('dropdown', require('./../components/plugins/dropdown.vue').default);
Vue.component('dropdown-notification', require('./../components/plugins/dropdown-notification.vue').default);
Vue.component('switcher', require('./../components/parts/DarkSwitcher').default);

new Vue({
    moment,
}).$mount('#header');

function toggleMenu() {
    document.getElementById("mobile-menu__open").classList.toggle("hidden");
    document.getElementById("mobile-menu__close").classList.toggle("hidden");
    document.getElementById("mobile-menu__items").classList.toggle("hidden");
}

function toggleIcon() {
    document.getElementById("mobile-icon__items").classList.toggle("hidden");
}

window.onload = function () {
    document.getElementById("search-icon").addEventListener(
        "click",
        () => {
            document.getElementById('form_search').classList.remove('hidden')
            document.getElementById('search-icon').classList.add('hidden')
            document.getElementById('search_input').focus()
            document.getElementById('menu').classList.add('hidden')
        },
        false
    );

    document.getElementById("close-icon").addEventListener(
        "click",
        () => {
            document.getElementById('form_search').classList.add('hidden')
            document.getElementById('search-icon').classList.remove('hidden')
            document.getElementById('menu').classList.remove('hidden')
        },
        false
    );

    document.getElementById("mobile-menu__open").addEventListener(
        "click",
        () => {
            if (document.getElementById("mobile-icon__open")) {
                document.getElementById("mobile-icon__open").classList.remove("hidden");
                document.getElementById("mobile-icon__items").classList.add("hidden");
            }
            toggleMenu();
        },
        false
    );
    document.getElementById("mobile-menu__close").addEventListener(
        "click",
        () => {
            if (document.getElementById("mobile-icon__open")) {
                document.getElementById("mobile-icon__open").classList.remove("hidden");
                document.getElementById("mobile-icon__items").classList.add("hidden");
            }
            toggleMenu();
        },
        false
    );
    if (document.getElementById("mobile-icon__open"))
        document.getElementById("mobile-icon__open").addEventListener(
            "click",
            () => {
                document.getElementById("mobile-menu__open").classList.remove("hidden");
                document.getElementById("mobile-menu__close").classList.add("hidden");
                document.getElementById("mobile-menu__items").classList.add("hidden");
                toggleIcon();
            },
            false
        );
}
