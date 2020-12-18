<template>
    <div class="xs:hidden">
        <span @click="follow(id)" v-if="!follower_check && !loading"
              class="border text-sm rounded px-3 py-1 cursor-pointer hover:border-cerulean-500 dark:border-gray-700 dark:hover:border-cerulean-700">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-300 transition-none">Izləmək</span>
        </span>
        <span @click="follow(id)" v-if="follower_check && !loading"
              class="border-cerulean-500 text-sm text-white rounded px-3 py-1 cursor-pointer bg-cerulean-500 hover:border-gray-700 dark:bg-cerulean-700">
            <span class="font-medium transition-none">İzləyirsiniz</span>
        </span>
        <span v-if="loading"
              class="border text-sm rounded px-3 py-1 cursor-pointer dark:border-gray-700">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-300 transition-none">Gözləyin</span>
        </span>
    </div>
</template>

<script>
import axios from 'axios'
import Noty from 'noty'

export default {
    props: ['id', 'follower_check', 'auth_check'],
    data: function () {
        return {
            loading: false,
        }
    },
    methods: {
        follow: function (id) {
            if (this.auth_check) {
                this.loading = true;
                axios.post('api/hubs/follow/' + id, {
                    id: id,
                })
                    .then(response => {
                        if (response.data.success) {
                            this.$emit('follow-status-updated', true)
                        } else if (response.data.delete) {
                            this.$emit('follow-status-updated', false)
                        }
                        this.loading = false;
                    })
                    .catch(error => {
                        console.log(error);
                        this.loading = false;
                    });
            } else
                new Noty({
                    type: 'success',
                    text: '<div class="notification-image"><i class="mdi mdi-account-box"></i></div> ' +
                        '<div class="text">Bu funksiyanı istifadə etmək üçün ' +
                        '<a href="/register" class="notification-link">qeydiyyatdan keçin</a></div>',
                }).show();
        }
    }
}
</script>
