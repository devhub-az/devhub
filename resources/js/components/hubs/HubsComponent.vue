<template>
    <div>
        <div class="pb-2 relative" id="hide">
            <input type="text" placeholder="Hab tapmaq" v-model="search"
                   class="block w-full p-2 border dark:text-gray-400 hover:border-cerulean-500 dark:hover:border-cerulean-700 dark:bg-gray-700 dark:focus:border-cerulean-700 dark:border-gray-700 dark:focus:outline-none dark:focus:border-transparent focus:outline-none focus:border-cerulean-500 focus:border-transparent"
                   @keyup.enter="searchUnit">
            <span class="iconify absolute translate-y-1/2 top-0 my-3 mr-4 cursor-pointer right-0 dark:text-gray-400"
                  data-icon="mdi-magnify" @click="searchUnit"></span>
        </div>
        <div class="flex justify-between py-1 dark:bg-transperent dark:text-gray-300 dark:border-gray-700">
            <div class="flex items-center cursor-pointer" v-for="column in columns" :key="column.type"
                 @click="sortByColumn(column.type)">
                {{ column.name }}
                <div v-if="order === 'asc' && column.type === sortedColumn">
                    <span class="iconify font-light" data-icon="bi:arrow-up"></span>
                </div>
                <div v-else-if="order === 'desc' && column.type === sortedColumn">
                    <span class="iconify font-light" data-icon="bi:arrow-down"></span>
                </div>
            </div>
        </div>
        <hubs-loading v-if="loading" :loading="loading"/>
        <div v-for="hub in hubs" v-if="!loading"
             class="flex gap-4 border mb-2 p-2 bg-white dark:bg-dpaper dark:border-gray-700"
             :id="hub.id + '_block'">
            <img :id="hub.id" v-if="hub.attributes.logo" class="w-16 h-16 rounded p-1" :src="hub.attributes.logo"
                 alt="Hub logo">
            <a :href="'/hubs/' + hub.id" class="w-8/12">
                <h2 class="font-semibold dark:text-gray-300">{{ hub.attributes.name }}</h2>
                <p class="text-sm w-full font-light pb-2 xs:text-xs dark:text-gray-300">{{ hub.attributes.description }}</p>
                <div class="flex">
                    <div class="text-sm flex items-center">
                        <i class="iconify dark:text-gray-300" data-icon="mdi-text-box-multiple"></i>
                        <p class="ml-1 text-sm font-light dark:text-gray-300">Paylaşım {{ hub.attributes.articles_count }}</p>
                    </div>
                </div>
            </a>
            <div class="w-1/12 m-auto text-center xs:hidden hover:hidden">
                <div class="font-semibold dark:text-gray-300">{{ hub.attributes.hub_followers_count }}</div>
            </div>
            <div class="w-1/12 m-auto text-center xs:hidden">
                <div class="font-semibold dark:text-gray-300">{{ hub.attributes.rating }}</div>
            </div>
            <hub-follow-button :id="hub.id" :follower_check="hub.attributes.follower_check"
                               @follow-status-updated="hub.attributes.follower_check = $event" :auth_check="auth_check"
                               class="w-2/12 m-auto text-center"/>
        </div>
        <pagination v-if="pagination.last_page > 1 && !loading" :pagination="pagination" :offset="5"
                    @paginate="getHubs()"/>
        <div class="bg-white rounded border text-center grid gap-2 py-24 dark:bg-dpaper dark:border-gray-700"
             v-if="!loading && hubs.length === 0">
            <span class="opacity-75" style="font-size: 5rem">
                <span class="iconify mx-auto text-red-700 dark:text-red-500" data-icon="el:remove-sign" data-inline="false"></span>
            </span>
            <span class="opacity-75 text-3xl pt-2 dark:text-gray-300">Hab tapılmadı</span>
        </div>
        <ul v-else-if="error" class="post-content__item"
            style="text-align: center; display: grid; grid-gap: 12px;">
            <span style="font-size: 5rem; opacity: .7;">¯\_(ツ)_/¯</span>
            <h1 style="font-family: 'Nunito', sans-serif;"><span
                style="border-right: 2px solid; padding: 0 15px 0 15px;">500</span> Server error
            </h1>
        </ul>
    </div>
</template>

<script>
import axios from 'axios'
import _ from "lodash";

export default {
    props: {
        fetchUrl: {type: String, required: true},
        columns: {type: Array, required: true},
        auth_check: {type: Boolean}
    },
    data: function () {
        return {
            perPage: 10,
            sortedColumn: 'rating',
            order: 'desc',
            error: false,
            hubs: [],
            loading: false,
            search: '',
            hubsEmpty: false,
            pagination: {
                'current_page': 1
            }
        }
    },
    async created() {
        await this.getHubs();
    },
    methods: {
        async getHubs() {
            this.loading = true;
            let dataFetchUrl = `${this.fetchUrl}?page=${this.pagination.current_page}&column=${this.sortedColumn}&order=${this.order}&per_page=${this.perPage}`
            await axios.get(dataFetchUrl).then(({data}) => {
                this.loading = false
                if (data.data.length !== 0) {
                    this.pagination = data.meta
                    this.hubs = data.data
                    if (this.pagination.last_page > 50) {
                        this.pagination.last_page = 50;
                    }
                } else this.hubsEmpty = true
            })
                .catch(error => {
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
        },
        async sortByColumn(column) {
            if (column === this.sortedColumn) {
                this.order = (this.order === 'asc') ? 'desc' : 'asc'
            } else {
                this.sortedColumn = column
                this.order = 'desc'
            }
            await this.getHubs()
        },
        searchUnit: _.debounce(function () {
            this.loading = true;
            this.hubsEmpty = false
            axios.get('/api/search_hub?q=' + this.search)
                .then(({data}) => {
                    this.loading = false;
                    this.pagination = data.meta
                    this.hubs = data.data
                    if (this.hubs.length === 0) {
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
    },
    filters: {
        columnHead(value) {
            return value.split('_').join(' ').toUpperCase()
        }
    },
}
</script>
