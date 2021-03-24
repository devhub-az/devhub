<template>
    <div>
        <div class="flex pb-1 justify-between items-center">
            <div class="flex items-center space-x-1 font-medium">
                <span class="iconify text-gray-700 dark:text-gray-400" data-icon="mdi:tag-multiple-outline"
                      data-inline="false"></span>
                <p class="transition-none text-gray-700 cursor-default dark:text-gray-400"
                   title="Hablar müəyyən mövzularda nəşrlərin yerləşdirildiyi bölmələrdir.">Hablar</p>
            </div>
            <div
                class="ml-auto px-2 w-1/3 overflow-hidden flex items-center justify-between dark:border-gray-700 xs:w-max xs:space-x-4">
                <div class="flex items-center cursor-pointer font-medium text-gray-700 dark:text-gray-400"
                     v-for="column in columns"
                     :key="column.type"
                     @click="sortByColumn(column.type)">
                    <p class="transition-none xs:text-base">{{ column.name }}</p>
                    <div :class="order === 'desc' && column.type === sortedColumn ? 'block' : 'hidden'">
                        <span class="iconify font-light dark:text-gray-300"
                              data-icon="bi:arrow-up"></span>
                    </div>
                    <div :class="order === 'asc' && column.type === sortedColumn ? 'block' : 'hidden'">
                        <span class="iconify font-light dark:text-gray-300"
                              data-icon="bi:arrow-down"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class=" pb-2 relative" id="hide">
            <input type="text" placeholder="Hab tapmaq" v-model="search"
                   class="input rounded-none"
                   @keyup.enter="searchUnit">
            <span class="iconify absolute translate-y-1/2 top-0 my-3 mr-4 cursor-pointer right-0 dark:text-gray-400"
                  data-icon="mdi-magnify" @click="searchUnit"></span>
        </div>
        <hubs-loading v-if="loading" :loading="loading"/>
        <div v-for="hub in hubs" v-if="!loading"
             class="flex gap-3 border mb-2 p-2 bg-white dark:bg-dpaper dark:border-gray-700"
             :id="hub.id + '_block'">
            <img :id="hub.id" v-if="hub.attributes.logo" class="w-16 h-16 rounded p-1 dark:bg-dwall"
                 :src="hub.attributes.logo"
                 alt="Hub logo">
            <a :href="'/hubs/' + hub.attributes.slug" class="w-8/12">
                <div class="h-16 overflow-y-hidden mb-2">
                    <div class="space-x-4 font-semibold dark:text-gray-300">
                        <p>{{ hub.attributes.name }}</p>
                    </div>
                    <p class="text-sm w-full font-light pb-2 dark:text-gray-300">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus beatae cumque dolorum ea esse exercitationem fuga labore minus molestiae, nam nesciunt quae quasi quos recusandae repudiandae tempore totam, voluptatem.
                    </p>
                </div>
                <div class="flex items-center text-xs">
                    <div class="items-center flex">
                        <span class="iconify text-cerulean-500 dark:text-cerulean-100"
                              data-icon="mdi:account-group-outline"
                              data-inline="false"></span>
                        <p class="ml-1 text-sm dark:text-gray-300">
                            <span class="xs:hidden">{{ $t('devhub.followers') }}</span>
                            {{ hub.attributes.hub_followers_count }}
                        </p>
                    </div>
                    <div class="items-center flex mx-2">
                        <span class="iconify text-green-600 dark:text-green-500" data-icon="mdi:trending-up"
                              data-inline="false"></span>
                        <p class="ml-1 text-sm"
                           :class="hub.attributes.rating > 0 ? 'text-green-600 dark:text-green-500' : 'dark:text-gray-300'">
                            <span class="xs:hidden">{{ $t('devhub.rating') }}</span>
                            {{ hub.attributes.rating }}
                        </p>
                    </div>
                    <div class="flex items-center">
                        <i class="iconify dark:text-gray-300" data-icon="mdi-text-box-multiple-outline"></i>
                        <p class="ml-1 text-sm font-light dark:text-gray-300">
                            <span class="xs:hidden">{{ $t('devhub.articles') }}</span> {{ hub.attributes.articles_count }}
                        </p>
                    </div>
                </div>
            </a>
            <hub-follow-button :id="hub.id" :follower_check="hub.attributes.follower_check"
                               @follow-status-updated="hub.attributes.follower_check = $event" :auth_check="auth_check"
                               class="w-max m-auto text-center" :classes="'h-7'"/>
        </div>
        <pagination v-if="pagination.last_page > 1 && !loading" :pagination="pagination" :offset="5"
                    @paginate="getHubs()"/>
        <div class="bg-white rounded border text-center grid gap-2 py-24 dark:bg-dpaper dark:border-gray-700"
             v-if="!loading && hubs.length === 0">
            <span class="opacity-75" style="font-size: 5rem">
                <span class="iconify mx-auto text-red-700 dark:text-red-500" data-icon="el:remove-sign"
                      data-inline="false"></span>
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
            perPage: 40,
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
            let dataFetchUrl = `${this.fetchUrl}?page=${this.pagination.current_page}&column=${this.sortedColumn}&order=${this.order}&perPage=${this.perPage}`
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
