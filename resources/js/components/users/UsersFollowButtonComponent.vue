<template>
    <div>
        <span @click="follow(id)" v-if="!follower && !loading"
              class="w-max xs:w-full h-7 xs:h-auto xs:py-1 btn">
            <span class="text-sm mx-auto font-medium transition-none">{{ $t('devhub.follow') }}</span>
        </span>
        <span @click="follow(id)" v-if="follower && !loading"
              class="w-max xs:w-full h-7 xs:h-auto xs:py-1 btn-outline">
            <span class="font-medium mx-auto transition-none">{{ $t('devhub.follower') }}</span>
        </span>
        <span v-if="loading"
              class="w-max xs:w-full h-7 xs:h-auto xs:py-1 btn-outline">
            <span class="text-sm font-medium mx-auto text-gray-600 dark:text-gray-300 transition-none">{{ $t('devhub.loading') }}</span>
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
