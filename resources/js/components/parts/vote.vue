<template>
    <div class="flex gap-1 ml-auto pl-2 text-2xl items-center xs:text-xl mb-auto"
         :title="item.attributes.votes_sum + ':  ↑ ' + [item.attributes.upvotes === 0 ? '0' : item.attributes.upvotes ] + ' ↓ ' + [item.attributes.downvotes === 0 ? '0' : item.downvotes]">
        <span @click="upVote(item.id)" class="transition-none"
              :class="item.attributes.is_up_voted ? 'text-green-600 dark:text-green-500' : 'dark:text-gray-300'">
            <span class="hover:text-green-600 cursor-pointer iconify transition-none"
                  data-icon="mdi-thumb-up-outline"/>
        </span>
        <transition name="slide" mode="out-in">
            <p class="mx-0.5 relative dark:text-gray-300" :key="item.attributes.votes">
                {{ item.attributes.votes }}
            </p>
        </transition>
        <span @click="downVote(item.id)" class="transition-none"
              :class="item.attributes.is_down_voted ? 'text-red-600 dark:text-red-600' : 'dark:text-gray-300'">
            <span class="hover:text-red-600 cursor-pointer iconify transition-none"
                  data-icon="mdi-thumb-down-outline"/>
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
            axios.post('api/articles/vote', {id: id, type: type})
                .then(() => {
                    if (this.item.attributes[checkType]) {
                        this.item.attributes.is_up_voted = !this.item.attributes.is_up_voted
                        this.item.attributes.is_down_voted = !this.item.attributes.is_down_voted
                        type === 'up' ? this.item.attributes.votes += 2 : this.item.attributes.votes -= 2
                    } else {
                        if (type === 'up') {
                            this.item.attributes.is_up_voted ? this.item.attributes.votes-- : this.item.attributes.votes++
                            this.item.attributes.is_up_voted = !this.item.attributes.is_up_voted
                        } else {
                            this.item.attributes.is_down_voted ? this.item.attributes.votes++ : this.item.attributes.votes--
                            this.item.attributes.is_down_voted = !this.item.attributes.is_down_voted
                        }
                    }
                }).catch((err) => {
                if (err.response.status === 401) {
                    window.location = '/login';
                }
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
