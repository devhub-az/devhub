<template>
    <div>
        <div v-for="hub in hubs" v-if="!loading"
             class="list-hubs__hub" :id="hub.id + '_block'" :style="'border-left: 3px solid rgb(' + hub.border + ')'">
            <img :id="hub.id" v-if="hub.logo" class="list-hubs__hub-image" :src="'/' + hub.logo" alt="">
            <img :id="hub.id" v-if="!hub.logo" class="list-hubs__hub-image" src="/images/empty/code.png"
                 alt="">
            <div class="list-hubs__obj-body">
                <div class="list-hubs__title-link"><a :href="'/hubs/' + hub.id">{{ hub.name }}</a></div>
                <div class="list-hubs__desc">{{ hub.description }}</div>
                <div class="list-hubs__desc-sum">Postlar: {{ hub.posts_count }}</div>
            </div>
            <div class="list-hubs__stats">
                <div class="list-hubs__stats-value">{{ hub.rating }}</div>
                <div>
                    Reytinq
                </div>
            </div>
            <hub-follow-button :hub="hub"></hub-follow-button>
        </div>
        <pagination v-if="pagination.last_page > 1 && !loading" :pagination="pagination" :offset="5"
                    @paginate="getHubs()"></pagination>
        <ul v-if="loading" class="content-list">
            <li style="list-style-type: none;">
                <div class="list-hubs__hub">
                    <div class="list-hubs__hub-image loading"
                         style="background-color:#E2E2E2; width: 64px; height: 64px;"></div>
                    <div class="list-hubs__obj-body">
                        <div class="list-hubs__title-link loading"
                             style="width: 20%; background: rgb(226, 226, 226); height: 1.2rem;"></div>
                        <div class="list-hubs__desc loading"
                             style="width: 70%; background: rgb(226, 226, 226); height: 1.2rem;"></div>
                        <div class="list-hubs__desc loading"
                             style="width: 40%; background: rgb(226, 226, 226); height: 1.2rem;"></div>
                    </div>
                    <div class="list-hubs__stats-value" style="width: 100%">
                        <span class="loading"
                              style="width: 20%; background: rgb(226, 226, 226); height: 1.2rem; margin: 0 auto;"></span>
                    </div>
                    <div class="list-hubs__stats-value"
                         style="width: 100%"
                    >
                        <span class="loading"
                              style="width: 45%; background: rgb(226, 226, 226); height: 1.7rem; margin:0 auto;"></span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                hubs: [],
                loading: false,
                pagination: {
                    'current_page': 1
                }
            }
        },
        mounted: function () {
            this.getHubs();
        },
        methods: {
            getHubs: function () {
                this.loading = true;
                axios.get('api/hubs?page=' + this.pagination.current_page).then(response => {
                    this.loading = false;
                    this.hubs = response.data.data;
                    this.pagination = response.data.meta;
                    if (this.pagination.last_page > 50) {
                        this.pagination.last_page = 50;
                    }
                })
                    .catch(error => {
                        this.loading = true
                    });
            },
        },
    }
</script>
