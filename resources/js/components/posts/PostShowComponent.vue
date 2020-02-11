<template>
    <div id="post-content" class="post-content">
        <div id="sidebar" class="stickyVote">
            <div class="stickyHeader">
                <i class="icon feather icon-chevron-right"></i>{{ post.data.title }}
            </div>
            <div class="post-votes-sticky">
                <vote :posts="post" :auth_check="auth_check"></vote>
                <div class="post-edit_author" v-if="auth_check">
                    <i class="mdi mdi-chevron-down"></i>
                </div>
            </div>
        </div>
        <div class="post-content__item">
            <div class="post-content__header">
                <div class="post-title">
                    <h1>{{ post.data.title }}</h1>
                </div>
                <div class="post-header__right">
                    <div class="post__time">
                        <i class="mdi mdi-calendar-month-outline"></i>
                        {{ post.data.created_at |  moment('DD MMMM, H:mm') }}
                    </div>
                </div>
            </div>
            <hubs-tags v-if="hubs" :data="hubs.data"></hubs-tags>
            <div class="post-content__body" v-html="body">
            </div>
            <div id="content_footer" class="post__content-footer">
                <div class="footer_item">
                    <i class="mdi mdi-eye-outline"></i> {{ post.data.views }} Baxışların sayı
                </div>
                <favorite :post="post.data"></favorite>
                <div class="footer_item ui inline dropdown">
                    <div class="menu">
                        <div class="item"><i class="mdi mdi-flag"></i> Şikayət et</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PostShowComponent",
        props: ['post', 'auth_check', 'body', 'hubs', 'user'],
    }
</script>

<style scoped>

</style>
