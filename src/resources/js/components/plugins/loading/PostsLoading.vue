<template>
    <div class="w-full mb-3 rounded bg-white border animate-pulse">
        <div class="px-3.5">
            <div class="flex align-middle pt-3">
                <div class="inline-flex no-underline">
                    <div class="w-6 h-6 flex-none bg-gray-300 rounded"></div>
                    <span class="text-sm pl-2 m-auto bg-gray-300 w-2/6"></span>
                </div>
                <div class=" my-auto mr-auto pl-2 bg-gray-300 w-1/6 h-4 my-2 rounded"></div>
                <span class="mdi mdi-clock-outline ml-auto"/>
                <span class="my-auto xs:hidden bg-gray-300 w-1/12 h-4 rounded ml-0.5"></span>
            </div>
            <div class="grid grid-flow-col py-2">
                <div class="bg-gray-300 w-2/6 h-5 my-2 rounded"></div>
                <div class="ml-auto text-2xl xs:text-xl">
                    <span class="mdi mdi-thumb-up-outline"/>
                    <span><i class="mdi mdi-spin mdi-loading"/></span>
                    <span class="mdi mdi-thumb-down-outline"/>
                </div>
            </div>
            <div class="flex">
                <div class="border border-gray-400 rounded h-4 my-2 w-12"></div>
                <div class="border border-gray-400 rounded h-4 my-2 w-16 ml-2"></div>
                <div class="border border-gray-400 rounded h-4 my-2 w-12 ml-2"></div>
                <div class="border border-gray-400 rounded h-4 my-2 w-16 ml-2"></div>
            </div>
            <div class="bg-gray-300 w-3/6 h-4 my-2 rounded"></div>
            <div class="bg-gray-300 w-4/6 h-4 my-2 rounded"></div>
            <div class="bg-gray-300 w-3/6 h-4 my-2 rounded"></div>
            <div class="bg-gray-300 w-4/6 h-4 my-2 rounded"></div>
        </div>
        <div class="grid lg:grid-cols-main md:grid-cols-main border text-sm bg-gray-100 mt-2 px-3.5 py-2">
            <div class="xs:flex xs:justify-between">
                <span>
                    <i class="mdi mdi-eye-outline"/>
                    <i class="mdi mdi-spin mdi-loading"/>
                    <span class="xs:hidden">Baxışların sayı</span>
                </span>
                <span class="pl-1">
                    <i class="mdi mdi-comment-text-multiple-outline"/>
                    <i class="mdi mdi-spin mdi-loading"/>
                    <span class="xs:hidden">Şerh</span>
                </span>
                <span>
                    <i class="mdi mdi-bookmark"/>
                    <i class="mdi mdi-spin mdi-loading"/>
                    <span class="xs:hidden">Seçilmiş</span>
                </span>
                <span class="pl-1">
                    <i class="mdi mdi-share"/>
                    <span class="xs:hidden">Paylaş</span>
                </span>
            </div>
            <div class="xs:hidden block">
                <div class="m-auto bg-gray-300">
                    <div class="absolute h-1 bg-blue inset-y-1/2 rounded"></div>
                </div>
            </div>
        </div>
    </div>
</template>
