<template>
    <div class="mb-3">
        <articles-loading v-if="loading"/>
        <div v-if="!loading && !articlesEmpty">
            <div class="w-full mb-3 rounded border bg-white dark:bg-dpaper dark:border-gray-700"
                 v-for="article in articles">
                <div class="px-3.5">
                    <div class="flex align-middle pt-3">
                        <a v-bind:href="'/@' + article.relationships.author.data.attributes.username"
                           class="inline-flex no-underline author-popover"
                           :data-id="article.relationships.author.data.id"
                           title="Paylaşmanın müəllifi">
                            <img height="32" width="32"
                                 alt="user avatar" class="w-6 h-6 flex-none image-fit rounded lazyload"
                                 :src="article.relationships.author.data.attributes.avatar">
                            <p class="text-sm pl-2 m-auto dark:text-gray-300">
                                {{ '@' + article.relationships.author.data.attributes.username }}</p>
                        </a>
                        <p class="text-xs my-auto mr-auto pl-2 dark:text-gray-300">
                            {{ article.attributes.created_at | moment('DD MMMM, H:mm') }}
                        </p>
                        <div class="flex items-center text-sm my-auto xs:hidden md:hidden sm:hidden read-time"
                             aria-label="Oxumaq vaxtı" data-balloon-pos="left">
                            <span class="iconify dark:text-gray-300" data-icon="mdi-clock-outline"></span>
                            <p class="ml-1 dark:text-gray-300">{{ article.attributes.read_time }}</p>
                        </div>
                    </div>
                    <div class="grid grid-flow-col py-2">
                        <a :href="'/article/' + article.attributes.slug"
                           class="my-auto text-2xl xs:text-xl dark:text-gray-300">
                            {{ article.attributes.title }}
                        </a>
                        <vote :item="article"/>
                    </div>
                    <hubs-tags v-if="article.relationships.hubs.data.length" :data="article.relationships.hubs.data"
                               :auth_check="auth_check"/>
                    <div class="prose my-2 xs:hidden md:hidden sm:hidden">
                        <div
                            v-for="block in edjsParser.parse(JSON.parse(article.attributes.body)).slice(0,2)"
                            v-html="block.length > 700 ? block.slice(0,600) + '...' : block"></div>
                    </div>
                </div>
                <div
                    class="grid lg:grid-cols-main border-t rounded-b text-sm bg-afooter dark:bg-gray-800 dark:border-gray-700 mt-2 px-3.5 h-10">
                    <div class="flex xs:justify-between items-center md:justify-between sm:justify-between space-x-10">
                        <div class="flex items-center">
                            <i class="iconify text-gray-500 dark:text-gray-300" data-icon="mdi-eye-outline"/>
                            <p class="ml-1 text-gray-500 dark:text-gray-300">{{ article.attributes.views }}</p>
                        </div>
                        <div>
                            <a :href="'/article/' + article.attributes.slug + '#comments'" class="flex items-center">
                                <i class="iconify text-gray-500 dark:text-gray-300" data-icon="bx:bx-comment-detail"/>
                                <p class="ml-1 text-gray-500 dark:text-gray-300">
                                    {{ article.relationships.comments.data.length }}
                                </p>
                            </a>
                        </div>
