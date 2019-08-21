<template>
    <div class="post__hubs">
        <div v-for="hub, index in data">
            <div class="hub popup-hub" :class="{'active_hub': hub.follower_check}">
                <i :class="hub.name.toLowerCase() + ' icon'"></i> {{ hub.name }}
            </div>
            <div class="ui fluid popup" >
                <div class="ui four column">
                    <div class="popup_header">
                        <span class="raiting"><i class="icon feather icon-bar-chart-2"></i> {{ hub.raiting }}</span>
                        <span class="followers"><i class="icon feather icon-users"></i> {{ hub.hub_followers_count }}</span>
                        <span class="posts"> <i class="icon devhub icon-file-group-line"></i> {{ hub.posts_count }}</span>
                    </div>
                    <h4>{{ hub.description }}</h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data: function() {
            return {
                loading: false,
            }
        }
    }
</script>