<template>
    <div>
        <div v-if="!loading" class="post-content">
            <div class="content-list">
                <div v-for="hub in hubs" class="list-hubs__hub">
                    <img v-if="hub.logo" class="list-hubs__hub-image" :src="'/' + hub.logo" alt="">
                    <img v-if="!hub.logo" class="list-hubs__hub-image" src="/images/empty/code.png" alt="">
                    <div class="list-hubs__obj-body">
                        <div class="list-hubs__title-link"> <a :href="'/hubs/' + hub.id">{{ hub.name }}</a></div>
                        <div class="list-hubs__desc">{{ hub.description }}</div>
                        <div class="list-hubs__desc">Postlar: {{ hub.posts_count }}</div>
                    </div>
                    <div class="list-hubs__stats-value">
                        {{ hub.raiting }}
                    </div>
                    <hub-follow-button :hub="hub"></hub-follow-button>
                </div>
            </div>
        </div>
        <pagination v-if="pagination.last_page > 1 && !loading" :pagination="pagination" :offset="5" @paginate="getHubs()"></pagination>

        <div v-if="loading">
            <ul class="content-list">
                <li>
                    <div class="list-hubs__hub">
                        <div class="list-hubs__hub-image loading" style="background-color:#E2E2E2; width: 64px; height: 64px;"></div>
                        <div class="list-hubs__obj-body">
                            <div class="list-hubs__title-link loading" style="width: 20%; background: rgb(226, 226, 226); height: 1.2rem;"></div>
                            <div class="list-hubs__desc loading" style="width: 70%; background: rgb(226, 226, 226); height: 1.2rem;"></div>
                            <div class="list-hubs__desc loading" style="width: 40%; background: rgb(226, 226, 226); height: 1.2rem;"></div>
                        </div>
                        <div class="list-hubs__stats-value loading" style="width: 20%; background: rgb(226, 226, 226); height: 1.2rem; margin: 0 auto;">
                        </div>
                        <div class="list-hubs__stats-value loading" style="width: 60%; background: rgb(226, 226, 226); height: 1.7rem; margin-left: auto;">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                hubs: [],
                loading: false,
                pagination: {
                    'current_page': 1
                }
            }
        },
        mounted: function() {
            this.getHubs();
        },
        methods: {
            getHubs: function(){
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
