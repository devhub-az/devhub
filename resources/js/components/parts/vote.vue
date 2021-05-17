<template>
    <div class="flex space-x-1 ml-auto pl-2 text-2xl items-center xs:text-xl mb-auto"
         :title="item.attributes.votes + ':  ↑ ' + [item.attributes.upvotes === 0 ? '0' : item.attributes.upvotes ] + ' ↓ ' + [item.attributes.downvotes === 0 ? '0' : item.downvotes]">
        <span @click="upVote(item.id)" class="transition-none"
              :class="item.attributes.is_up_voted ? 'text-green-600 dark:text-green-500' : 'dark:text-gray-300'">
            <span class="hover:text-green-600 cursor-pointer iconify transition-none"
                  data-icon="tabler:chevron-up"/>
        </span>
        <transition name="slide" mode="out-in">
            <div v-if="odds > 0" class="bg-[#eefbf3] dark:bg-green-700 px-3 mx-0.5 relative dark:text-gray-300 text-base rounded" :key="item.attributes.votes">
                <p class="text-green-600 dark:text-green-400 font-medium">{{"+" + odds }}</p>
            </div>
            <div v-if="odds === 0" class="bg-gray-200 px-3 mx-0.5 relative dark:text-gray-300 text-base rounded" :key="item.attributes.votes">
                <p class="dark:text-gray-500 font-medium">{{ odds }}</p>
            </div>
            <div v-if="odds < 0" class="bg-red-200 px-3 mx-0.5 relative dark:text-gray-300 text-base rounded" :key="item.attributes.votes">
                <p class="text-red-600 font-medium">{{ odds }}</p>
            </div>
        </transition>
        <span @click="downVote(item.id)" class="transition-none"
              :class="item.attributes.is_down_voted ? 'text-red-600 dark:text-red-600' : 'dark:text-gray-300'">
            <span class="hover:text-red-600 cursor-pointer iconify transition-none"
                  data-icon="tabler:chevron-up" data-rotate="180deg"/>
        </span>
    </div>
</template>

<script>
import axios from "axios"

export default {
    props: {
        item: {
            type: Object,
            default() {
                return {}
            }
        },
    },
    data: function () {
        return {
            odds: this.item.attributes.upvotes - this.item.attributes.downvotes
        }
    },
    methods: {
        upVote(id) {
            this.toggleVote(id, 'up')
        },
        downVote(id) {
            this.toggleVote(id, 'down')
        },
        toggleVote(id, type) {
            let upType = 'is_up_voted'
            let downType = 'is_down_voted'
            let checkType = type === 'up' ? downType : upType
            axios.post('/api/articles/vote', {id: id, type: type})
                .then(() => {
                    if (this.item.attributes[checkType]) {
                        this.item.attributes.is_up_voted = !this.item.attributes.is_up_voted
                        this.item.attributes.is_down_voted = !this.item.attributes.is_down_voted
                        type === 'up' ? (this.item.attributes.votes += 2) && (this.odds += 2) : (this.item.attributes.votes -= 2) && (this.odds -= 2)
                    } else {
                        if (type === 'up') {
                            if (this.item.attributes.is_up_voted) {
                                this.item.attributes.votes--
                                this.odds--
                            } else {
                                this.item.attributes.votes++
                                this.odds++
                            }
                            console.log(this.odds)
                            this.item.attributes.is_up_voted = !this.item.attributes.is_up_voted
                        } else {
                            if (this.item.attributes.is_down_voted) {
                                this.item.attributes.votes--
                                this.odds++
                            } else {
                                this.item.attributes.votes  === 0 ? this.item.attributes.votes++ : this.item.attributes.votes--
                                this.odds--
                            }
                            this.item.attributes.is_down_voted = !this.item.attributes.is_down_voted
                        }
                    }
                }).catch((err) => {
                err.response.status === 401 ? window.location = '/login' : null;
            })
        },
    }
}
</script>

<style scoped>
.slide-enter {
    top: 10px;
    opacity: 0.5;
}

.slide-enter-active, .slide-leave-active {
    transition: all .35s;
}

.slide-enter-to {
    top: 0px;
    opacity: 1;
}

.slide-leave {
    top: 0px;
    opacity: 1;
}

.slide-leave-to {
    top: -30px;
    opacity: 0;
    transform: blur(8px);
}
</style>
