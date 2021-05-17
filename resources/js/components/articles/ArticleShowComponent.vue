<template>
    <div class="mb-3">
        <article-loading v-if="loading"/>
        <article v-if="!loading" id="article-content" class="w-full rounded border dark:border-gray-700">
            <div
                class="sticky top-0 flex justify-between rounded-t items-center border-b bg-afooter dark:bg-gray-800 dark:border-gray-700 px-3.5 py-1 z-10">
                <div class="inline-flex">
                    <a :href="'/@' + article.relationships.author.data.attributes.username"
                       class="inline-flex author-popover"
                       :data-id="article.relationships.author.data.id">
                        <img class="w-6 h-6 flex-none image-fit rounded lazyload"
                             :src="article.relationships.author.data.attributes.avatar" alt="user avatar">
                        <p class="text-sm pl-2 m-auto dark:text-gray-300">
                            {{ '@' + article.relationships.author.data.attributes.username }}</p>
                    </a>
                    <p class="text-xs my-auto mr-auto pl-2 dark:text-gray-300">
                        {{ article.attributes.created_at |  moment('DD MMMM, H:mm') }}
                    </p>
                </div>
                <div class="article-votes-sticky">
                    <vote :item="article"/>
                    <div class="article-edit_author" v-if="auth_check">
                        <i class="mdi mdi-chevron-down"></i>
                    </div>
                </div>
            </div>
            <div class="px-3.5 bg-white dark:bg-dpaper">
                <div class="py-2">
                    <p class="text-2xl xs:text-xl font-medium dark:text-gray-300">{{ article.attributes.title }}</p>
                </div>
                <hubs-tags v-if="typeof(article.relationships.hubs) !== `undefined` "
                           :data="article.relationships.hubs.data"></hubs-tags>
                <div class="prose py-2 break-words">
                    <div
                        v-for="block in edjsParser.parse(JSON.parse(article.attributes.body))" v-html="block"></div>
                </div>
            </div>
            <div
                class="grid lg:grid-cols-main rounded-b border-t text-sm bg-afooter dark:bg-gray-800 dark:border-gray-700 px-3.5 py-2">
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
                    <!--                    <favorite :article="article" :auth_check="auth_check"/>-->
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
        </article>
    </div>
</template>

<script>
import axios from "axios";
import hljs from 'highlight.js/lib/core';
import tippy from "tippy.js";

if (localStorage.theme === 'dark') {
    import('highlight.js/styles/atom-one-dark.css');
} else {
    import('highlight.js/styles/github.css');
}


// Syntax highlighting
hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'));
hljs.registerLanguage('css', require('highlight.js/lib/languages/css'));
hljs.registerLanguage('html', require('highlight.js/lib/languages/xml'));
hljs.registerLanguage('javascript', require('highlight.js/lib/languages/javascript'));
hljs.registerLanguage('json', require('highlight.js/lib/languages/json'));
hljs.registerLanguage('markdown', require('highlight.js/lib/languages/markdown'));
hljs.registerLanguage('php', require('highlight.js/lib/languages/php'));
hljs.registerLanguage('scss', require('highlight.js/lib/languages/scss'));
hljs.registerLanguage('yaml', require('highlight.js/lib/languages/yaml'));
hljs.registerLanguage('csharp', require('highlight.js/lib/languages/csharp'));
hljs.registerLanguage('c', require('highlight.js/lib/languages/c'));
hljs.registerLanguage('c-like', require('highlight.js/lib/languages/c-like'));
hljs.registerLanguage('go', require('highlight.js/lib/languages/go'));
hljs.registerLanguage('java', require('highlight.js/lib/languages/java'));
hljs.registerLanguage('swift', require('highlight.js/lib/languages/swift'));

export const sanitizeHtml = function (markup) {
    markup = markup.replace(/&/g, "&amp;");
    markup = markup.replace(/</g, "&lt;");
    markup = markup.replace(/>/g, "&gt;");
    return markup;
};

const edjsHTML = require('editorjs-html');
const edjsParser = edjsHTML({code: codeParser, image: imageParser, embed: emdebParser});

function codeParser(block) {
    const markup = sanitizeHtml(block.data.code);
    return `<pre><code id="output">${markup}</code></pre>`;
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
            article: {},
        }
    },
    async created() {
        await this.getPost().then(() => {
            const config = {
                allowHTML: true,
                maxWidth: 350,
                interactive: true,
                animation: "shift-away-subtle",
                delay: [200, 50],
                content: `<div class="p-3" style="width: 350px;"><p class="text-center">Загрузка</p></div>`,
            };
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
        });
        if (document.getElementById("output")) {
            await hljs.highlightBlock(document.getElementById("output"))
        }
    },
    methods: {
        async getPost() {
            this.loading = true;
            await axios.get('/api/articles/' + this.slug).then(({data}) => {
                this.loading = false;
                if (data.length !== 0) {
                    this.article = data;
                }

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
