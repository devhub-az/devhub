<template>
    <div class="post-content">
        <div v-if="loading" class="post-content__item">
            <header class="post__meta">
                <div style="background-color:#E2E2E2" alt="user avatar" class="user__avatar loading"></div>
                <div class="user-info__nickname_small loading"
                     style="width: 20%; background: rgb(226, 226, 226); height: 1.2rem;"></div>
                <span class="post__read-time loading"
                      style="width: 10%; background: rgb(226, 226, 226); height: 1.2rem;"></span>
            </header>
            <div class="post-content__header">
                <div class="post-title loading"
                     style="width: 40%; background: rgb(226, 226, 226); height: 1.5rem;"></div>
                <div class="post-votes">
                    <i class="icon feather icon-thumbs-up"></i>
                    <span><i class="icon iconmoon icon-spinner"></i></span>
                    <i class="icon feather icon-thumbs-down"></i>
                </div>
            </div>
            <div class="post__hubs">
                <div class="hub" v-for="tags in Math.ceil(Math.random()* (5 - 3)) + 3"
                     :style="{width: Math.ceil(Math.random()* (5 - 3)) + 3 + '%'}" style="height: 18px"></div>
            </div>
            <div class="post-content__body">
                <div v-for="text in Math.ceil(Math.random()* (6 - 3 +1)) + 3"
                     :style="{width: Math.floor(Math.random()* (100 - 50 +1)) + 50 +'%'}"
                     style="height: 18px; background: rgb(226, 226, 226); margin-bottom: 12px;" class="loading"></div>
            </div>
            <div class="post-content__footer">
                <div class="post-content__footer-stats">
                    <i class="eye icon"></i> <i class="icon iconmoon icon-spinner"></i>
                    <i class="bookmark outline icon"></i> <i class="icon iconmoon icon-spinner"></i>
                    <i class="comments outline icon"></i> <i class="icon iconmoon icon-spinner"></i>
                </div>
                <div class="btn btn-primary btn-more loading"
                     style="width: 60%; background: rgb(226, 226, 226);     padding: 0;"></div>
            </div>
        </div>
        <div v-if="!loading">
            <div v-if="postsNotEmpty">
                <div class="post-content" v-for="post in posts">
                    <div class="post-content__item">
                        <header class="post__meta">
                            <a v-bind:href="'/@' +post.data.creator" class="post__user-info user-info"
                               title="Автор публикации">
                                <img src="/images/profile/deadpool.gif" alt="user avatar" class="user__avatar">
                                <span
                                    class="user-info__nickname user-info__nickname_small">{{ post.data.creator }}</span>
                            </a>
                            <span class="post__time">{{ post.data.created_at | timeago }} | {{ post.data.created_at |  moment('DD MMMM, H:mm') }}</span>
                            <span class="post__read-time" aria-label="Oxumaq vaxtı" data-balloon-pos="left">
                                <i class="icon devhub icon-clock-line"></i> {{ post.data.read_time }}
                            </span>
                        </header>
                        <div class="post-content__header">
                            <a :href="'/post/' +post.data.id" class="post-title">
                                <h1>{{ post.data.title }}</h1>
                            </a>
                            <vote :posts="post" :auth_check="auth_check"></vote>
                        </div>
                        <hubs-tags v-if="post.data.tags.data.length" :data="post.data.tags.data"></hubs-tags>
                        <div class="post-content__body" v-html="post.data.body">
                        </div>
                        <div class="post-content__footer">
                            <div class="post-content__footer-stats">
                                <span class="footer_item">
                                    <i class="eye icon"></i> {{ post.data.views }} Baxışların sayı
                                </span>
                                <span class="star tooltip footer_item" @click="favorite(post.data.id)"
                                      v-if="!post.data.favorite" aria-label="Seçilmişlərə əlavə et"
                                      data-balloon-pos="down">
                                    <i v-if="!post.data.favorite" class="bookmark outline icon"></i> {{ post.data.followers }} Seçilmiş
                                </span>
                                <span class="star tooltip footer_item" @click="favorite(post.data.id)"
                                      v-if="post.data.favorite" aria-label="Seçilmişlərdən cixartmag"
                                      data-balloon-pos="down">
                                    <i v-if="post.data.favorite" class="bookmark icon"></i> {{ post.data.followers }} Seçilmiş
                                </span>
                                <span class="footer_item">
                                    <a :href="'/post/' + post.data.id + '/#comments'" class="post_comments_link">
                                        <i class="comments outline icon"></i> {{ post.data.comments }} Komment
                                        <span v-if="post.data.comments !== 0">{{ post.data.comments }}</span>
                                    </a>
                                </span>
                                <span class="footer_item" @click="copy(post.data.id)" style="cursor: pointer;">
                                    <i class="share square icon"></i> Paylaş
                                </span>
                                <span class="footer_item">
                                    <a href="#" style="color: inherit">
                                        <i class="ellipsis horizontal icon"></i>
                                    </a>
                                </span>
                            </div>
                            <a v-bind:href="'/post/' +post.data.id" class="btn btn-primary btn-more">Daha ətraflı...</a>
                        </div>
                    </div>
                </div>
                <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5"
                            @paginate="getPosts()"></pagination>
            </div>
            <div v-else-if="error" class="post-content__item"
                 style="text-align: center; display: grid; grid-gap: 12px;">
                <span style="font-size: 5rem; opacity: .7;">¯\_(ツ)_/¯</span>
                <h1 style="font-family: 'Nunito', sans-serif;"><span style="border-right: 2px solid; padding: 0 15px 0 15px;">500</span> Server error</h1>
            </div>
            <div v-else class="post-content__item"
                 style="text-align: center; display: grid; grid-gap: 12px;">
                <span style="font-size: 5rem; opacity: .7;"><i class="icon feather icon-inbox"></i></span>
                <span>Paylaşma tapılmadı</span>
                <span>
                    <a href="/post/add" class="btn btn-primary">
                        <i class="icon feather icon-plus"></i> Yazmağ
                    </a>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    import Clipboard from 'v-clipboard';

    Vue.use(Clipboard);
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
        mounted: function () {
            this.getPosts();
        },
        methods: {
            getHubPosts: function () {
                this.loading = true;
                this.loading = false;
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
                            iziToast.info({
                                message: 'Paylaşma seçilmişlərə elave olundu',
                            })
                        } else if (response.data.delete) {
                            this.posts[index].data.followers--;
                            this.posts[index].data.favorite = false;
                            iziToast.info({
                                message: 'Paylaşma seçilmişlərdən silindi',
                            })
                        }
                    })
                    .catch(error => {
                        iziToast.error({
                            title: 'Xəta',
                            message: 'Qanunsuz əməliyyat',
                        });
                    });
            },
            copy: function (id) {
                const link = window.location.origin + '/post/' + id;
                try {
                    this.$clipboard(link);
                    iziToast.show({
                        id: null,
                        class: 'iziSuccess',
                        title: '',
                        titleColor: '',
                        titleSize: '',
                        titleLineHeight: '',
                        message: 'Link kopyalandi',
                        messageColor: 'var(--color-text)',
                        messageSize: '',
                        messageLineHeight: '',
                        backgroundColor: 'var(--color-app-bg)',
                        theme: 'light', // dark
                        color: 'var(--color-green)',
                        icon: "check icon",
                        iconColor: "var(--color-green)",
                        iconUrl: null,
                        imageWidth: 50,
                        maxWidth: null,
                        layout: 1,
                        balloon: false,
                        close: false,
                        closeOnEscape: false,
                        closeOnClick: false,
                        displayMode: 0, // once, replace
                        position: 'bottomCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                        target: '',
                        targetFirst: true,
                        timeout: 5000,
                        rtl: false,
                        animateInside: true,
                        drag: true,
                        pauseOnHover: true,
                        resetOnHover: false,
                        progressBar: false,
                        progressBarColor: '',
                        progressBarEasing: 'linear',
                        overlay: false,
                        overlayClose: false,
                        overlayColor: 'rgba(0, 0, 0)',
                        transitionIn: 'fadeInUp',
                        transitionOut: 'fadeOut',
                        transitionInMobile: 'fadeInUp',
                        transitionOutMobile: 'fadeOutDown',
                    });
                } catch (error) {
                    iziToast.show({
                        id: null,
                        class: 'iziError',
                        title: '',
                        titleColor: '',
                        titleSize: '',
                        titleLineHeight: '',
                        message: 'Nəsə işləmədi...',
                        messageColor: 'var(--color-text)',
                        messageSize: '',
                        messageLineHeight: '',
                        backgroundColor: 'var(--color-app-bg)',
                        theme: 'light', // dark
                        color: 'var(--color-red)',
                        icon: "x icon",
                        iconColor: "var(--color-red)",
                        iconUrl: null,
                        imageWidth: 50,
                        maxWidth: null,
                        layout: 1,
                        balloon: false,
                        close: false,
                        closeOnEscape: false,
                        closeOnClick: false,
                        displayMode: 0, // once, replace
                        position: 'bottomCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                        target: '',
                        targetFirst: true,
                        timeout: 5000,
                        rtl: false,
                        animateInside: true,
                        drag: true,
                        pauseOnHover: true,
                        resetOnHover: false,
                        progressBar: false,
                        progressBarColor: '',
                        progressBarEasing: 'linear',
                        overlay: false,
                        overlayClose: false,
                        overlayColor: 'rgba(0, 0, 0)',
                        transitionIn: 'fadeInUp',
                        transitionOut: 'fadeOut',
                        transitionInMobile: 'fadeInUp',
                        transitionOutMobile: 'fadeOutDown',
                    });
                }

            }
        },
    }
</script>
