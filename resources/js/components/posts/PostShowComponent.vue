<template>
    <div id="post-content" class="post-content">
        <div id="sidebar" class="stickyVote">
            <div class="stickyHeader">
                <i class="icon feather icon-chevron-right"></i>{{ post.title }}
            </div>
            <div class="post-votes-sticky">
                <vote :auth_check="auth_check" :posts="post"/>
                <div class="post-edit_author" v-if="auth_check">
                    <i class="mdi mdi-chevron-down"></i>
                </div>
            </div>
        </div>
        <div class="post-content__item">
            <div class="post-content__header">
                <div class="post-title">
                    <h1>{{ post.title }}</h1>
                </div>
                <div class="post-header__right">
                    <div class="post__time">
                        <i class="mdi mdi-calendar-month-outline"></i>
                        {{ post.created_at | moment('DD MMMM, H:mm') }}
                    </div>
                </div>
            </div>
            <hubs-tags v-if="typeof(post.tags) !== `undefined` " :data="post.tags.data"></hubs-tags>
            <div class="post-content__body" v-html="post.body">
            </div>
            <div class="post__content-footer">
                <div class="grid">
                    <div class="footer_item">
                        <i class="mdi mdi-eye-outline"></i> {{ post.views }} Baxışların sayı
                    </div>
                    <favorite :post="post"></favorite>
                    <div class="footer_item ui inline dropdown">
                        <div class="menu">
                            <div class="item"><i class="mdi mdi-flag"></i> Şikayət et</div>
                        </div>
                    </div>
                </div>
                <div class="balloon" :aria-label="post.upvotes + ' plus ' + post.downvotes + ' minus'" data-balloon-pos="up">
                    <div class="progress" :class="{ 'default' : post.votes_sum === 0}">
                        <div class="progress-green" :style="'width:' + [post.votes !== 0 ? 100 * post.upvotes / post.votes_sum : '0'] +'%'"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['auth_check', 'id'],
        data: function () {
            return {
                post: [],
                percent: 0,
            }
        },
        async created() {
            this.getPost()
        },
        methods: {
            async getPost() {
                await axios.get('/api/posts/' + this.id).then(response => {
                    this.post = response.data.data;
                }).catch(error => {
                    this.loading = false
                    this.error = true
                    // DEVELOPING PART
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
            }
        }
    }
</script>

<style scoped>

</style>
