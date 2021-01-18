<template>
    <div class="mt-1 relative">
        <button type="button" aria-haspopup="listbox" aria-expanded="true"
                @click="show = !show"
                class="relative w-full bg-white border dark:bg-dpaper dark:border-gray-700 border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-100 transition-colors pl-3 pr-7 h-7 text-left focus:outline-none focus:ring-0 focus:border-none sm:text-sm">
            <span class="flex items-center">
                <span class="iconify transition-none "
                      :class="selected.icon === 'bx:bxs-hot' ? 'text-red-400' : ''"
                      :data-icon="selected.icon" data-inline="false"></span>
                <span class="ml-1 block truncate dark:text-gray-300">
                    {{ selected.name }}
                </span>
            </span>
            <span class="ml-1 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <span class="iconify transition-none dark:text-gray-300" data-icon="heroicons-outline:selector" data-inline="false"></span>
            </span>
        </button>
        <transition name="fade">
            <div v-on-clickaway="hideDropdown" v-if="show" class="absolute mt-2 min-w-min w-full right-0 rounded-md border bg-white dark:bg-dpaper dark:border-gray-700 border-gray-300 shadow-lg z-20">
                <ul class="max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                    <li id="listbox-item-0" role="option"
                        class="text-gray-900 cursor-default select-none relative">
                        <div class="flex items-center cursor-pointer px-3 hover:bg-gray-300" @click="ChangePage(page)"
                             v-for="page in menu">
                            <span class="iconify transition-none"
                                  :class="page.icon === 'bx:bxs-hot' ? 'text-red-400' : 'dark:text-gray-300'"
                                  :data-icon="page.icon" data-inline="false"></span>
                            <span class="ml-1 block truncate dark:text-gray-300">
                                {{ page.name }}
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>

<script>
import {mixin as clickaway} from 'vue-clickaway'

export default {
    mixins: [clickaway],
    props: {
        menu: {type: Array, required: true},
        selected: {type: Object, required: true},
    },
    data: function () {
        return {
            show: false
        }
    },
    methods: {
        ChangePage(page) {
            window.location = page.url;
        },
        hideDropdown() {
            this.show = false
        },
    }
}
</script>
<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
{
    opacity: 0;
}
</style>
