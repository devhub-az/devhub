<template>
    <div class="relative">
        <span
                class="flex items-center"
                style="background: none;"
                @click="toggleVisibility"
                @keydown.space.exact.prevent="toggleVisibility"
                @keydown.esc.exact="hideDropdown"
                @keydown.shift.tab="hideDropdown"
                @keydown.up.exact.prevent="startArrowKeys"
                @keydown.down.exact.prevent="startArrowKeys"
                v-if="count == 0"
        >
            <span class="mdi mdi-bell badge"></span>
        </span>
        <span
                class="flex items-center"
                style="background: none;"
                @click="toggleVisibility"
                @keydown.space.exact.prevent="toggleVisibility"
                @keydown.esc.exact="hideDropdown"
                @keydown.shift.tab="hideDropdown"
                @keydown.up.exact.prevent="startArrowKeys"
                @keydown.down.exact.prevent="startArrowKeys"
                v-if="count > 0"
        >
            <span class="mdi mdi-bell badge" :data-badge="count"></span>
        </span>
        <transition name="dropdown-fade">
            <ul v-on-clickaway="hideDropdown" v-if="isVisible" ref="dropdown"
                class="notif-menu">
                <div class="header">
                    <span>Bildirişlər</span>
                    <span class="untrack" v-if="notifications.length !== 0"><a href="#">Hamısını oxunmuş kimi göstər</a></span>
                </div>
                <li v-if="notifications.length !== 0" v-for="notification in notifications">
                    <a
                            :href="'/post/' + notification.data.id"
                            @keydown.tab.exact="focusNext(false)"
                            @keydown.shift.tab="focusPrevious(false)"
                            @keydown.up.exact.prevent="focusPrevious(true)"
                            @keydown.down.exact.prevent="focusNext(true)"
                            @keydown.esc.exact="hideDropdown"
                    >
                        <div name="js-notify" class="notification">
                                <span class="notification__image">
                                    <img src="http://127.0.0.1:8000/images/profile/deadpool.gif" alt="user avatar"
                                         width="40" height="40">
                                </span>
                            <div class="notification__text">
                                <p name="js-notification-text">
                                    <a href="" class="link-author">{{ notification.data.creator }}</a> yeni paylaşma
                                    yazdı:
                                    <a :href="'/post/' + notification.data.id">{{ notification.data.title }}</a>
                                </p>
                                <div class="notification__footer">
                                    {{ notification.data.created_at | timeago() }}
                                </div>
                            </div>
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
        </transition>
    </div>
</template>

<script>
    import {mixin as clickaway} from 'vue-clickaway'

    export default {
        mixins: [clickaway],
        props: ['user', 'not', 'count'],
        data() {
            return {
                isVisible: false,
                focusedIndex: 0,
                auth: this.user,
                notifications: this.not,
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

<style scoped>
    .dropdown-fade-enter-active, .dropdown-fade-leave-active {
        transition: all .1s ease-in-out;
    }

    .dropdown-fade-enter, .dropdown-fade-leave-to {
        opacity: 0;
        transform: translateY(-12px);
    }
</style>
