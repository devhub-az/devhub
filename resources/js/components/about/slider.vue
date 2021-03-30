<template>
    <div class="relative flex slider dark:slider overflow-hidden">
        <ul class="flex mb-2 left-0 w-full py-6 animation xs:hidden md:hidden sm:hidden">
            <li v-for="hub in hubs"
                class="flex flex-shrink-0 border dark:border-gray-700 mx-4 p-2 w-max bg-white rounded dark:bg-dpaper dark:text-gray-300">
                <img class="w-16 h-16 rounded p-1" :src="hub.logo"
                     alt="Hub logo">
            </li>
        </ul>
        <ul class="flex mb-2 left-0 w-full py-6 animation xs:hidden md:hidden sm:hidden">
            <li v-for="hub in hubs"
                class="flex flex-shrink-0 border dark:border-gray-700 mx-4 p-2 w-max bg-white rounded dark:bg-dpaper dark:text-gray-300">
                <img class="w-16 h-16 rounded p-1" :src="hub.logo"
                     alt="Hub logo">
            </li>
        </ul>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data: function () {
        return {
            hubs: [],
        }
    },
    async created() {
        await this.getHubs()
    },
    methods: {
        async getHubs() {
            await axios.get('api/hubs/filter/all').then(({data}) => {
                for (let i = 0; i < 9; i++) {
                    let random = Math.floor(Math.random() * data.length);
                    this.hubs.push(data[random])
                }
            })
        }
    }
}
</script>

<style>
.animation {
    animation: animation 60s linear infinite;
}

.slider:hover .animation {
    -webkit-animation-play-state: paused;
    -moz-animation-play-state: paused;
    -o-animation-play-state: paused;
    animation-play-state: paused;
}

.dark .dark\:slider:after {
    content: "";
    background: linear-gradient(to right, #141618 0, rgb(255 255 255 / 0%) 30%, rgb(23 28 32 / 0%) 70%, #141618 100%);
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
}

.slider:after {
    content: "";
    background: linear-gradient(to right, #f4f4f4 0, rgb(255 255 255 / 0%) 30%, rgb(23 28 32 / 0%) 70%, #f4f4f4 100%);
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
}

@keyframes animation {
    0% {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
    }
    100% {
        -webkit-transform: translateX(-100%);
        -ms-transform: translateX(-100%);
        transform: translateX(-100%);
    }
}
</style>
