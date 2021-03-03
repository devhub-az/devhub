<template>
    <div class="relative m-auto">
        <span
            class="xs:hidden transition-none"
            @click="toggleVisibility"
            @keydown.space.exact.prevent="toggleVisibility"
            @keydown.esc.exact="hideDropdown"
            @keydown.shift.tab="hideDropdown"
            @keydown.up.exact.prevent="startArrowKeys"
            @keydown.down.exact.prevent="startArrowKeys"
            v-if="count === 0">
            <i class="iconify cursor-pointer text-gray-700" data-icon="mdi-bell"></i>
        </span>
        <span
            class="xs:hidden transition-none"
            @click="toggleVisibility"
            @keydown.space.exact.prevent="toggleVisibility"
            @keydown.esc.exact="hideDropdown"
            @keydown.shift.tab="hideDropdown"
            @keydown.up.exact.prevent="startArrowKeys"
            @keydown.down.exact.prevent="startArrowKeys"
            v-if="count > 0">
            <i class="iconify cursor-pointer text-gray-700 relative transition-none" data-icon="mdi-bell"></i>
            <span class="flex h-2 w-2 absolute -top-0.5 -right-0.5">
                <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-cerulean-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-cerulean-500"></span>
            </span>
        </span>
        <!--Mobile Notifications TODO:ADD LINK FOR MOBILE-->
        <a href="#" class="sm:hidden md:hidden lg:hidden" v-if="count === 0">
            <i class="iconify cursor-pointer text-gray-100" data-icon="mdi-bell"></i>
        </a>
        <a href="#" class="sm:hidden md:hidden lg:hidden" v-if="count > 0">
            <i class="iconify cursor-pointer text-gray-100 relative" data-icon="mdi-bell"></i>
            <span class="flex h-2 w-2 absolute -top-0.5 -right-0.5">
                <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-cerulean-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-cerulean-500"></span>
            </span>
        </a>
        <div class="transition-none">
            <ul v-on-clickaway="hideDropdown" v-if="isVisible" ref="dropdown"
                class="absolute w-80 bg-white border dark:bg-gray-900 dark:border-gray-700 right-0 shadow mt-3 -mr-20 z-10">
                <li class="py-2 px-3 flex justify-between items-center border-b dark:border-gray-700">
                    <p class="text-gray-700 dark:text-gray-300 text-sm font-medium">Bildirişlər ({{ count }})</p>
                    <div class="flex">
                        <a href="#" class="text-cerulean-700 text-xs" v-if="notifications.length !== 0">
                            Hamısını oxunmuş kimi göstər
                        </a>
                    </div>
                </li>
                <li v-if="notifications.length !== 0" v-for="notification in notifications"
                    class="py-2 px-3 border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800" :class="notification.read_at ? '' : 'bg-gray-100 dark:bg-gray-800'">
                    <a
                        :href="'/article/' + notification.data.id"
                        class="flex gap-2"
                        @keydown.tab.exact="focusNext(false)"
                        @keydown.shift.tab="focusPrevious(false)"
                        @keydown.up.exact.prevent="focusPrevious(true)"
                        @keydown.down.exact.prevent="focusNext(true)"
                        @keydown.esc.exact="hideDropdown"
                    >
                        <img :src="notification.data.avatar" class="w-12 h-12 flex-none image-fit rounded"
                             alt="Profile image">
                        <div>
                            <p class="text-gray-700 dark:text-gray-400 text-xs">
                                <a :href="'/authors/@' + notification.data.author"
                                   class="text-gray-700 dark:text-gray-300 font-medium hover:text-cerulean-500 dark:hover:text-cerulean-500">{{
                                        '@' + notification.data.author
                                    }}</a> yeni
                                paylaşma
                                yazdı
                                <a :href="'/post/' + notification.data.id"
                                   class="text-gray-700 dark:text-gray-300 font-medium">{{ notification.data.title }}</a>
                            </p>
                            <p class="text-gray-700 dark:text-gray-400 text-xs">
                                {{ notification.data.created_at | timeago() }}
                            </p>
                        </div>
                    </a>
                </li>
                <li v-if="notifications.length === 0" class="post-content__item"
                    style="text-align: center; display: grid; grid-gap: 12px; cursor: default;">
                    <span style="font-size: 5rem; opacity: .7;">
                        <i class="mdi mdi-bell-outline"></i>
                    </span>
                    <h3>Bildirişlər yoxdu</h3>
                    <p>Bura belə boş olmasın deyə, paylaşma və şərhlər yazmağa başlayın</p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import {mixin as clickaway} from 'vue-clickaway'

export default {
    mixins: [clickaway],
    props: {
        user: Object,
        notifications: Array,
        count: Number,
    },
    data() {
        return {
            isVisible: false,
            focusedIndex: 0,
            auth: this.user,
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
        }
    }
}
</script>
