<template>
    <div class="hub_follow">
        <span @click="follow(hub.id)" v-if="!hubs.attributes.follower_check && !loading"
              class="border text-sm rounded px-3 py-1 cursor-pointer hover:border-cerulean-500 xs:hidden">
            <span class="text-sm font-medium text-gray-600 transition-none">Izləmək</span>
        </span>
        <span @click="follow(hub.id)" v-if="hubs.attributes.follower_check && !loading"
              class="border-cerulean-500 text-sm text-white rounded px-4 py-1 cursor-pointer bg-cerulean-500 hover:border-gray-700 xs:hidden">
            <span class="font-medium transition-none">İzləyirsiniz</span>
        </span>
        <span v-if="loading" class="border text-sm rounded px-4 py-1 cursor-pointer xs:hidden">
            <span class="font-medium transition-none">Gözləyin</span>
        </span>
    </div>
</template>

<script>
import axios from 'axios'
import Noty from 'noty'

    export default {
        props: ['hub', 'auth_check'],
        data: function () {
            return {
                hubs: '',
                loading: false,
            }
        },
        mounted: function () {
            this.hubs = this.hub;
        },
        methods: {
            follow: function (id) {
                if (this.auth_check) {
                    this.loading = true;
                    axios.post('/hubs/follow/' + id, {
                        id: id,
                    })
                        .then(response => {
                            if (response.data.success) {
                                new Noty({
                                    type: 'success',
                                    text: '<div class="notification-image"><i class="mdi mdi-check"></i></div> ' +
                                        '<div class="text">İzləyirsiniz</div>',
                                }).show();
                                this.hubs.attributes.follower_check = true;
                            } else if (response.data.delete) {
                                new Noty({
                                    type: 'error',
                                    text: '<div class="notification-image"><i class="mdi mdi-tag-outline"></i></div> ' +
                                        '<div class="text">İzləmirsiz</div>',
                                }).show();
                                this.hubs.attributes.follower_check = false;
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

<style>
    .mdi-check {
        color: var(--color-info-main);
    }
</style>
