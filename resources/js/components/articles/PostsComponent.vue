<template>
    <div class="mb-3">
        <posts-loading v-if="loading"/>
        <div v-if="!loading && !postsEmpty">
            <div class="w-full mb-3 rounded border bg-white dark:bg-dpaper dark:border-gray-700"
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
                           class="my-auto text-2xl xs:text-xl dark:text-gray-300">
                            {{ post.attributes.title }}
                        </a>
                        <vote :item="post"/>
                    </div>
                    <hubs-tags v-if="post.relationships.hubs.data.length" :data="post.relationships.hubs.data"
                               :auth_check="auth_check"/>
                    <div class="markdown my-2 xs:hidden md:hidden sm:hidden">
                        <div
                            v-for="block in edjsParser.parse(JSON.parse(post.attributes.body)).slice(0,2)"
                            v-html="block.length > 700 ? block.slice(0,600) + '...' : block"></div>
                    </div>
                </div>
                <div
                    class="grid lg:grid-cols-main border-t rounded-b text-sm bg-afooter dark:bg-gray-800 dark:border-gray-700 mt-2 px-3.5 h-10">
                    <div class="flex xs:justify-between items-center md:justify-between sm:justify-between space-x-10">
                        <div class="flex items-center">
                            <i class="iconify text-gray-500 dark:text-gray-300" data-icon="mdi-eye-outline"/>
                            <p class="ml-1 text-gray-500 dark:text-gray-300">{{ post.attributes.views }}</p>
                        </div>
                        <div>
                            <a :href="'/article/' + post.attributes.slug + '#comments'" class="flex items-center">
                                <i class="iconify text-gray-500 dark:text-gray-300" data-icon="bx:bx-comment-detail"/>
                                <p class="ml-1 text-gray-500 dark:text-gray-300">
                                    {{ post.relationships.comments.data.length }}
                                </p>
                            </a>
                        </div>
                        <favorite :post="post" :auth_check="auth_check"/>
                        <div class=" flex items-center cursor-pointer" @click="copy(post.id)">
                            <span class="iconify text-gray-500 dark:text-gray-300" data-icon="fa-solid:share-alt" data-inline="false"></span>
                        </div>
                    </div>
                    <div class="my-auto h-1 balloon xs:hidden md:hidden sm:hidden"
                         :aria-label="post.attributes.votes_sum + ' səs: ' + post.attributes.upvotes + ' artı ' + post.attributes.downvotes + ' mənfi'"
                         data-balloon-pos="up">
                        <div class="my-auto bg-gray-300 dark:bg-gray-600 w-full rounded h-1 relative"
                             :class="{ 'default' : post.attributes.votes_sum === 0}">
                            <div class="absolute h-1 bg-green-600 rounded-l"
                                 :style="'width:' + [post.attributes.votes_sum !== 0 ? 100 * post.attributes.upvotes / post.attributes.votes_sum : '0'] +'%'"
                                 style="width: 50%;"></div>
                            <div class="absolute h-1 bg-red-600 rounded-r right-0"
                                 :style="'width:' + [post.attributes.votes_sum !== 0 ? 100 * post.attributes.downvotes / post.attributes.votes_sum : '0'] +'%'"
                                 style="width: 50%;"></div>
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
             class="bg-white dark:bg-dpaper dark:border-gray-700 rounded border py-10">
            <div class="w-2/3 mx-auto space-y-4 xs:w-full xs:px-4">
                <div class="font-bold space-x-1 flex justify-center items-center text-center text-2xl pb-2">
                    <span class="iconify dark:text-gray-300" data-icon="mdi:close-box-multiple-outline"
                          data-inline="false"></span>
                    <p class="dark:text-gray-300">Paylaşma tapılmadı</p>
                </div>
                <p class="font-light text-center dark:text-gray-400">
                    Kenar çubuğunda "Kimin izləməsi" ndə göstərilən bəzi istifadəçiləri izləyə bilərsiniz
                </p>
                <a href="/article/new"
                   class="btn block flex w-max mx-auto xs:hidden">
                    <i class="iconify" data-icon="mdi-plus"/> Yazmağ
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios"

const edjsHTML = require('editorjs-html');
const edjsParser = edjsHTML({code: codeParser, image: imageParser, embed: emdebParser});

function codeParser(block) {
    return `<code>` + block.data.code + `</code>`
}

function imageParser(block) {
    return `<img src="` + block.data.url + `" alt="` + block.data.caption + `">`
}

function emdebParser(block) {
    return '<iframe class="w-full h-80" src="' + block.data.embed + '"></iframe>';
}

export default {
    props: ['url', 'auth_check', 'hub'],
    data: function () {
        return {
            posts: [],
            notification: {
                message: '',
                type: '',
            },
            id: [],
            edjsParser: edjsHTML(),
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
        async getHubPosts() {
            this.posts = this.hub;
        },
        async getPosts() {
            this.loading = true;
            await axios.get(this.url + '?page=' + this.pagination.current_page).then(({data}) => {
                this.loading = false;
                if (data.data.length !== 0) {
                    this.posts = data.data;
                    this.pagination = data.meta;
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
            // this.$clipboard(link);
        }
    },
}
</script>
