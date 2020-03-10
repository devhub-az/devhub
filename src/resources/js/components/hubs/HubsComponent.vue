<template>
    <div>
        <span v-for="column in columns[1]" :key="column" @click="sortByColumn(column)"
              class="table-head">
            {{ column }}
            <span v-if="column === sortedColumn">
                    <i v-if="order === 'asc' " class="fas fa-arrow-up"></i>
                    <i v-else class="fas fa-arrow-down"></i>
            </span>
        </span>
        <div v-for="hub in hubs" v-if="!loading"
             class="list-hubs__hub" :id="hub.id + '_block'">
            <!--             :style="'border-left: 3px solid rgb(' + hub.border + ')'"-->
            <img :id="hub.id" v-if="hub.logo" class="list-hubs__hub-image" v-lazy="'/' + hub.logo" alt="">
            <img :id="hub.id" v-if="!hub.logo" class="list-hubs__hub-image" src="/images/empty/code.png"
                 alt="">
            <a :href="'/hubs/' + hub.id">
                <div class="list-hubs__obj-body">
                    <div class="list-hubs__title-link">{{ hub.name }}</div>
                    <div class="list-hubs__desc">{{ hub.description}}</div>
                    <div class="list-hubs__posts">
                        <i class="mdi mdi-text-box-multiple"></i>
                        Paylaşım {{ hub.posts_count }}
                    </div>
                </div>
            </a>
            <div class="list-hubs__stats">
                <div class="list-hubs__stats-value">{{ hub.hub_followers_count }}</div>
                <small>IZLƏYƏNLƏR</small>
            </div>
            <div class="list-hubs__stats">
                <div class="list-hubs__stats-value">{{ hub.rating }}</div>
                <small>
                    REYTINQ
                </small>
            </div>
            <hub-follow-button :hub="hub" :auth_check="auth_check"/>
        </div>
        <pagination v-if="pagination.last_page > 1 && !loading" :pagination="pagination" :offset="5"
                    @paginate="getHubs()"/>
        <hubs-loading v-else-if="loading" :loading="loading"/>
        <ul v-else-if="!error" class="post-content__item"
            style="text-align: center; display: grid; grid-gap: 12px;">
            <span style="font-size: 5rem; opacity: .7;">¯\_(ツ)_/¯</span>
            <h1 style="font-family: 'Nunito', sans-serif;"><span
                    style="border-right: 2px solid; padding: 0 15px 0 15px;">500</span> Server error
            </h1>
        </ul>
    </div>
</template>

<script>

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
                    this.loading = false;
                    this.pagination = data.meta
                    this.hubs = data.data
                    if (this.pagination.last_page > 50) {
                        this.pagination.last_page = 50;
                    }
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
            }
        },
        filters: {
            columnHead(value) {
                return value.split('_').join(' ').toUpperCase()
            }
        },
    }
</script>