<!--                        <favorite :article="article" :auth_check="auth_check"/>-->
                        <div class=" flex items-center cursor-pointer" @click="copy(article.id)">
                            <span class="iconify text-gray-500 dark:text-gray-300" data-icon="fa-solid:share-alt" data-inline="false"></span>
                        </div>
                    </div>
                    <div class="progress my-auto h-1 balloon xs:hidden md:hidden sm:hidden"
                         :aria-label="$t('devhub.votes') + ' ' + article.attributes.votes + ': ↑' + article.attributes.upvotes + ' ' + $t('devhub.and') + ' ↓' + article.attributes.downvotes"
                         data-balloon-pos="up">
                        <div class="my-auto bg-gray-300 dark:bg-gray-600 w-full rounded h-1 relative"
                             :class="{ 'default' : article.attributes.votes === 0}">
                            <div class="absolute h-1 bg-green-600 rounded-l"
                                 :style="'width:' + [article.attributes.votes !== 0 ? 100 * article.attributes.upvotes / article.attributes.votes : '0'] +'%'">
                            </div>
                            <div class="absolute h-1 bg-red-600 rounded-r right-0"
                                 :style="'width:' + [article.attributes.votes !== 0 ? 100 * article.attributes.downvotes / article.attributes.votes : '0'] +'%'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5"
                        @paginate="getPosts()"/>
        </div>
        <div v-else-if="error" class="article-content__item"
             style="text-align: center; display: grid; grid-gap: 12px;">
            <span style="font-size: 5rem; opacity: .7;">¯\_(ツ)_/¯</span>
            <h1 style="font-family: 'Nunito', sans-serif;"><span
                style="border-right: 2px solid; padding: 0 15px 0 15px;">500</span> Server error</h1>
        </div>
        <div v-else-if="articlesEmpty"
             class="bg-white dark:bg-dpaper dark:border-gray-700 rounded border py-10">
            <div class="w-2/3 mx-auto space-y-4 xs:w-full xs:px-4">
                <div class="font-bold space-x-1 flex justify-center items-center text-center text-2xl pb-2">
                    <span class="iconify dark:text-gray-300" data-icon="mdi:close-box-multiple-outline"
                          data-inline="false"></span>
                    <p class="dark:text-gray-300">{{ $t('devhub.articles404') }}</p>
                </div>
                <p class="font-light text-center dark:text-gray-400">
                    {{ $t('devhub.articles404Text') }}
                </p>
                <a href="/article/new"
                   class="btn h-7 flex w-max mx-auto xs:hidden">
                    {{ $t('devhub.write') }}
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios"
import tippy from "tippy.js";

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
            articles: [],
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
            articlesEmpty: false,
            pagination: {
                'current_page': 1
            },
        }
    },
    async created() {
        await this.getPosts();
        require('../../scripts/tippy')
        const config = {
            allowHTML: true,
            maxWidth: 350,
            interactive: true,
            animation: "shift-away-subtle",
            delay: [200, 50],
            content: `<div class="p-3" style="width: 350px;"><p class="text-center">` + this.$t('devhub.loading') + `</p></div>`,
        };
        tippy(".author-popover", {
            ...config,
            onShow(instance) {
                const id = instance.reference.getAttribute("data-id");
                window.fetch(`/popover/author/${id}`)
                    .then((response) => response.text())
                    .then((blob) => {
                        instance.setContent(blob);
                    })
                    .catch((error) => {
                        instance.setContent(`<div class="p-3">Something went wrong!</div>`);
                    });
            },
            onHidden(instance) {
                instance.setContent(config.content);
                instance._src = null;
                instance._error = null;
            },
        });
        tippy(".progress", {
            ...config,
            onShow(instance) {
                const label = instance.reference.getAttribute("aria-label");
                instance.setContent(label)
            },
            onHidden(instance) {
                instance.setContent(config.content);
                instance._src = null;
                instance._error = null;
            },
        });

        tippy(".read-time", {
            allowHTML: true,
            placement: "left",
            content: this.$t('devhub.readTime'),
        });
    },
    methods: {
        async getPosts() {
            this.loading = true;
            await axios.get(this.url + '?page=' + this.pagination.current_page).then(({data}) => {
                this.loading = false;
                if (data.data.length !== 0) {
                    this.articles = data.data;
                    this.pagination = data.meta;
                    if (this.pagination.last_page > 50) {
                        this.pagination.last_page = 50;
                    }
                    for (let i = 0; i < this.articles.length; i++) {
                        this.id[i] = this.articles[i].id;
                    }
                } else this.articlesEmpty = true;
            })
                .catch(error => {
                    this.loading = false
                    this.error = true
                });
        },
        async findVillainIdx(id) {
            let currindex = null;
            for (let i = 0; i < this.$data.articles.length; i++) {
                if (id === this.$data.articles[i].data.id) {
                    currindex = i;
                    break;
                }
            }
            return currindex;
        },
        async copy(id) {
            const link = window.location.origin + '/article/' + id;
            // this.$clipboard(link);
        }
    },
}
</script>
