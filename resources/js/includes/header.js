if (localStorage.theme === 'dark') {
    document.querySelector('#toggle').classList.add('toggle', 'active')
} else {
    document.querySelector('#toggle').classList.add('toggle')
}

import Vue from "vue";

Vue.component('dropdown', require('./../components/plugins/dropdown.vue').default);
Vue.component('dropdown-notification', require('./../components/plugins/dropdown-notification.vue').default);

new Vue().$mount('#header');

function toggleMenu() {
    document.getElementById("mobile-menu__open").classList.toggle("hidden");
    document.getElementById("mobile-menu__close").classList.toggle("hidden");
    document.getElementById("mobile-menu__items").classList.toggle("hidden");
}

function toggleIcon() {
    document.getElementById("mobile-icon__items").classList.toggle("hidden");
}

window.onload = function () {
    document.querySelector('.toggle').addEventListener('click', function () {
        this.classList.add('animate');
        switch (document.querySelector('html').classList.toString()){
            case '':
                this.classList.add('active');
                localStorage.theme = 'dark'
                document.querySelector('html').classList.add('dark')
                break
            default:
                this.classList.remove('active');
                localStorage.theme = ''
                document.querySelector('html').classList.remove('dark')
        }
        setTimeout(() => this.classList.remove('animate'), 300);
    });

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
