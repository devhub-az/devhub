<template>
    <div class="mb-3">
        <article-loading v-if="loading"/>
        <div v-if="!loading" id="post-content" class="w-full rounded bg-white border">
            <div id="sidebar"
                 class="sticky top-0 flex justify-between items-center border-b bg-gray-100 px-3.5 py-1 z-10">
                <div class="inline-flex">
                    <a :href="'/authors/@' + post.relationships.author.data.attributes.username"
                       class="inline-flex">
                        <img class="w-6 h-6 flex-none image-fit rounded lazyload"
                             :src="post.relationships.author.data.attributes.avatar" alt="user avatar">
                        <p class="text-sm pl-2 m-auto">
                            {{ '@' + post.relationships.author.data.attributes.username }}</p>
                    </a>
                    <p class="text-xs my-auto mr-auto pl-2">
                        {{ post.attributes.created_at |  moment('DD MMMM, H:mm') }}
                    </p>

                </div>
                <div class="post-votes-sticky">
                    <vote :auth_check="auth_check" :posts="post"/>
                    <div class="post-edit_author" v-if="auth_check">
                        <i class="mdi mdi-chevron-down"></i>
                    </div>
                </div>
            </div>
            <div class="px-3.5">
                <div class="py-2">
                    <p class="text-2xl xs:text-xl font-medium">{{ post.attributes.title }}</p>
                </div>
                <hubs-tags v-if="typeof(post.relationships.hubs) !== `undefined` "
                           :data="post.relationships.hubs.data"></hubs-tags>
                <div class="markdown my-2">
                    <div
                        v-for="block in edjsParser.parse(JSON.parse(post.attributes.body))" v-html="block"></div>
                </div>
            </div>
            <div class="grid lg:grid-cols-main border-t text-sm bg-gray-100 mt-2 px-3.5 py-2">
                <div class="xs:flex xs:justify-between md:flex md:justify-between sm:flex sm:justify-between">
                    <span>
                        <i class="mdi mdi-eye-outline"/> {{ post.attributes.views ? post.attributes.views : 'X' }}
                        <span class="xs:hidden sm:hidden">Baxışların sayı</span>
                    </span>
                    <favorite :post="post" :auth_check="auth_check"/>
                    <span class="pl-2" @click="copy(post.id)" style="cursor: pointer;">
                        <i class="mdi mdi-share"/> <span class="xs:hidden sm:hidden">Paylaş</span>
                    </span>
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
    </div>
</template>

<script>
import axios from "axios";

const edjsHTML = require('editorjs-html');
const edjsParser = edjsHTML({code: codeParser, image: imageParser, embed: emdebParser});

function codeParser(block) {
    return `<code>` + block.data.code + `</code>`
}

function imageParser(block) {
    return `<img src="` + block.data.url + `" alt="` + block.data.caption + `">`
}

function emdebParser(block){
    return '<iframe class="w-full h-80" src="' + block.data.embed + '"></iframe>';
}

export default {
    props: ['auth_check', 'id'],
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
            await axios.get('/api/articles/' + this.id).then(response => {
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
