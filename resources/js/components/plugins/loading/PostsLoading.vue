<template>
    <div
        class="w-full mb-3 rounded bg-white dark:bg-dpaper dark:text-gray-300 dark:border-gray-700 border animate-pulse">
        <div class="px-3.5">
            <div class="flex align-middle pt-3">
                <div class="inline-flex no-underline">
                    <div class="w-6 h-6 flex-none bg-gray-400 rounded"></div>
                    <div class="text-sm pl-2 m-auto bg-gray-400 w-2/6"></div>
                </div>
                <div class=" my-auto mr-auto pl-2 bg-gray-400 w-1/6 h-4 my-2 rounded"></div>
                <div class="iconify" data-icon="mdi-clock-outline ml-auto"/>
                <div class="my-auto xs:hidden bg-gray-400 w-1/12 h-4 rounded ml-0.5"></div>
            </div>
            <div class="grid grid-flow-col">
                <div class="bg-gray-400 w-5/6 h-5 my-2 rounded xs:w-full"></div>
                <div class="flex space-x-1 ml-auto text-2xl xs:text-xl">
                    <div class="iconify" data-icon="mdi-thumb-up-outline"/>
                    <div class="animate-spin w-6 h-6">
                        <div class="iconify" data-icon="mdi-loading"></div>
                    </div>
                    <div class="iconify" data-icon="mdi-thumb-down-outline"/>
                </div>
            </div>
            <div class="flex">
                <div class="border border-gray-400 rounded h-4 my-2 w-12"></div>
                <div class="border border-gray-400 rounded h-4 my-2 w-16 ml-2"></div>
                <div class="border border-gray-400 rounded h-4 my-2 w-14 ml-2"></div>
                <div class="border border-gray-400 rounded h-4 my-2 w-20 ml-2"></div>
            </div>
            <div v-for="index in randomNumber(5, 12)" class="bg-gray-400 h-4 my-2 rounded xs:hidden"
                 :class="'w-'+ randomNumber(7, 12) + '/12'"></div>
        </div>
        <div
            class="grid lg:grid-cols-main md:grid-cols-main border-t dark:bg-gray-800 dark:border-gray-700 text-sm bg-gray-100 mt-2 px-3.5 py-2">
            <div class="flex xs:justify-between items-center md:justify-between sm:justify-between space-x-10">
                <div class="flex items-center">
                    <i class="iconify" data-icon="mdi-eye-outline"/>
                    <div class="animate-spin ml-1">
                        <span class="iconify" data-icon="mdi-loading"></span>
                    </div>
                </div>
                <div class=" flex items-center">
                    <i class="iconify" data-icon="bx:bx-comment-detail"/>
                    <div class="animate-spin ml-1">
                        <span class="iconify" data-icon="mdi-loading"></span>
                    </div>
                </div>
                <div class="flex items-center ">
                    <i class="iconify" data-icon="fa-solid:save"/>
                    <div class="animate-spin ml-1">
                        <span class="iconify" data-icon="mdi-loading"></span>
                    </div>
                </div>
                <div class="flex items-center ">
                    <i class="iconify" data-icon="fa-solid:share-alt"/>
                </div>
            </div>
            <div class="my-auto h-1 balloon xs:hidden md:hidden sm:hidden">
                <div class="my-auto bg-gray-400 w-full rounded h-1 relative">
                    <div class="absolute h-1 bg-blue inset-y-1/2 rounded"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        randomNumber: function (min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min)
        }
    }
}
</script>
