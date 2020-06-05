<template>
    <div class="relative">
        <button
                href="#"
                class="flex items-center"
                style="background: none; padding: 0"
                @click="toggleVisibility"
                @keydown.space.exact.prevent="toggleVisibility"
                @keydown.esc.exact="hideDropdown"
                @keydown.shift.tab="hideDropdown"
                @keydown.up.exact.prevent="startArrowKeys"
                @keydown.down.exact.prevent="startArrowKeys"
        >
        <img v-if="user.avatar !== 'user.jpg'" :src="'/upload/user_' + user.id + '/logo/' + user.avatar"
             style="width: 30px; height: 30px; border-radius: 2px; object-fit: cover; text-align: center;"
             alt="Profile image">
        <img v-else-if="user.avatar === 'user.jpg'" :src="'/upload/default/logo/default.png'"
             style="width: 30px; height: 30px; border-radius: 2px; object-fit: cover; text-align: center;"
             alt="Profile image">
        </button>
        <transition name="dropdown-fade">
            <ul v-on-clickaway="hideDropdown" v-if="isVisible" ref="dropdown"
                class="menu">
                <h3 class="menu-head">Profil</h3>
                <li>
                    <a
                            :href="'/users/@' + user.username"
                            @keydown.tab.exact="focusNext(false)"
                            @keydown.shift.tab="focusPrevious(false)"
                            @keydown.up.exact.prevent="focusPrevious(true)"
                            @keydown.down.exact.prevent="focusNext(true)"
                            @keydown.esc.exact="hideDropdown"
                    >
                        <span class="ml-2"><i class="mdi mdi-badge-account-horizontal"></i> Profilim</span>
                    </a>
                </li>
                <li>
                    <a
                            :href="'/@'+ user.username +'/settings/profile'"
                            @keydown.tab.exact="focusNext(false)"
                            @keydown.shift.tab="focusPrevious(false)"
                            @keydown.up.exact.prevent="focusPrevious(true)"
                            @keydown.down.exact.prevent="focusNext(true)"
                            @keydown.esc.exact="hideDropdown"
                    >
                        <span class="ml-2"><i class="mdi mdi-account-cog"/> Parametrlər</span>
                    </a>
                </li>
                <h3 class="menu-head">Görünüş</h3>
                <li @click="toggle" class="drop-grid">
                    <div class="switch-button-control">
                        <i class="mdi mdi-weather-night"/>
                        <div class="switch-button-label">
                            Dark
                        </div>
                        <div class="switch-button" :class="{ enabled: isEnabled }">
                            <div class="button"></div>
                        </div>
                    </div>
                </li>
                <h3 class="menu-head">Digər</h3>
                <li v-if="admin">
                    <a
                            href="/admin"
                            @keydown.tab.exact="focusNext(false)"
                            @keydown.shift.tab="focusPrevious(false)"
                            @keydown.up.exact.prevent="focusPrevious(true)"
                            @keydown.down.exact.prevent="focusNext(true)"
                            @keydown.esc.exact="hideDropdown"
                    >
                        <span class="ml-2"><i class="mdi mdi-account-cowboy-hat"></i> Admin panel</span>
                    </a>
                </li>
                <li>
                    <a
                            :href="fav"
                            @keydown.tab.exact="focusNext(false)"
                            @keydown.shift.tab="focusPrevious(false)"
                            @keydown.up.exact.prevent="focusPrevious(true)"
                            @keydown.down.exact.prevent="focusNext(true)"
                            @keydown.esc.exact="hideDropdown"
                    >
                        <span class="ml-2"><i class="mdi mdi-bookmark-check"></i> Seçilmişlər</span>
                    </a>
                </li>
                <hr class="line">
                <li @click.prevent="logout">
                    <a
                            href="#"
                            @keydown.tab.exact="focusNext(false)"
                            @keydown.shift.tab="focusPrevious(false)"
                            @keydown.up.exact.prevent="focusPrevious(true)"
                            @keydown.down.exact.prevent="focusNext(true)"
                            @keydown.esc.exact="hideDropdown"
                    >
                        <span class="ml-2"><i class="mdi mdi-exit-to-app"/> Çıxmaq</span>
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
        props: ['user', 'fav', 'admin'],
        data() {
            return {
                switch: true,
                body: document.getElementsByTagName('body')[0],
                atr: document.getElementsByTagName('body')[0].getAttribute('data-theme'),
                cookatr: window.$cookies.get('atr'),
                isEnabled: null,
                isVisible: false,
                focusedIndex: 0,
                isActive: true,
            }
        },
        created: function () {
            if (!this.cookatr) {
                this.cookatr = this.atr
            }
            if (this.cookatr === 'dark')
                this.isEnabled = true
            else if (this.cookatr === 'default')
                this.isEnabled = false
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
                    .then(({data}) => {
                        window.location.reload();
                    });
            }
        }
    }
</script>

<style scoped lang="scss">
    .dropdown-fade-enter-active, .dropdown-fade-leave-active {
        transition: all .1s ease-in-out;
    }

    .dropdown-fade-enter, .dropdown-fade-leave-to {
        opacity: 0;
        transform: translateY(-12px);
    }

    .drop-grid {
        padding: 10px 0;
    }

    .switch-button-control {
        display: flex;
        flex-direction: row;
        align-items: center;

        .switch-button {
            $switch-button-height: 1.6em;
            $switch-button-color: var(--color-primary-main);
            $switch-button-border-thickness: 2px;
            $switch-transition: all 0.3s ease-in-out;
            $switch-is-rounded: true;

            height: $switch-button-height;
            width: calc(#{$switch-button-height} * 2);
            border: $switch-button-border-thickness solid $switch-button-color;
            box-shadow: inset 0 0 $switch-button-border-thickness 0 rgba(0, 0, 0, 0.33);
            border-radius: if($switch-is-rounded, $switch-button-height, 0);
            margin-left: auto;
            margin-right: 10px;

            transition: $switch-transition;

            $button-side-length: calc(
                    #{$switch-button-height} - (2 * #{$switch-button-border-thickness})
            );

            cursor: pointer;

            .button {
                height: $button-side-length;
                width: $button-side-length;
                border: $switch-button-border-thickness solid $switch-button-color;
                border-radius: if($switch-is-rounded, $button-side-length, 0);
                background: var(--text-black-secondary);

                transition: $switch-transition;
            }

            &.enabled {
                background-color: $switch-button-color;
                box-shadow: none;

                .button {
                    background: white;
                    transform: translateX(
                                    calc(#{$button-side-length} + (2 * #{$switch-button-border-thickness}))
                    );
                }
            }
        }

        .switch-button-label {
            margin-left: 3px;
        }
    }

    .line {
        border-top: 1px solid var(--text-black-secondary);
        margin: 0 16px;
    }
</style>
