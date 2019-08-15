<template>
    <div :if="data || !loading" class="post__hubs">
        <div class="hub" v-for="tag, index in data">
            {{ tag.name }}
            <div class="popup" :class="{ 'popup-left': index === 0 }">
                <div class="content">
                    <div class="popup_header">
                        <span class="raiting"><i class="icon feather icon-bar-chart-2"></i> {{ tag.raiting }}</span>
                        <span class="followers"><i class="icon feather icon-users"></i> {{ tag.hub_followers_count }}</span>
                        <span class="posts"> <i class="icon devhub icon-file-group-line"></i> {{ tag.posts_count }}</span>
                    </div>
                    <h4>{{ tag.description }}</h4>
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