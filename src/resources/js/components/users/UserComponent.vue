<template>
    <div class="users-list">
        <div class="users-list__left">
            <div class="users-list__titles">
                <div class="users-list__title">Ad @nik</div>
                <div class="users-list__title">Paylaşma</div>
                <div class="users-list__title">Karma</div>
                <div class="users-list__title">Reytinq</div>
                <div class="users-list__title"></div>
            </div>
            <users-loading v-if="loading"></users-loading>
            <div v-for="user in users" v-if="!loading && users"
                 class="users-list__list" :id="user.id">
                <img v-if="user.avatar !== 'user.jpg'" :src="'/upload/user_' + user.id + '/logo/' + user.avatar"
                     class="users-list__image" alt="User profile">
                <img v-else-if="user.avatar === 'user.jpg'" :src="'/upload/default/logo/default.png'"
                     class="users-list__image" alt="User profile">
                <div class="users-list__obj-body">
                    <a :href="'/users/@' + user.username">
                        <div class="users-list__title-link">{{ user.name }} {{ '@' + user.username }}</div>
                        <div class="users-list__desc">{{ user.about }}</div>
                    </a>
                </div>
                <div class="users-list__count">
                    {{ user.posts_count }}
                </div>
                <div class="users-list__count">
                    {{ user.karma }}
                </div>
                <div class="users-list__count">
                    {{ user.rating }}
                </div>
                <user-follow-button :user="user" :id="user.id" :auth_check="auth_check"></user-follow-button>
            </div>
            <div class="users-list__hub" v-if="!loading && users.length === 0"
                 style="text-align: center; display: grid; grid-gap: 12px; padding: 24px; grid-template-columns: unset">
                <span style="font-size: 5rem; opacity: .7;">
                    <i class="mdi mdi-account-group"/>
                </span>
                <span style="opacity: .7;">Müəlliflər tapılmadı</span>
            </div>
            <pagination v-if="pagination.last_page > 1 && !loading" :pagination="pagination" :offset="5"
                        @paginate="getUsers()" style="margin: 0 auto">
            </pagination>
        </div>
<!--        <div class="user-list__right">-->

<!--        </div>-->
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

