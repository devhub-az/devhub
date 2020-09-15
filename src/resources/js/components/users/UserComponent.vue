<template>
    <div>
        <div class="users-list">
            <users-loading v-if="loading"></users-loading>
            <div v-for="user in users" v-if="!loading && users"
                 class="list-users__hub" :id="user.id">
                <figure class="user-preview-cover liquid"
                        :style="'background: url(/images/profile/' + user.avatar + ') center center / cover no-repeat;'">
                    <img :src="'/images/profile/' + user.avatar" alt="cover-04" style="display: none;">
                </figure>
                <img v-if="user.avatar !== 'user.jpg'" :src="'/upload/user_' + user.id + '/logo/' + user.avatar"
                     class="list-hubs__hub-image" alt="User profile">
                <img v-else-if="user.avatar === 'user.jpg'" :src="'/upload/default/logo/default.png'"
                     class="list-hubs__hub-image" alt="User profile">
                <div class="list-hubs__obj-body">
                    <a :href="'/users/@' + user.username">
                        <div class="list-users__title-link">{{ user.username }}</div>
                        <div class="list-hubs__desc">{{ user.about }}</div>
                        <div class="list-hubs__desc">
                            <i class="mdi mdi-text-box-multiple"></i>
                            Paylaşım {{ user.posts_count }}
                        </div>
                    </a>
                </div>
                <user-follow-button :user="user" :id="user.id" :auth_check="auth_check"></user-follow-button>
            </div>
            <div class="list-hubs__hub" v-if="!loading && users.length === 0"
                 style="text-align: center; display: grid; grid-gap: 12px; padding: 24px; grid-template-columns: unset">
                        <span style="font-size: 5rem; opacity: .7;">
                            <i class="mdi mdi-account-group"/>
                        </span>
                <span style="opacity: .7;">Müəlliflər tapılmadı</span>
            </div>
        </div>
        <pagination v-if="pagination.last_page > 1 && !loading" :pagination="pagination" :offset="5"
                    @paginate="getUsers()" style="margin: 0 auto">
        </pagination>
    </div>
</template>


<script>
    export default {
        props: ['auth_check', 'url'],
        data: function () {
            return {
                error: false,
                users: [],
                loading: false,
                pagination: {
                    'current_page': 1
                }
            }
        },
        mounted: function () {
            this.getUsers();
        },
        methods: {
            getUsers() {
                this.loading = true;
                axios.get(this.url + '?page=' + this.pagination.current_page).then(response => {
                    this.loading = false;
                    this.users = response.data.data;
                    if (response.data.meta) {
                        this.pagination = response.data.meta;
                        if (this.pagination.last_page > 50) {
                            this.pagination.last_page = 50;
                        }
                    }
                }).catch(error => {
                    this.loading = false;
                    this.error = true;
                    console.log(error);
                });
            }
        }

    }
</script>

<style scoped>

</style>

