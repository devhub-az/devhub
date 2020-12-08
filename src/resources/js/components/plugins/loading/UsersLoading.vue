<template>
    <div class="flex gap-4 border mb-2 p-2 bg-white animate-pulse">
        <div class="w-16 h-16 rounded bg-gray-300 p-1"></div>
        <div class="w-6/12">
            <div class="pl-2 bg-gray-300 w-2/12 h-4 rounded mb-2"></div>
            <div class="pl-2 bg-gray-300 w-5/12 h-3 rounded mb-1"></div>
            <div class="pl-2 bg-gray-300 w-3/12 h-3 rounded"></div>
        </div>
        <div class="w-1/12 m-auto text-center xs:hidden">
            <div class="mb-2"><i class="mdi mdi-spin mdi-loading"/></div>
            <div class="pl-2 bg-gray-300 w-full h-4 rounded"></div>
        </div>
        <div class="w-1/12 m-auto text-center xs:hidden">
            <div class="mb-2"><i class="mdi mdi-spin mdi-loading"/></div>
            <div class="pl-2 bg-gray-300 w-full h-4 rounded"></div>
        </div>
        <div class="w-1/12 m-auto text-center xs:hidden">
            <div class="mb-2"><i class="mdi mdi-spin mdi-loading"/></div>
            <div class="pl-2 bg-gray-300 w-full h-4 rounded"></div>
        </div>
        <div class="w-2/12 m-auto">
            <div class="flex items-center w-24 xs:hidden border m-auto uppercase text-xs rounded px-4 py-2 cursor-pointer hover:border-blue_def-400">
                <div class="bg-gray-300 w-full h-3 rounded"></div>
            </div>
        </div>
    </div>
</template>
