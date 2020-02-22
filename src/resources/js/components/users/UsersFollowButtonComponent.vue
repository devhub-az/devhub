<template>
    <div class="hub_follow">
        <span @click="follow(user.id)" v-if="!users.follower_check && !loading" class="btn btn-outline"><i
                class="mdi mdi-plus"></i> İzləmək</span>
        <span @click="follow(user.id)" v-if="users.follower_check && !loading" class="btn btn-outline"><i
                class="mdi mdi-check"></i> İzləyirsiniz</span>
        <span v-if="loading" class="btn btn-outline"><i class="icon iconmoon icon-spinner"></i> Gözləyin</span>
    </div>
</template>

<script>
    export default {
        props: ['user', 'auth_check'],
        data: function () {
            return {
                users: '',
                loading: false,
            }
        },
        created: function () {
            this.users = this.user;
        },
        methods: {
            follow: function (id) {
                if (this.auth_check) {
                    this.loading = true;
                    if (this.users.follower_check)
                        axios.post('/users/' + id + '/un_follow', {
                            id: id,
                        })
                            .then(response => {
                                if (response.data.success) {
                                    new Noty({
                                        type: 'success',
                                        text: '<div class="notification-image"><i class="mdi mdi-tag-outline"></i></div> ' +
                                            '<div class="text">İzləyirsiniz</div>',
                                    }).show();
                                    this.users.follower_check = true;
                                } else if (response.data.delete) {
                                    new Noty({
                                        type: 'error',
                                        text: '<div class="notification-image"><i class="mdi mdi-check"></i></div> ' +
                                            '<div class="text">İzləmirsiz</div>',
                                    }).show();
                                    this.users.follower_check = false;
                                }
                                this.loading = false;
                            })
                            .catch(error => {
                                this.loading = false;
                                console.log(error);
                                new Noty({
                                    type: 'error',
                                    text: '<div class="notification-image"><span class="mdi mdi-x"/></div> Xəta',
                                }).show();
                            });
                    else if (!this.users.follower_check)
                        axios.post('/users/' + id + '/follow', {
                            id: id,
                        })
                            .then(response => {
                                if (response.data.success) {
                                    new Noty({
                                        type: 'success',
                                        text: '<div class="notification-image"><i class="mdi mdi-tag-outline"></i></div> ' +
                                            '<div class="text">İzləyirsiniz</div>',
                                    }).show();
                                    this.users.follower_check = true;
                                } else if (response.data.delete) {
                                    new Noty({
                                        type: 'error',
                                        text: '<div class="notification-image"><i class="mdi mdi-check"></i></div> ' +
                                            '<div class="text">İzləmirsiz</div>',
                                    }).show();
                                    this.users.follower_check = false;
                                }
                                this.loading = false;
                            })
                            .catch(error => {
                                this.loading = false;
                                console.log(error);
                                new Noty({
                                    type: 'error',
                                    text: '<div class="notification-image"><span class="mdi mdi-x"/></div> Xəta',
                                }).show();
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
