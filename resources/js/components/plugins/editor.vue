<template>
    <div style="display: grid;
    grid-template-columns: 48% 48%;
    gap: 4%;
    margin: 12px 0;">
        <markdown-toolbar for="textarea_id">
            <md-bold>bold</md-bold>
            <md-header>header</md-header>
            <md-italic>italic</md-italic>
            <md-quote>quote</md-quote>
            <md-code>code</md-code>
            <md-link>link</md-link>
            <md-image>image</md-image>
            <md-unordered-list>unordered-list</md-unordered-list>
            <md-ordered-list>ordered-list</md-ordered-list>
            <md-task-list>task-list</md-task-list>
            <md-mention>mention</md-mention>
            <md-ref>ref</md-ref>
        </markdown-toolbar>
        <textarea :value="content" @input="update" cols="12" style="height: 200px;" id="textarea_id"></textarea>
        <div v-html="compiledMarkdown" class="post-content__body"></div>
    </div>
</template>

<script>
    import markdown from 'markdown-it'
    import debounce from 'lodash/debounce'

    const md = new markdown().use(require('markdown-it-video')).use(require('markdown-it-highlightjs'))
    let sanitizeHtml = require('sanitize-html')

    // import 'markdown-it-vue/dist/markdown-it-vue.css'
    export default {
        data() {
            return {
                content: '# your markdown content',
            }
        },
        computed: {
            compiledMarkdown: function () {
                return md.render(this.content)
            },
        },
        methods: {
            update: debounce(function (e) {
                this.content = e.target.value;
            }, 300)
        }
    }
</script>

