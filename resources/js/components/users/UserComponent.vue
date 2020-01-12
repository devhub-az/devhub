<template>
    <div>
        <div v-for="user in users" v-if="!loading"
             class="list-hubs__hub" :id="user.id">
            <img :src="'images/profile/new_user/' + (Math.floor(Math.random() * 31) + '.svg')"
                 class="list-hubs__hub-image" alt="User profile">
            <div class="list-hubs__obj-body">
                <a :href="'users/@' + user.name">
                    <div class="list-users__title-link">{{ user.name }}</div>
                    <div class="list-users__description-link">{{ user.about }}</div>
                </a>
            </div>
            <div class="list-hubs__stats">
                <div class="list-hubs__stats-value">{{ user.posts_count }}</div>
                <small>POSTLAR</small>
            </div>
            <div class="list-hubs__stats">
                <div class="list-hubs__stats-value">{{ user.rating }}</div>
                <small>
                    REYTINQ
                </small>
            </div>
            <user-follow-button :user="user"></user-follow-button>
        </div>
        <pagination v-if="pagination.last_page > 1 && !loading" :pagination="pagination" :offset="5"
                    @paginate="getUsers()">
        </pagination>
    </div>
</template>


<script>
    export default {
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
                axios.get('/api/users/all?page=' + this.pagination.current_page).then(response => {
                    this.loading = false;
                    this.users = response.data.data;
                    this.pagination = response.data.meta;
                    if (this.pagination.last_page > 50) {
                        this.pagination.last_page = 50;
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

