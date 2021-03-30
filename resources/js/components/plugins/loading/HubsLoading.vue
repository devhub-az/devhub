<template>
    <div class="flex space-x-4 border mb-2 p-2 bg-white dark:bg-transparent dark:text-gray-300 dark:border-gray-700 animate-pulse">
        <div class="w-16 h-12 rounded bg-gray-400"></div>
        <div class="w-8/12">
            <div class="pl-2 bg-gray-400 w-2/12 h-4 rounded mb-2"></div>
            <div class="pl-2 bg-gray-400 w-9/12 h-3 rounded mb-1"></div>
            <div class="pl-2 bg-gray-400 w-6/12 h-3 rounded mb-2"></div>
            <div class="flex items-center">
                <i class="iconify" data-icon="mdi-text-box-multiple"></i>
                <div class="ml-2 bg-gray-400 w-2/12 h-3 rounded"></div>
                <div class="animate-spin ml-1">
                    <div class="iconify" data-icon="mdi-loading"></div>
                </div>
            </div>
        </div>
        <div class="w-1/12 m-auto text-center xs:hidden">
            <div class="mb-2">
                <div class="animate-spin w-6 h-6 mx-auto">
                    <div class="iconify" data-icon="mdi-loading"></div>
                </div>
            </div>
            <div class="pl-2 bg-gray-400 w-full h-4 rounded"></div>
        </div>
        <div class="w-1/12 m-auto text-center xs:hidden">
            <div class="mb-2">
                <div class="animate-spin w-6 h-6 mx-auto">
                    <div class="iconify" data-icon="mdi-loading"></div>
                </div>
            </div>
            <div class="pl-2 bg-gray-400 w-full h-4 rounded"></div>
        </div>
        <div class="m-auto w-2/12">
            <div
                class="border text-xs rounded px-3 py-2 mx-4 cursor-pointer">
                <div class="bg-gray-400 w-16 h-3 rounded xs:hidden"></div>
            </div>
        </div>
    </div>
</template>
