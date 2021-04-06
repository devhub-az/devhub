<template>
    <div class="flex justify-between border mb-2 p-2 bg-white dark:bg-transparent dark:text-gray-300 dark:border-gray-700 animate-pulse">
        <div class="flex space-x-3 w-full">
            <div class="w-14 h-14 p-1 rounded bg-gray-400"></div>
            <div class="w-10/12">
                <div class="h-16 mb-2">
                    <div class="pl-2 bg-gray-400 w-4/12 h-4 rounded mb-2"></div>
                    <div class="pl-2 bg-gray-400 w-11/12 h-3 rounded mb-2"></div>
                    <div class="pl-2 bg-gray-400 w-9/12 h-3 rounded mb-2"></div>
                </div>
                <div class="flex items-center text-xs">
                    <div class="flex items-center">
                        <i class="iconify" data-icon="tabler:users"></i>
                        <div class="ml-2 bg-gray-400 w-12 h-3 rounded"></div>
                        <div class="animate-spin ml-1">
                            <div class="iconify" data-icon="mdi-loading"></div>
                        </div>
                    </div>
                    <div class="flex items-center mx-2">
                        <i class="iconify" data-icon="tabler:trending-up"></i>
                        <div class="ml-2 bg-gray-400 w-12 h-3 rounded"></div>
                        <div class="animate-spin ml-1">
                            <div class="iconify" data-icon="mdi-loading"></div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="iconify" data-icon="tabler:mist"></i>
                        <div class="ml-2 bg-gray-400 w-12 h-3 rounded"></div>
                        <div class="animate-spin ml-1">
                            <div class="iconify" data-icon="mdi-loading"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-auto w-max px-6">
            <div
                class="border text-xs rounded px-3 py-2 cursor-pointer">
                <div class="bg-gray-400 w-24 h-3 rounded xs:hidden"></div>
            </div>
        </div>
    </div>
</template>
