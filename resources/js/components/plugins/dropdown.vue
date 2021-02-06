<template>
    <div class="mt-1 relative">
        <button @click="show = !show" type="button" aria-haspopup="listbox" aria-expanded="true"
                class="flex items-center focus:outline-none p-0 bg-none">
            <img v-if="user.avatar !== 'default'" :src="'/upload/avatars/' + user.avatar"
                 class="w-8 h-8 flex-none image-fit rounded lazyload"
                 alt="Profile image">
            <img v-else-if="user.avatar === 'default'" src="/upload/avatars/default.png"
                 class="w-8 h-8 flex-none image-fit rounded lazyload"
                 alt="Profile image">
        </button>
        <transition name="fade">
            <div v-on-clickaway="hideDropdown" v-if="show" class="mt-2 absolute right-0 origin-top-right z-50">
                <div
                    class="w-52 text-sm text-left border border-gray-300 bg-white dark:bg-dpaper dark:border-gray-700 rounded shadow-lg">
                    <div class="flex items-center p-3">
                        <img v-if="user.avatar !== 'default'" :src="'/upload/avatars/' + user.avatar"
                             class="h-10 w-10 rounded flex-no-shrink"
                             alt="Profile image">
                        <img v-else-if="user.avatar === 'default'" src="/upload/avatars/default.png"
                             class="h-8 w-8 rounded flex-no-shrink"
                             alt="Profile image">
                        <div class="ml-2">
                            <a :href="'/authors/@' + user.username"
                               class="font-semibold text-gray-900 dark:text-gray-300 leading-none">
                                {{ user.name ? user.name : '@' + user.username }}</a>
                        </div>
                    </div>
                    <div class="bg-gray-300 dark:bg-gray-700" style="height: 1px;"></div>
                    <div class="dark:border-gray-700 border-gray-200 py-1">
                        <a href="#"
                           class="block text-gray-700 dark:text-gray-300 px-4 py-2 leading-tight hover:bg-gray-200 dark:hover:bg-gray-700">
                            Paylaşmalarım
                        </a>
                        <a href="#"
                           class="block text-gray-700 dark:text-gray-300 px-4 py-2 leading-tight hover:bg-gray-200 dark:hover:bg-gray-700">
                            Seçilmişlərım
                        </a>
                    </div>
                    <div class="bg-gray-300 dark:bg-gray-700" style="height: 1px;"></div>
                    <div class="dark:border-gray-700 border-gray-200 py-1">
                        <a :href="'/settings'"
                           class="block text-gray-700 dark:text-gray-300 px-4 py-2 leading-tight hover:bg-gray-200 dark:hover:bg-gray-700">Parametrlər</a>
                        <div
                            class="flex items-center justify-between text-gray-700 dark:text-gray-300 px-4 py-2 leading-tight hover:bg-gray-200 dark:hover:bg-gray-700">
                            <p>Gecə modu</p>
                            <switcher></switcher>
                        </div>
                    </div>
                    <div class="bg-gray-300 dark:bg-gray-700" style="height: 1px;"></div>
                    <div class="dark:border-gray-700 border-gray-200 py-1">
                        <button @click="logout"
                                class="block w-full text-gray-700 dark:text-gray-300 px-4 py-2 text-left leading-tight hover:bg-gray-200 dark:hover:bg-gray-700">
                            Çıxmaq
                        </button>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
import {mixin as clickaway} from 'vue-clickaway'
import axios from "axios"

export default {
    mixins: [clickaway],
    props: ['user', 'fav'],
    data() {
        return {
            show: false,
        }
    },
    methods: {
        hideDropdown() {
            this.show = false
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

<style>
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
{
    opacity: 0;
}
</style>
