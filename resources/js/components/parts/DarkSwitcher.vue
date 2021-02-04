<template>

        <div class="w-9 h-5 flex items-center cursor-pointer bg-gray-300 rounded-full duration-300 ease-in-out"
             :class="{ 'dark:bg-cerulean-100': toggleActive}" @click="toggle">
            <div class="bg-white w-5 h-5 rounded-full border border-gray-300 transform duration-300 ease-in-out"
                 :class="{ 'translate-x-5': toggleActive}"></div>
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
