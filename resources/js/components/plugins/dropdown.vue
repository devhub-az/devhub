<template>
    <div class="relative">
        <button
            class="flex items-center focus:outline-none p-0 bg-none"
            @click="toggleVisibility"
            @keydown.space.exact.prevent="toggleVisibility"
            @keydown.esc.exact="hideDropdown"
            @keydown.shift.tab="hideDropdown"
            @keydown.up.exact.prevent="startArrowKeys"
            @keydown.down.exact.prevent="startArrowKeys"
        >
            <img v-if="user.avatar !== 'default'" :src="'/upload/avatars/' + user.avatar"
                 class="w-8 h-8 flex-none image-fit rounded lazyload"
                 alt="Profile image">
            <img v-else-if="user.avatar === 'default'" src="/upload/avatars/default.png"
                 class="w-8 h-8 flex-none image-fit rounded lazyload"
                 alt="Profile image">
        </button>
        <div>
            <div v-on-clickaway="hideDropdown" v-if="isVisible" ref="dropdown"
                 class="absolute text-gray-700 space-y-4 right-0 mt-2 py-2 w-40 bg-white dark:bg-dpaper dark:border-gray-700 border rounded shadow z-20">
                <a
                    :href="'/authors/@' + user.username"
                    @keydown.tab.exact="focusNext(false)"
                    @keydown.shift.tab="focusPrevious(false)"
                    @keydown.up.exact.prevent="focusPrevious(true)"
                    @keydown.down.exact.prevent="focusNext(true)"
                    @keydown.esc.exact="hideDropdown"
                    class="block flex items-center space-x-1 px-4 pt-2 capitalize text-gray-700 hover:bg-blue hover:text-black dark:text-gray-300"
                >
                    <span class="iconify" data-icon="ant-design:user-outlined" data-inline="false"></span>
                    <p class="text-sm">Profilim</p>
                </a>
                <div class="my-2 border-t dark:border-gray-700"></div>
                <a
                    :href="fav"
                    @keydown.tab.exact="focusNext(false)"
                    @keydown.shift.tab="focusPrevious(false)"
                    @keydown.up.exact.prevent="focusPrevious(true)"
                    @keydown.down.exact.prevent="focusNext(true)"
                    @keydown.esc.exact="hideDropdown"
                    class="block flex items-center space-x-1 px-4 capitalize text-gray-700 hover:bg-blue hover:text-black dark:text-gray-300"
                >
                    <span class="iconify" data-icon="mdi:content-save" data-inline="false"></span>
                    <p class="text-sm">Seçilmişlər</p>
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
                   class="block px-4 capitalize text-gray-700 hover:bg-blue hover:text-black dark:text-gray-300"
                >
                    <p class="text-sm">Admin panel</p>
                </a>
                <switcher></switcher>
                <div class="my-2 border-t dark:border-gray-700"></div>
                <a
                    :href="'/settings'"
                    @keydown.tab.exact="focusNext(false)"
                    @keydown.shift.tab="focusPrevious(false)"
                    @keydown.up.exact.prevent="focusPrevious(true)"
                    @keydown.down.exact.prevent="focusNext(true)"
                    @keydown.esc.exact="hideDropdown"
                    class="block flex items-center space-x-1 px-4 capitalize text-gray-700 hover:bg-blue hover:text-black dark:text-gray-300"
                >
                    <span class="iconify" data-icon="fluent:settings-24-filled" data-inline="false"></span>
                    <p class="text-sm">Parametrlər</p>
                </a>
                <div
                    @click.prevent="logout"
                    @keydown.tab.exact="focusNext(false)"
                    @keydown.shift.tab="focusPrevious(false)"
                    @keydown.up.exact.prevent="focusPrevious(true)"
                    @keydown.down.exact.prevent="focusNext(true)"
                    @keydown.esc.exact="hideDropdown"
                    class="block flex items-center space-x-1 px-4 capitalize text-gray-700 hover:bg-blue hover:text-black dark:text-gray-300"
                >
                    <span class="iconify" data-icon="tabler:logout" data-inline="false"></span>
                    <p class="text-sm">Çıxmaq</p>
                </div>
            </div>
        </div>
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
            isEnabled: null,
            isVisible: false,
            focusedIndex: 0,
            isActive: true,
        }
    },
    methods: {
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
