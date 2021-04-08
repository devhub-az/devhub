<template>
    <div class="w-full mb-3 rounded bg-white dark:bg-dpaper dark:text-gray-300 dark:border-gray-700 border animate-pulse">
        <div class="flex justify-between items-center px-3.5 py-1 z-10">
            <div class="inline-flex no-underline">
                <div class="w-6 h-6 flex-none bg-gray-300 rounded"></div>
                <span class="text-sm pl-2 m-auto bg-gray-300 w-2/6"></span>
            </div>
            <div class="my-auto mr-auto pl-2 bg-gray-300 w-1/6 h-4 my-2 rounded"></div>
            <div class="flex space-x-1 ml-auto pl-2 text-2xl items-center xs:hidden mb-auto">
                <span class="iconify h-4 dark:text-gray-300" data-icon="tabler:clock"></span>
                <div class="bg-gray-300 w-12 h-1 my-2 rounded py-2"></div>
            </div>
        </div>
        <div class="px-3.5">
            <div class="flex items-center">
                <div class="bg-gray-300 w-5/6 h-5 my-2 rounded xs:w-5/6 py-2"></div>
                <div class="flex space-x-1 ml-auto text-2xl xs:text-xl">
                    <div class="iconify" data-icon="tabler:thumb-up"/>
                    <div class="animate-spin w-6 h-6">
                        <div class="iconify" data-icon="mdi-loading"></div>
                    </div>
                    <div class="iconify" data-icon="tabler:thumb-up" data-rotate="180deg"/>
                </div>
            </div>
            <div class="bg-gray-300 w-3/6 h-5 my-2 rounded xs:w-3/6 py-2"></div>
            <div class="flex">
                <div class="border border-gray-400 rounded h-4 my-2 w-12"></div>
                <div class="border border-gray-400 rounded h-4 my-2 w-16 ml-2"></div>
                <div class="border border-gray-400 rounded h-4 my-2 w-12 ml-2"></div>
                <div class="border border-gray-400 rounded h-4 my-2 w-16 ml-2"></div>
            </div>

            <div class="bg-gray-300 w-11/12 h-4 my-2 rounded xs:w-11/12 py-2"></div>
            <div class="bg-gray-300 w-9/12 h-4 my-2 rounded xs:w-9/12 py-2"></div>
            <div class="bg-gray-300 w-10/12 h-4 my-2 rounded xs:w-10/12 py-2"></div>
            <div class="bg-gray-300 w-8/12 h-4 my-2 rounded xs:w-7/12 py-2"></div>
            <div class="bg-gray-300 w-11/12 h-4 my-2 rounded xs:w-11/12 py-2"></div>
            <div class="bg-gray-300 w-9/12 h-4 my-2 rounded xs:w-9/12 py-2"></div>
            <div class="bg-gray-300 w-10/12 h-4 my-2 rounded xs:w-10/12 py-2"></div>
        </div>
        <div
            class="grid lg:grid-cols-main border-t rounded-b text-sm bg-afooter dark:bg-gray-800 dark:border-gray-700 mt-2 px-3.5 h-10">
            <div class="flex xs:justify-between items-center md:justify-between sm:justify-between space-x-10">
                <div class="flex items-center">
                    <i class="iconify" data-icon="tabler:eye"/>
                    <div class="animate-spin ml-1">
                        <span class="iconify" data-icon="mdi-loading"></span>
                    </div>
                </div>
                <div class="flex items-center">
                    <i class="iconify text-gray-500 dark:text-gray-300" data-icon="tabler:message"/>
                    <div class="animate-spin ml-1">
                        <span class="iconify" data-icon="mdi-loading"></span>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="iconify text-gray-500 dark:text-gray-300" data-icon="tabler:device-floppy" data-inline="false"></span>
                    <div class="animate-spin ml-1">
                        <span class="iconify" data-icon="mdi-loading"></span>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="iconify text-gray-500 dark:text-gray-300" data-icon="tabler:share" data-inline="false"></span>
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
