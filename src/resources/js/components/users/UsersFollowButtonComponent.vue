<template>
    <div class="hub_follow">
        <span @click="follow(user.id)" v-if="!user.follower_check && !loading"
              class="btn btn-primary">
            <i class="mdi mdi-account-plus"></i> İzləmək
        </span>
        <span @click="follow(user.id)" v-if="user.follower_check && !loading" class="btn btn-outline"><i
                class="mdi mdi-check"></i> İzləyirsiniz</span>
        <span v-if="loading" class="btn btn-outline"><i class="mdi mdi-loading mdi-spin"></i> Gözləyin</span>
    </div>
</template>

<script>
    export default {
        props: ['id', 'auth_check'],
        data: function () {
            return {
                user: '',
                loading: false,
            }
        },
        created() {
            this.getUser();
        },
        methods: {
            getUser: function () {
                axios.get('/api/users/' + this.id + '/follow_check').then(response => {
                    this.user = response.data.data;
                })
            },
            follow: function (id) {
                if (this.auth_check) {
                    this.loading = true;
                    axios.post('/users/' + id + '/follow', {
                        id: id,
                    })
                        .then(response => {
                            if (response.data.success) {
                                new Noty({
                                    type: 'success',
                                    text: '<div class="notification-image">' +
                                        '<i class="mdi mdi-account-check-outline"></i>' +
                                        '</div> ' +
                                        '<div class="text">İzləyirsiniz</div>',
                                }).show();
                                this.user.follower_check = true;
                            } else if (response.data.delete) {
                                new Noty({
                                    type: 'error',
                                    text: '<div class="notification-image">' +
                                        '<i class="mdi mdi-account-remove-outline"></i>' +
                                        '</div> ' +
                                        '<div class="text">İzləmirsiz</div>',
                                }).show();
                                this.user.follower_check = false;
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
