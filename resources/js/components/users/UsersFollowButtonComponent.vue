<template>
    <div class="xs:hidden">
        <span @click="follow(id)" v-if="!follower && !loading"
              class="btn-outline h-7">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-300 transition-none">Подписаться</span>
        </span>
        <span @click="follow(id)" v-if="follower && !loading"
              class="btn h-7">
            <span class="font-medium transition-none">Abunəsiniz</span>
        </span>
        <span v-if="loading"
              class="btn-outline h-7">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-300 transition-none">Gözləyin</span>
        </span>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['id', 'follow_check'],
    data: function () {
        return {
            loading: false,
            follower: this.follow_check,
        }
    },
    methods: {
        follow: function (id) {
            this.loading = true;
            axios.post('/api/authors/' + id, {
                id: id,
            })
                .then(response => {
                    if (response.data === 'followed') {
                        this.follower = true;
                    } else if (response.data === 'unfollowed') {
                        this.follower = false;
                    }
                    this.loading = false;
                })
                .catch(error => {
                    console.log(error);
                    this.loading = false;
                });
        }
    }
}
</script>
