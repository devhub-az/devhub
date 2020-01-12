<template>
    <div class="hub_follow">
        <span @click="follow(user.id)" v-if="!users.follower_check && !loading" class="btn btn-success btn-sm">{{ users.user_followers_count }} İzləmək</span>
        <span @click="follow(user.id)" v-if="users.follower_check && !loading" class="btn btn-success-outline btn-sm">{{ users.user_followers_count }} İzləyirsiniz</span>
        <span v-if="loading" class="btn btn-success-outline btn-sm"><i class="icon iconmoon icon-spinner"></i> Gözləyin</span>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data: function() {
            return {
                users: '',
                loading: false,
            }
        },
        mounted: function() {
            this.users = this.user;
        },
        methods: {
            follow: function(id){
                this.loading = true;
                if (this.users.follower_check)
                axios.post('/users/'+ id + '/un_follow', {
                    id:id,
                })
                    .then(response => {
                        if (response.data.success) {
                            this.users.user_followers_count++;
                            this.users.follower_check = true;
                        } else if(response.data.delete){
                            this.users.user_followers_count--;
                            this.users.follower_check = false;
                        }
                        this.loading = false;
                    })
                    .catch(error => {
                        this.loading = false;
                        console.log(error);
                        iziToast.error({
                            title: 'Xəta',
                            message: 'Qanunsuz əməliyyat',
                        })
                    });
                else if(!this.users.follower_check)
                    axios.post('/users/'+ id + '/follow', {
                        id:id,
                    })
                        .then(response => {
                            if (response.data.success) {
                                this.users.user_followers_count++;
                                this.users.follower_check = true;
                            } else if(response.data.delete){
                                this.users.user_followers_count--;
                                this.users.follower_check = false;
                            }
                            this.loading = false;
                        })
                        .catch(error => {
                            this.loading = false;
                            console.log(error);
                            iziToast.error({
                                title: 'Xəta',
                                message: 'Qanunsuz əməliyyat',
                            })
                        });
            }
        }
    }
</script>
