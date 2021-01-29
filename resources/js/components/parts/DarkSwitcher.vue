<template>
    <div
        class="flex justify-between items-center cursor-pointer block px-4 py-1 text-sm capitalize text-gray-700 hover:bg-blue hover:text-black"
        @click="toggle">
        <p class="dark:text-gray-300">Dark mode</p>
        <div class="w-9 h-5 flex items-center bg-gray-300 rounded-full duration-300 ease-in-out"
             :class="{ 'dark:bg-cerulean-100': toggleActive}">
            <div class="bg-white w-5 h-5 rounded-full border border-gray-300 transform duration-300 ease-in-out"
                 :class="{ 'translate-x-5': toggleActive}"></div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            toggleActive: localStorage.theme === 'dark',
        };
    },
    methods: {
        toggle: function () {
            this.toggleActive = !this.toggleActive;
            if (localStorage.theme === 'dark') {
                localStorage.theme = ''
                document.querySelector('html').classList.remove('dark')
            } else {
                localStorage.theme = 'dark'
                document.querySelector('html').classList.add('dark')
            }
        }
    }
}
</script>
