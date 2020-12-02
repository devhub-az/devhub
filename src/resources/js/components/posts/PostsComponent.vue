<template>
    <div class="mb-3">
        <posts-loading v-if="loading"/>
        <div v-if="!loading && !postsEmpty">
            <div class="w-full mb-3 rounded bg-white border" v-for="post in posts">
                <div class="px-3.5">
                    <div class="flex align-middle pt-3">
                        <a v-bind:href="'/users/@' + post.relationships.author.data.username"
                           class="inline-flex no-underline"
                           title="Paylaşmanın müəllifi">
                            <img v-if="post.relationships.author.data.avatar !== 'user.jpg'"
                                 :data-src="'/upload/user_'+ post.relationships.author.data.id + '/logo/' + post.relationships.author.data.avatar"
                                 height="32" width="32"
                                 alt="user avatar" class="w-6 h-6 flex-none image-fit rounded lazyload" src="">
                            <img v-else-if="post.relationships.author.data.avatar === 'user.jpg'"
                                 :data-src="'/upload/default/logo/default.png'" height="32" width="32"
                                 alt="user avatar" class="flex-none image-fit rounded lazyload w-6 h-6" src="">
                            <span class="text-sm pl-2 m-auto">
                                {{ '@' + post.relationships.author.data.username }}</span>
                        </a>
                        <span class="text-xs my-auto mr-auto pl-2">
                            {{ post.attributes.created_at |  moment('DD MMMM, H:mm') }}
                        </span>
                        <span class="text-sm my-auto xs:hidden" aria-label="Oxumaq vaxtı" data-balloon-pos="left">
                            <span class="mdi mdi-clock-outline"/>
                            {{ post.attributes.read_time }}
                        </span>
                    </div>
                    <div class="grid grid-flow-col py-2">
                        <a :href="'/post/' + post.id">
                            <p class="text-2xl xs:text-xl font-medium">{{ post.attributes.title }}</p>
                        </a>
                        <vote :posts="post" :auth_check="auth_check"/>
                    </div>
                    <hubs-tags v-if="post.relationships.hubs.data.length" :data="post.relationships.hubs.data"
                               :auth_check="auth_check"/>
                    <div class="markdown my-2 xs:hidden" v-html="md(post.attributes.body)">
                    </div>
                </div>
                <div class="grid lg:grid-cols-main md:grid-cols-main border text-sm bg-gray-100 mt-2 px-3.5 py-2">
                    <div class="xs:flex xs:justify-between">
                        <span>
                            <i class="mdi mdi-eye-outline"/> {{ post.views }}
                            <span class="xs:hidden">Baxışların sayı</span>
                        </span>
                        <span class="pl-2">
                            <a :href="'/post/' + post.id + '/#comments'" class="post_comments_link">
                                <i class="mdi mdi-comment-text-multiple-outline"/> {{ post.comments_count }} <span
                                class="xs:hidden">Şerh</span>
                            </a>
                        </span>
                        <favorite :post="post" :auth_check="auth_check"/>
                        <span class="pl-2" @click="copy(post.id)" style="cursor: pointer;">
                            <i class="mdi mdi-share"/> <span class="xs:hidden">Paylaş</span>
                        </span>
                    </div>
                    <div class="my-auto h-1 balloon xs:hidden"
                         :aria-label="post.attributes.votes_sum + ' səs: ' + post.attributes.upvotes + ' plus ' + post.attributes.downvotes + ' minus'"
                         data-balloon-pos="up">
                        <div class="my-auto bg-gray-300 w-full rounded h-1"
                             :class="{ 'default' : post.attributes.votes_sum === 0}">
                            <div class="absolute h-1 bg-blue rounded"
                                 :style="'width:' + [post.attributes.votes_sum !== 0 ? 100 * post.attributes.upvotes / post.attributes.votes_sum : '0'] +'%'"></div>
                        </div>
                    </div>
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
        <div v-else-if="postsEmpty" class="post-content__item"
             style="text-align: center; display: grid; grid-gap: 12px; padding: 24px;">
            <span style="font-size: 5rem; opacity: .7;">
                <i class="mdi mdi-comment-edit-outline"/>
            </span>
            <span style="opacity: .7;">Paylaşma tapılmadı</span>
            <span>
                <a href="/post/add" class="btn btn-primary">
                    <i class="icon feather icon-plus"/> Yazmağ
                </a>
            </span>
        </div>
    </div>
</template>

<script>
import axios from "axios"

const MarkdownIt = require('markdown-it')().use(require('markdown-it-multimd-table'));

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
            postsEmpty: false,
            pagination: {
                'current_page': 1
            },
        }
    },
    async created() {
        await this.getPosts();
    },
    methods: {
        md(text) {
            return MarkdownIt.render(text)
        },
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
                    for (let i = 0; i < this.posts.length; i++) {
                        this.id[i] = this.posts[i].id;
                    }
                } else this.postsEmpty = true;
            })
                .catch(error => {
                    this.loading = false
                    this.error = true
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
