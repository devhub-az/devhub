<template>
    <div class="mb-3">
        <article-loading v-if="loading"/>
        <article v-if="!loading" id="post-content" class="w-full rounded border dark:border-gray-700">
            <div
                class="sticky top-0 flex justify-between rounded-t items-center border-b bg-afooter dark:bg-gray-800 dark:border-gray-700 px-3.5 py-1 z-10">
                <div class="inline-flex">
                    <a :href="'/authors/@' + post.relationships.author.data.attributes.username"
                       class="inline-flex">
                        <img class="w-6 h-6 flex-none image-fit rounded lazyload"
                             :src="post.relationships.author.data.attributes.avatar" alt="user avatar">
                        <p class="text-sm pl-2 m-auto dark:text-gray-300">
                            {{ '@' + post.relationships.author.data.attributes.username }}</p>
                    </a>
                    <p class="text-xs my-auto mr-auto pl-2 dark:text-gray-300">
                        {{ post.attributes.created_at |  moment('DD MMMM, H:mm') }}
                    </p>
                </div>
                <div class="post-votes-sticky">
                    <vote :item="post"/>
                    <div class="post-edit_author" v-if="auth_check">
                        <i class="mdi mdi-chevron-down"></i>
                    </div>
                </div>
            </div>
            <div class="px-3.5 bg-white dark:bg-dpaper">
                <div class="py-2">
                    <p class="text-2xl xs:text-xl font-medium dark:text-gray-300">{{ post.attributes.title }}</p>
                </div>
                <hubs-tags v-if="typeof(post.relationships.hubs) !== `undefined` "
                           :data="post.relationships.hubs.data"></hubs-tags>
                <div id="markdown" class="markdown py-2">
                    <div
                        v-for="block in edjsParser.parse(JSON.parse(post.attributes.body))" v-html="block"></div>
<!--                    <highlightjs autodetect :code="'var x = 5;'" />-->
                    <pre v-highlightjs="'var x = 5;'"></pre>
                </div>
            </div>
            <div
                class="grid lg:grid-cols-main rounded-b border-t text-sm bg-afooter dark:bg-gray-800 dark:border-gray-700 px-3.5 py-2">
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
        </article>
    </div>
</template>

<script>
import axios from "axios";

const edjsHTML = require('editorjs-html');
const edjsParser = edjsHTML({code: codeParser, image: imageParser, embed: emdebParser});

function codeParser(block) {
    console.log(hljs.highlightAuto('<code>' + block.data.code + '</code>').value)
    return `<code>` + hljs.highlightAuto(block.data.code).value + `</code>`
    // return `<code>` + block.data.code + `</code>`
}

function imageParser(block) {
    return `<img src="` + block.data.url + `" alt="` + block.data.caption + `">`
}

function emdebParser(block) {
    return '<iframe class="w-full h-80" src="' + block.data.embed + '"></iframe>';
}

export default {
    props: ['auth_check', 'slug'],
    data: function () {
        return {
            loading: false,
            edjsParser: edjsHTML(),
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
            this.loading = true;
            await axios.get('/api/articles/' + this.slug).then(response => {
                this.loading = false;
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
