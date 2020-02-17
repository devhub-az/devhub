<template>
    <div class="post-content">
        <posts-loading v-if="loading"/>
        <div v-if="!loading">
            <div v-if="postsNotEmpty">
                <div class="post-content__item" v-for="post in posts">
                    <header class="post__meta">
                        <a v-bind:href="'/users/@' +post.data.creator" class="post__user-info user-info"
                           title="Paylaşmanın müəllifi">
                            <img v-lazy="post.data.profile_image" alt="user avatar" class="user__avatar">
                            <span class="user-info__nickname user-info__nickname_small">{{ '@' + post.data.creator }}</span>
                        </a>
                        <span class="post__time">
                            {{ post.data.created_at |  moment('DD MMMM, H:mm') }}
                        </span>
                        <span class="post__read-time" aria-label="Oxumaq vaxtı" data-balloon-pos="left">
                            <span class="mdi mdi-clock-outline"/>
                            {{ post.data.read_time }}
                        </span>
                    </header>
                    <div class="post-content__header">
                        <a :href="'/post/' + post.data.id" class="post-title">
                            <h2>{{ post.data.title }}</h2>
                        </a>
                        <vote :posts="post.data" :auth_check="auth_check"/>
                    </div>
                    <hubs-tags v-if="post.data.tags.data.length" :data="post.data.tags.data"/>
                    <div class="post-content__body" v-html="post.data.body_short">
                    </div>
                    <div class="post-content__footer">
                        <div class="post-content__footer-stats">
                            <span class="footer_item">
                                <span class="mdi mdi-eye-outline"/> {{ post.data.views }} Baxışların sayı
                            </span>
                            <span class="footer_item">
                                <a :href="'/post/' + post.data.id + '/#comments'" class="post_comments_link">
                                    <span class="mdi mdi-comment-text-multiple-outline"/> {{ post.data.comments }} Şerh
                                </a>
                            </span>
                            <span class="footer_item" @click="copy(post.data.id)" style="cursor: pointer;">
                                <span class="mdi mdi-share"/> Paylaş
                            </span>
                            <favorite :post="post.data"></favorite>
                            <span class="footer_item">
                                    <a href="#" style="color: inherit">
                                        <i class="ellipsis horizontal icon"/>
                                    </a>
                                </span>
                        </div>
                        <a v-bind:href="'/post/' +post.data.id" class="btn btn-more btn-a">Daha ətraflı</a>
                    </div>
                </div>
                <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5"
                            @paginate="getPosts()"/>
            </div>
            <div v-else-if="error" class="post-content__item"
                 style="text-align: center; display: grid; grid-gap: 12px;">
                <span style="font-size: 5rem; opacity: .7;">¯\_(ツ)_/¯</span>
                <h1 style="font-family: 'Nunito', sans-serif;"><span
                        style="border-right: 2px solid; padding: 0 15px 0 15px;">500</span> Server error</h1>
            </div>
            <div v-else class="post-content__item"
                 style="text-align: center; display: grid; grid-gap: 12px;">
                <span style="font-size: 5rem; opacity: .7;">
                    <i class="mdi mdi-comment-edit-outline"></i>
                </span>
                <span>Paylaşma tapılmadı</span>
                <span>
                    <a href="/post/add" class="btn btn-primary">
                        <i class="icon feather icon-plus"/> Yazmağ
                    </a>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    import Clipboard from 'v-clipboard'
    import VueLazyload from 'vue-lazyload'

    Vue.use(Clipboard)

    Vue.use(VueLazyload, {
        preLoad: 1.3,
        error: '/images/errors/error.png',
        // loading: 'dist/loading.gif',
        attempt: 1
    })

    export default {
        props: ['url', 'auth_check', 'hub'],
        data: function () {
            return {
                posts: [],
                id: [],
                content: '',
                error: false,
                loading: false,
                hovered: false,
                postsNotEmpty: false,
                pagination: {
                    'current_page': 1
                },
            }
        },
        async created() {
            this.getPosts();
        },
        methods: {
            async getHubPosts() {
                this.posts = this.hub;
            },
            async getPosts() {
                this.loading = true;
                await axios.get(this.url + '?page=' + this.pagination.current_page).then(response => {
                    this.loading = false;
                    if (response.data.data.length !== 0) {
                        this.posts = response.data.data;
                        this.pagination = response.data.meta;
                        if (this.pagination.last_page > 50) {
                            this.pagination.last_page = 50;
                        }
                        this.postsNotEmpty = true;
                        for (let i = 0; i < this.posts.length; i++) {
                            this.id[i] = this.posts[i].id;
                        }
                    }
                })
                    .catch(error => {
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
            },
            async findVillainIdx(id) {
                let currindex = null;
                for (let i = 0; i < this.$data.posts.length; i++) {
                    if (id === this.$data.posts[i].data.id) {
                        currindex = i;
                        break;
                    }
                }
                return currindex;
            },
            async copy(id) {
                const link = window.location.origin + '/post/' + id;
                try {
                    this.$clipboard(link);
                    new Noty({
                        type: 'success',
                        text: '<div class="notification-image"><span class="mdi mdi-share"/></div> Link kopyalandi',
                    }).show();
                } catch (error) {
                }
            }
        },
    }
</script>
