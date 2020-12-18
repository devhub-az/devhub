<template>
    <div class="mb-3">
        <posts-loading v-if="loading"/>
        <div v-if="!loading && !postsEmpty">
            <div class="w-full mb-3 rounded bg-white dark:bg-transparent border dark:border-gray-700"
                 v-for="post in posts">
                <div class="px-3.5">
                    <div class="flex align-middle pt-3">
                        <a v-bind:href="'/authors/@' + post.relationships.author.data.attributes.username"
                           class="inline-flex no-underline"
                           title="Paylaşmanın müəllifi">
                            <img height="32" width="32"
                                 alt="user avatar" class="w-6 h-6 flex-none image-fit rounded lazyload"
                                 :src="post.relationships.author.data.attributes.avatar">
                            <p class="text-sm pl-2 m-auto dark:text-gray-300">
                                {{ '@' + post.relationships.author.data.attributes.username }}</p>
                        </a>
                        <p class="text-xs my-auto mr-auto pl-2 dark:text-gray-300">
                            {{ post.attributes.created_at | moment('DD MMMM, H:mm') }}
                        </p>
                        <div class="flex items-center text-sm my-auto xs:hidden md:hidden sm:hidden"
                             aria-label="Oxumaq vaxtı" data-balloon-pos="left">
                            <span class="iconify dark:text-gray-300" data-icon="mdi-clock-outline"></span>
                            <p class="ml-1 dark:text-gray-300">{{ post.attributes.read_time }}</p>
                        </div>
                    </div>
                    <div class="grid grid-flow-col py-2">
                        <a :href="'/article/' + post.attributes.slug"
                           class="my-auto text-2xl xs:text-xl font-medium dark:text-gray-300">
                            {{ post.attributes.title }}
                        </a>
                        <vote :posts="post" :auth_check="auth_check"/>
                    </div>
                    <hubs-tags v-if="post.relationships.hubs.data.length" :data="post.relationships.hubs.data"
                               :auth_check="auth_check"/>
                    <div class="markdown my-2 xs:hidden md:hidden sm:hidden" v-html="md(post.attributes.body)">
                    </div>
                </div>
                <div
                    class="grid lg:grid-cols-main border-t rounded-b text-sm bg-gray-100 dark:bg-gray-800 dark:border-gray-700 mt-2 px-3.5 py-2">
                    <div class="flex xs:justify-between items-center md:justify-between sm:justify-between">
                        <div class="flex items-center">
                            <i class="iconify dark:text-gray-300" data-icon="mdi-eye-outline"/>
                            <p class="ml-1 dark:text-gray-300">{{ post.attributes.views }}</p>
                            <p class="ml-1 dark:text-gray-300 xs:hidden sm:hidden">Baxışların sayı</p>
                        </div>
                        <div class="pl-2">
                            <a :href="'/post/' + post.id + '#comments'" class="flex items-center">
                                <i class="iconify dark:text-gray-300" data-icon="mdi-comment-text-multiple-outline"/>
                                <p class="ml-1 dark:text-gray-300">{{
                                        post.comments_count ? post.comments_count : 'X'
                                    }}</p>
                                <p class="ml-1 dark:text-gray-300 xs:hidden sm:hidden">Şerh</p>
                            </a>
                        </div>
                        <favorite :post="post" :auth_check="auth_check"/>
                        <div class="pl-2 flex items-center cursor-pointer" @click="copy(post.id)">
                            <i class="iconify dark:text-gray-300" data-icon="mdi-share"/>
                            <p class="ml-1 dark:text-gray-300 xs:hidden sm:hidden">Paylaş</p>
                        </div>
                    </div>
                    <div class="my-auto h-1 balloon xs:hidden md:hidden sm:hidden"
                         :aria-label="post.attributes.votes_sum + ' səs: ' + post.attributes.upvotes + ' plus ' + post.attributes.downvotes + ' minus'"
                         data-balloon-pos="up">
                        <div class="my-auto bg-gray-300 w-full rounded h-1 relative"
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
        <div v-else-if="postsEmpty"
             class="bg-white dark:bg-transparent dark:border-gray-700 rounded border text-center grid gap-2 p-5">
            <span class="opacity-75" style="font-size: 5rem">
                <i class="iconify mx-auto dark:text-gray-400" data-icon="mdi-comment-edit-outline"/>
            </span>
            <span class="opacity-75 pb-2 dark:text-gray-300">Paylaşma tapılmadı</span>
            <a href="/post/add"
               class="w-max flex mx-auto items-center border border-cerulean-700 font-semibold uppercase text-xs rounded px-3 py-1.5 text-gray-100 bg-cerulean-700 hover:opacity-90">
                <i class="iconify" data-icon="mdi-plus"/> Yazmağ
            </a>
        </div>
    </div>
</template>

<script>
import axios from "axios"
import Noty from 'noty'

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
                    text: '<div class="notification-image"><span class="iconify" data-icon="mdi-share"/></div> Link kopyalandi',
                }).show();
            } catch (error) {
            }
        }
    },
}
</script>
