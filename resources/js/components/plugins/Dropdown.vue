<template>
    <div class="relative">
        <button
            href="#"
            class="flex items-center"
            style="background: none;"
            @click="toggleVisibility"
            @keydown.space.exact.prevent="toggleVisibility"
            @keydown.esc.exact="hideDropdown"
            @keydown.shift.tab="hideDropdown"
            @keydown.up.exact.prevent="startArrowKeys"
            @keydown.down.exact.prevent="startArrowKeys"
        >
             text
        </button>
        <transition name="dropdown-fade">
            <ul v-on-clickaway="hideDropdown" v-if="isVisible" ref="dropdown"
                class="menu">
                <li>
                    <a
                        href="#"
                        @keydown.tab.exact="focusNext(false)"
                        @keydown.shift.tab="focusPrevious(false)"
                        @keydown.up.exact.prevent="focusPrevious(true)"
                        @keydown.down.exact.prevent="focusNext(true)"
                        @keydown.esc.exact="hideDropdown"
                    >
                        <span class="ml-2"><i class="icon feather icon-heading"></i> Paylaşmalar</span>
                    </a>
                </li>
                <li>
                    <a
                        href="#"
                        @keydown.tab.exact="focusNext(false)"
                        @keydown.shift.tab="focusPrevious(false)"
                        @keydown.up.exact.prevent="focusPrevious(true)"
                        @keydown.down.exact.prevent="focusNext(true)"
                        @keydown.esc.exact="hideDropdown"
                    >
                        <span class="ml-2"><i class="icon feather icon-bookmark"></i> Seçilmişlər</span>
                    </a>
                </li>
                <li>
                    <a
                        :href="'/@'+ auth.username +'/settings'"
                        @keydown.tab.exact="focusNext(false)"
                        @keydown.shift.tab="focusPrevious(false)"
                        @keydown.up.exact.prevent="focusPrevious(true)"
                        @keydown.down.exact.prevent="focusNext(true)"
                        @keydown.esc.exact="hideDropdown"
                    >
                        <span class="ml-2"><i class="icon feather icon-settings"></i> Parametrlər</span>
                    </a>
                </li>
                <li>
                    <a
                        href="#"
                        @keydown.tab.exact="focusNext(false)"
                        @keydown.shift.tab="focusPrevious(false)"
                        @keydown.up.exact.prevent="focusPrevious(true)"
                        @keydown.down.exact.prevent="focusNext(true)"
                        @keydown.esc.exact="hideDropdown"
                    >
                        <span class="ml-2"><i class="icon feather icon-power"></i> Çıxmaq</span>
                    </a>
                </li>
            </ul>
        </transition>
    </div>
</template>

<script>
    import {mixin as clickaway} from 'vue-clickaway'

    export default {
        mixins: [clickaway],
        props: ['user'],
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

<style scoped>
    .dropdown-fade-enter-active, .dropdown-fade-leave-active {
        transition: all .1s ease-in-out;
    }

    .dropdown-fade-enter, .dropdown-fade-leave-to {
        opacity: 0;
        transform: translateY(-12px);
    }
</style>
