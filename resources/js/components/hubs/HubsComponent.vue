<template>
    <div>
        <div class="pb-2 relative" id="hide">
            <input type="text" placeholder="Hab axtar" v-model="search"
                   class="block w-full p-2 border hover:border-cerulean-500 focus:outline-none focus:border-cerulean-500 focus:border-transparent"
                   @keyup.enter="searchUnit">
            <span class="iconify absolute translate-y-1/2 top-0 my-3 mr-4 cursor-pointer right-0"
                  data-icon="mdi-magnify" @click="searchUnit"></span>
        </div>
        <!--        <span v-for="column in columns[1]" :key="column" @click="sortByColumn(column)"-->
        <!--              class="table-head">-->
        <!--            {{ column }}-->
        <!--            <span v-if="column === sortedColumn">-->
        <!--                <i v-if="order === 'asc' " class="fas fa-arrow-up"></i>-->
        <!--                <i v-else class="fas fa-arrow-down"></i>-->
        <!--            </span>-->
        <!--        </span>-->
        <hubs-loading v-if="loading" :loading="loading"/>
        <div v-for="hub in hubs" v-if="!loading"
             class="flex gap-4 border mb-2 p-2 bg-white" :id="hub.id + '_block'">
            <!--             :style="'border-left: 3px solid rgb(' + hub.border + ')'"-->
            <img :id="hub.id" v-if="hub.attributes.logo" class="w-16 h-16 rounded p-1" :src="hub.attributes.logo"
                 alt="Hub logo">
            <a :href="'/hubs/' + hub.id" class="w-8/12">
                <h2 class="font-semibold">{{ hub.attributes.name }}</h2>
                <p class="text-sm w-full pb-2 xs:text-xs">{{ hub.attributes.description }}</p>
                <div class="flex">
                    <div class="text-sm flex items-center">
                        <i class="iconify" data-icon="mdi-text-box-multiple"></i>
                        <p class="ml-1">Paylaşım {{ hub.attributes.articles_count }}</p>
                    </div>
                </div>
            </a>
            <div class="w-1/12 m-auto text-center xs:hidden">
                <div class="font-semibold">{{ hub.attributes.hub_followers_count }}</div>
                <p class="text-sm">IZLƏYƏNLƏR</p>
            </div>
            <div class="w-1/12 m-auto text-center xs:hidden">
                <div class="font-semibold">{{ hub.attributes.rating }}</div>
                <p class="text-sm">REYTINQ</p>
            </div>
            <hub-follow-button :hub="hub" :auth_check="auth_check" class="w-2/12 m-auto text-center"/>
        </div>
        <pagination v-if="pagination.last_page > 1 && !loading" :pagination="pagination" :offset="5"
                    @paginate="getHubs()"/>
        <div v-else-if="hubsEmpty" class="bg-white rounded border text-center grid gap-2 p-5 pt-0">
            <span class="opacity-75" style="font-size: 5rem">
                <i class="mdi mdi-tag-heart-outline"/>
            </span>
            <span class="opacity-75">Hab tapılmadı</span>
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
    created: function () {
        return this.getHubs();
    },
    methods: {
        getHubs() {
            this.loading = true;
            let dataFetchUrl = `${this.fetchUrl}?page=${this.pagination.current_page}&column=${this.sortedColumn}&order=${this.order}&per_page=${this.perPage}`
            axios.get(dataFetchUrl).then(({data}) => {
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
        sortByColumn(column) {
            if (column === this.sortedColumn) {
                this.order = (this.order === 'asc') ? 'desc' : 'asc'
            } else {
                this.sortedColumn = column
                this.order = 'desc'
            }
            this.getHubs()
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

<style>
.search {
    position: relative;
}

.search__input {
    display: block;
}

.search__logo {
    right: 15px;
    position: absolute;
    top: 50%;
    cursor: pointer;
    font-size: 20px;
    color: var(--text-black-secondary);
    z-index: 3;
    transform: translateY(-50%);
}
</style>
