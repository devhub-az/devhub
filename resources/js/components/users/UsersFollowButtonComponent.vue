<template>
    <div class="users-list__follow">
        <span @click="follow(following.id)" v-if="!following.attributes.follower && !loading"
              class="border text-sm rounded px-3 py-1 cursor-pointer hover:border-blue_def-400 xs:hidden">
            <span class="text-sm font-medium text-gray-600 ">Izləmək</span>
        </span>
        <span @click="follow(following.id)" v-if="following.attributes.follower && !loading"
              class="border-blue_def-400 text-sm text-white rounded px-4 py-1 cursor-pointer bg-blue_def-400 hover:border-gray-700 xs:hidden">
            <span class="font-medium">İzləyirsiniz</span>
        </span>
        <span v-if="loading" class="border text-sm rounded px-4 py-1 cursor-pointer xs:hidden">
            <span class="font-medium">Gözləyin</span>
        </span>
    </div>
</template>

<script>
import axios from 'axios'
import Noty from 'noty'

export default {
    props: ['id', 'auth_check', 'user', 'auth_user', 'follow_check'],
    data: function () {
        return {
            following: this.user,
            loading: false,
        }
    },
    async created() {
        if (this.auth_check) {
            this.following['follower'] = this.follow_check
        } else {
            this.following['follower'] = false
        }
    },
    methods: {
        follow: function (id) {
            if (this.auth_check) {
                this.loading = true;
                axios.post('/users/' + id + '/follow', {
                    id: id,
                })
                    .then(response => {
                        if (response.data) {
                            new Noty({
                                type: 'success',
                                text: '<div class="notification-image">' +
                                    '<i class="mdi mdi-account-check-outline"></i>' +
                                    '</div> ' +
                                    '<div class="text">İzləyirsiniz</div>',
                            }).show();
                            this.following.attributes.follower = true;
                        } else if (!response.data) {
                            new Noty({
                                type: 'error',
                                text: '<div class="notification-image">' +
                                    '<i class="mdi mdi-account-remove-outline"></i>' +
                                    '</div> ' +
                                    '<div class="text">İzləmirsiz</div>',
                            }).show();
                            this.following.attributes.follower = false;
                        }
                        this.loading = false;
                    })
                    .catch(error => {
                        console.log(error);
                        new Noty({
                            type: 'error',
                            text: '<div class="notification-image"><span class="mdi mdi-x"/></div> Xəta',
                        }).show();
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
