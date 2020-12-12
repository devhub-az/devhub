<template>
    <div class="relative">
        <button
            href="#"
            class="flex items-center focus:outline-none p-0 bg-none"
            @click="toggleVisibility"
            @keydown.space.exact.prevent="toggleVisibility"
            @keydown.esc.exact="hideDropdown"
            @keydown.shift.tab="hideDropdown"
            @keydown.up.exact.prevent="startArrowKeys"
            @keydown.down.exact.prevent="startArrowKeys"
        >
            <img v-if="user.avatar !== 'default'" :src="'/upload/avatars/' + user.avatar"
                 class="w-6 h-6 flex-none image-fit rounded lazyload"
                 alt="Profile image">
            <img v-else-if="user.avatar === 'default'" src="/upload/avatars/default.png"
                 class="w-6 h-6 flex-none image-fit rounded lazyload"
                 alt="Profile image">
        </button>
        <transition name="dropdown-fade">
            <div v-on-clickaway="hideDropdown" v-if="isVisible" ref="dropdown"
                 class="absolute text-gray-700 right-0 mt-2 py-2 w-48 bg-white border rounded shadow z-20">
                <a
                    :href="'/users/@' + user.username"
                    @keydown.tab.exact="focusNext(false)"
                    @keydown.shift.tab="focusPrevious(false)"
                    @keydown.up.exact.prevent="focusPrevious(true)"
                    @keydown.down.exact.prevent="focusNext(true)"
                    @keydown.esc.exact="hideDropdown"
                    class="block px-4 py-1 text-sm capitalize text-gray-700 hover:bg-blue hover:text-white"
                >
                    Profilim
                </a>
                <hr class="my-2">
                <a
                    :href="'/@'+ user.username +'/settings/profile'"
                    @keydown.tab.exact="focusNext(false)"
                    @keydown.shift.tab="focusPrevious(false)"
                    @keydown.up.exact.prevent="focusPrevious(true)"
                    @keydown.down.exact.prevent="focusNext(true)"
                    @keydown.esc.exact="hideDropdown"
                    class="block px-4 py-1 text-sm capitalize text-gray-700 hover:bg-blue hover:text-white"
                >
                    Parametrlər
                </a>
                <!--                <li @click="toggle" class="drop-grid">-->
                <!--                    <div class="switch-button-control">-->
                <!--                        <div class="switch-button-label ml-2">-->
                <!--                            Qaranlıq-->
                <!--                        </div>-->
                <!--                        <div class="switch-button" :class="{ enabled: isEnabled }">-->
                <!--                            <div class="button"></div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </li>-->
                <a v-if="admin"
                   href="/admin"
                   @keydown.tab.exact="focusNext(false)"
                   @keydown.shift.tab="focusPrevious(false)"
                   @keydown.up.exact.prevent="focusPrevious(true)"
                   @keydown.down.exact.prevent="focusNext(true)"
                   @keydown.esc.exact="hideDropdown"
                   class="block px-4 py-1 text-sm capitalize text-gray-700 hover:bg-blue hover:text-white"
                >
                    Admin panel
                </a>
                <a
                    :href="fav"
                    @keydown.tab.exact="focusNext(false)"
                    @keydown.shift.tab="focusPrevious(false)"
                    @keydown.up.exact.prevent="focusPrevious(true)"
                    @keydown.down.exact.prevent="focusNext(true)"
                    @keydown.esc.exact="hideDropdown"
                    class="block px-4 py-1 text-sm capitalize text-gray-700 hover:bg-blue hover:text-white"
                >
                    Seçilmişlər
                </a>
                <hr class="my-2">
                <a
                    href="#"
                    @click.prevent="logout"
                    @keydown.tab.exact="focusNext(false)"
                    @keydown.shift.tab="focusPrevious(false)"
                    @keydown.up.exact.prevent="focusPrevious(true)"
                    @keydown.down.exact.prevent="focusNext(true)"
                    @keydown.esc.exact="hideDropdown"
                    class="block px-4 py-1 text-sm capitalize text-gray-700 hover:bg-blue hover:text-white"
                >
                    Çıxmaq
                </a>
            </div>
        </transition>
    </div>
</template>

<script>
import {mixin as clickaway} from 'vue-clickaway'
import axios from "axios"


export default {
    mixins: [clickaway],
    props: ['user', 'fav', 'admin'],
    data() {
        return {
            switch: true,
            // body: document.getElementsByTagName('body')[0],
            // atr: document.getElementsByTagName('body')[0].getAttribute('data-theme'),
            // cookatr: window.$cookies.get('atr'),
            isEnabled: null,
            isVisible: false,
            focusedIndex: 0,
            isActive: true,
        }
    },
    created: function () {
        // if (!this.cookatr) {
        //     this.cookatr = this.atr
        // }
        // if (this.cookatr === 'dark')
        //     this.isEnabled = true
        // else if (this.cookatr === 'default')
        //     this.isEnabled = false
    },
    methods: {
        toggle: function () {
            if (this.cookatr === 'dark') {
                this.body.setAttribute("data-theme", 'default')
                this.atr = 'default'
                this.cookatr = 'default'
                Vue.$cookies.set('atr', 'default')
            } else if (this.cookatr === 'default') {
                this.body.setAttribute("data-theme", 'dark')
                this.atr = 'dark'
                this.cookatr = 'dark'
                Vue.$cookies.set('atr', 'dark')
            }
            this.isEnabled = !this.isEnabled;
        },
        toggleVisibility() {
            this.isVisible = !this.isVisible
        },
        hideDropdown() {
            this.isVisible = false
            this.focusedIndex = 0
        },
        startArrowKeys() {
            if (this.isVisible) {
                // this.$refs.account.focus()
                this.$refs.dropdown.children[0].children[0].focus()
            }
        },
        focusPrevious(isArrowKey) {
            this.focusedIndex = this.focusedIndex - 1
            if (isArrowKey) {
                this.focusItem()
            }
        },
        focusNext(isArrowKey) {
            this.focusedIndex = this.focusedIndex + 1
            if (isArrowKey) {
                this.focusItem()
            }
        },
        focusItem() {
            this.$refs.dropdown.children[this.focusedIndex].children[0].focus()
        },
        setNewToggleState() {
            this.isActive = !this.isActive;
            this.$emit('setIsActive', this.isActive);
        },
        logout(evt) {
            axios.post('/logout')
                .then(() => {
                    window.location.reload();
                });
        }
    }
}
</script>
