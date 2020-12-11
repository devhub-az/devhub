<template>
    <div>
        <div class="pb-2 relative" id="hide">
            <input type="text" placeholder="Müəllif axtar" v-model="search"
                   class="block w-full p-2 border hover:border-blue focus:outline-none focus:border-blue focus:border-transparent"
                   @keyup.enter="searchUnit">
            <span class="mdi mdi-magnify absolute translate-y-1/2 top-0 p-2 pr-4 cursor-pointer right-0"
                  @click="searchUnit"></span>
        </div>
        <!--            <div class="flex w-full gap-3 pb-2">-->
        <!--                <div class="w-16">Ad</div>-->
        <!--                <div class="w-6/12"></div>-->
        <!--                <div class="w-1/12 text-center">Paylaşma</div>-->
        <!--                <div class="w-1/12 text-center">Karma</div>-->
        <!--                <div class="w-1/12 text-center">Reytinq</div>-->
        <!--                <div class="w-2/12"></div>-->
        <!--            </div>-->
        <users-loading v-if="loading"></users-loading>
        <div v-for="user in users" v-if="!loading && users"
             class="flex gap-4 border mb-2 p-2 bg-white" :id="user.id">
            <img :src="user.attributes.avatar"
                 class="w-16 h-16 rounded p-1" alt="User profile">
            <div class="w-6/12">
                <a :href="'/authors/@' + user.attributes.username">
                    <div class="font-semibold">{{ user.attributes.name }} {{ '@' + user.attributes.username }}</div>
                    <div class="text-sm w-full pb-2 xs:text-xs">{{ user.attributes.about }}</div>
                </a>
            </div>
            <div class="w-1/12 m-auto text-center xs:hidden">
                <div class="font-semibold">{{ user.attributes.articles_count }}</div>
                <p class="text-sm uppercase">Paylaşım</p>
            </div>
            <div class="w-1/12 m-auto text-center xs:hidden">
                <div class="font-semibold">{{ user.attributes.karma }}</div>
                <p class="text-sm uppercase">KARMA</p>
            </div>
            <div class="w-1/12 m-auto text-center xs:hidden">
                <div class="font-semibold">{{ user.attributes.rating }}</div>
                <p class="text-sm uppercase">REYTINQ</p>
            </div>
            <user-follow-button :user="user" :id="user.id" :auth_check="auth_check"
                                class="w-2/12 m-auto text-center"></user-follow-button>
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
</template>


<script>
import axios from 'axios'
import _ from "lodash";

export default {
    props: ['auth_check', 'url'],
    data: function () {
        return {
            error: false,
            users: [],
            loading: false,
            search: '',
            pagination: {
                'current_page': 1
            }
        }
    },
    mounted: function () {
        this.getUsers();
    },
    methods: {
        searchUnit: _.debounce(function () {
            this.loading = true;
            this.hubsEmpty = false
            axios.get('/api/search_user?q=' + this.search)
                .then(({data}) => {
                    this.loading = false;
                    this.pagination = data.meta
                    this.users = data.data
                    if (this.users.length === 0) {
                        this.hubsEmpty = true
                    }
                }).catch(error => {
                this.loading = false
                this.error = true
                if (error.response) {
                    console.log(error.response.data);
                    console.log(error.response.status);
                    console.log(error.response.headers);
                } else if (error.request) {
                    console.log(error.request);
                } else {
                    console.log('Error', error.message);
                }
            });
        }),
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

