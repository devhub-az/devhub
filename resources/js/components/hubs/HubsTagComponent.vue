<template>
    <div class="flex break-words flex-wrap">
        <div class="border relative rounded text-sm cursor-pointer px-2 mr-2 my-1"
             v-for="hub in data"
             :class="(hub.follower_check ? 'bg-cerulean-100 border-cerulean-100 text-white dark:text-gray-300 dark:border-cerulean-700 dark:hover:border-cerulean-700' : 'border-gray-200 dark:text-gray-300 hover:border-cerulean-500 dark:border-gray-700 text-gray-700 dark:hover:border-cerulean-700') + (hub.hover ? 'popup-active': '')"
             @mouseover="hub.hover = true"
             @mouseleave="hub.hover = false">
            {{ hub.name }}
            <div class="absolute rounded t-2 pt-2 -left-1/2 cursor-auto" v-if="hub.hover">
                <div class="w-80 p-2 shadow border rounded bg-white dark:bg-dpaper dark:border-gray-700">
                    <div class="flex pb-2">
                        <img :src="'/' + hub.logo" alt="Hub logo" class="w-10 h-10 rounded">
                        <div class="pl-2">
                            <h3 class="font-semibold"><a :href="'/hubs/' + hub.id">{{ hub.name }}</a></h3>
                            <div class="flex text-xs">
                                <p>{{ hub.hub_followers_count }} izləyən</p>
                                <p class="ml-2">{{ hub.rating }} reyting</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm">{{ hub.description }}</p>
                    <hub-follow-button :id="hub.id" :follower_check="hub.follower_check"
                                       @follow-status-updated="hub.follower_check = $event" :auth_check="auth_check"
                                       class="py-3 w-max"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['data', 'auth_check'],
    created() {
        this.data.forEach((item) => {
            this.$set(item, 'hover', false)
        })
    }
}
</script>
