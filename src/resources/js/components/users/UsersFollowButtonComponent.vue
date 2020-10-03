<template>
    <div class="users-list__follow">
        <span @click="follow(following.id)" v-if="!following.follower && !loading" class="btn btn-primary">
            <i class="mdi mdi-account-plus"></i> İzləmək
        </span>
        <span @click="follow(following.id)" v-if="following.follower && !loading" class="btn btn-outline">
            <i class="mdi mdi-check"></i> İzləyirsiniz
        </span>
        <span v-if="loading" class="btn btn-outline"><i class="mdi mdi-loading mdi-spin"></i> Gözləyin</span>
    </div>
</template>

<script>
    export default {
        props: ['id', 'auth_check', 'user', 'auth_user', 'follow_check'],
        data: function () {
            return {
                following: this.user,
                loading: false,
            }
        },
        async created() {
            if (this.auth_check){
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
                            if (response.data.success) {
                                new Noty({
                                    type: 'success',
                                    text: '<div class="notification-image">' +
                                        '<i class="mdi mdi-account-check-outline"></i>' +
                                        '</div> ' +
                                        '<div class="text">İzləyirsiniz</div>',
                                }).show();
                                this.following.follower = true;
                            } else if (response.data.delete) {
                                new Noty({
                                    type: 'error',
                                    text: '<div class="notification-image">' +
                                        '<i class="mdi mdi-account-remove-outline"></i>' +
                                        '</div> ' +
                                        '<div class="text">İzləmirsiz</div>',
                                }).show();
                                this.following.follower = false;
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
