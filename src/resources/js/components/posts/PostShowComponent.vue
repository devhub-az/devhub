<template>
    <div id="post-content" class="post-content">
        <div id="sidebar" class="stickyVote">
            <div class="stickyHeader">
                <i class="icon feather icon-chevron-right"></i>{{ post.attributes.title }}
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
                    <h3>{{ post.attributes.title }}</h3>
                </div>
                <div class="post-header__right">
                    <div class="post__time">
                        <i class="mdi mdi-calendar-month-outline"></i>
                        {{ post.attributes.created_at | moment('DD MMMM, H:mm') }}
                    </div>
                </div>
            </div>
            <hubs-tags v-if="typeof(post.relationships.hubs) !== `undefined` " :data="post.relationships.hubs.data"></hubs-tags>
            <div class="post-content__body-show" v-html="post.attributes.body">
            </div>
            <div class="post__content-footer">
                <div class="grid">
                    <div class="footer_item">
                        <i class="mdi mdi-eye-outline"></i> {{ post.views }} Baxışların sayı
                    </div>
                    <favorite :post="post" :auth_check="auth_check"></favorite>
                    <div class="footer_item ui inline dropdown">
                        <div class="menu">
                            <div class="item"><i class="mdi mdi-flag"></i> Şikayət et</div>
                        </div>
                    </div>
                </div>

                <div class="balloon" :aria-label="post.attributes.votes_sum + ': ' + post.attributes.upvotes + ' plus ' + post.attributes.downvotes + ' minus'" data-balloon-pos="up">
                    <div class="progress" :class="{ 'default' : post.attributes.votes_sum === 0}">
                        <div class="progress-green" :style="'width:' + [post.attributes.votes_sum !== 0 ? 100 * post.attributes.upvotes / post.attributes.votes_sum : '0'] +'%'"></div>
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
                post: {
                    attributes: [],
                    relationships: []
                },
            }
        },
        async created() {
            await this.getPost()
        },
        methods: {
            async getPost() {
                await axios.get('/api/articles/' + this.id).then(response => {
                    this.post = response.data;
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
