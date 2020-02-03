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
                            <span
                                    class="user-info__nickname user-info__nickname_small">{{ '@' + post.data.creator }}</span>
                        </a>
                        <span class="post__time"> {{ post.data.created_at |  moment('DD MMMM, H:mm') }}</span>
                        <span class="post__read-time" aria-label="Oxumaq vaxtı" data-balloon-pos="left">
                            <span class="mdi mdi-clock-outline"/> {{ post.data.read_time }}
                            </span>
                    </header>
                    <div class="post-content__header">
                        <a :href="'/post/' + post.data.id" class="post-title">
                            <h2>{{ post.data.title }}</h2>
                        </a>
                        <vote :posts="post" :auth_check="auth_check"/>
                    </div>
                    <hubs-tags v-if="post.data.tags.data.length" :data="post.data.tags.data"/>
                    <div class="post-content__body" v-html="post.data.body">
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
                            <span class="star tooltip footer_item" @click="favorite(post.data.id)"
                                  v-if="!post.data.favorite" aria-label="Seçilmişlərə əlavə et"
                                  data-balloon-pos="down">
                                    <span v-if="!post.data.favorite" class="mdi mdi-bookmark-plus"/> {{ post.data.followers }} Seçilmiş
                                </span>
                            <span class="star tooltip footer_item" @click="favorite(post.data.id)"
                                  v-if="post.data.favorite" aria-label="Seçilmişlərdən cixartmag"
                                  data-balloon-pos="down">
                                    <span v-if="post.data.favorite" class="mdi mdi-bookmark-check"/> {{ post.data.followers }} Seçilmiş
                                </span>
                            <span class="footer_item">
                                    <a href="#" style="color: inherit">
                                        <i class="ellipsis horizontal icon"/>
                                    </a>
                                </span>
                        </div>
                        <a v-bind:href="'/post/' +post.data.id" class="btn btn-primary btn-more">Daha ətraflı</a>
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
                <span style="font-size: 5rem; opacity: .7;"><img v-lazy="'/images/png.svg'" alt="" width="250"/></span>
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
        created: function () {
            this.getPosts();
        },
        methods: {
            getHubPosts: function () {
                this.posts = this.hub;
            },
            getPosts: function () {
                this.loading = true;
                axios.get(this.url + '?page=' + this.pagination.current_page).then(response => {
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
            findVillainIdx: function (id) {
                let currindex = null;
                for (let i = 0; i < this.$data.posts.length; i++) {
                    if (id === this.$data.posts[i].data.id) {
                        currindex = i;
                        break;
                    }
                }
                ;
                return currindex;
            },
            favorite: function (id) {
                const index = this.findVillainIdx(id);
                axios.post('/post/favorite/' + id, {
                    id: id,
                })
                    .then(response => {
                        if (response.data.success) {
                            this.posts[index].data.followers++;
                            this.posts[index].data.favorite = true;
                            new Noty({
                                type: 'success',
                                text: '<div class="notification-image"><i class="mdi mdi-bookmark-plus"></i></div> Paylaşma seçilmişlərə əlave olundu',
                            }).show();
                        } else if (response.data.delete) {
                            this.posts[index].data.followers--;
                            this.posts[index].data.favorite = false;
                            new Noty({
                                type: 'error',
                                text: '<div class="notification-image"><i class="mdi mdi-bookmark-remove"></i></div> Paylaşma seçilmişlərdən silindi',
                            }).show();
                        }
                    })
                    .catch(error => {
                        iziToast.error({
                            title: 'Xəta',
                            message: 'Qanunsuz əməliyyat',
                        });
                        new Noty({
                            type: 'error',
                            text: '<div class="notification-image"><img src="images/errors/error.png"></div> Qanunsuz əməliyyat',
                        }).show();
                    });
            },
            copy: function (id) {
                const link = window.location.origin + '/post/' + id;
                try {
                    this.$clipboard(link);
                    new Noty({
                        type: 'success',
                        text: '<div class="notification-image"><i class="share square icon"></i></div> Link kopyalandi',
                    }).show();
                } catch (error) {
                }
            }
        },
    }
</script>
