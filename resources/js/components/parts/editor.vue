<template>
    <form class="border rounded bg-white dark:bg-transparent dark:text-gray-300 text-black" @submit.prevent="onSubmit">
        <div class="border-b bg-white py-2 px-8 sticky top-0 z-10">
            <button type="submit"
                    class="ml-auto block border border-cerulean-700 font-normal uppercase text-xs rounded px-4 py-1.5 text-white bg-cerulean-700 dark:bg-cerulean-800 dark:border-cerulean-800 hover:bg-cerulean-800 hover:border-cerulean-800 xs:hidden sm:hidden">
                Paylaşmaq
            </button>
        </div>
        <div class="p-6 px-8">
            <textarea placeholder="Başlıq" v-model="title"
                      class="text-3xl h-10 w-full border-none overflow-y-hidden focus:outline-none transition-none mb-4 resize-none"
                      data-processed="true"/>
            <div id="editorjs" class="cursor-text"></div>
        </div>
        <div>
            <multiselect v-model="selectedObjects" :options="hubs" tag-position="bottom" :custom-label='hubsName' :multiple="true" label="name" :placeholder="$t('form.select_category')"
                         track-by="id" return="id" class="transition-none" :internal-search="false"></multiselect>
            {{selected}}
        </div>
    </form>
</template>

<script>
import EditorJS from '@editorjs/editorjs';
import axios from 'axios'
import Multiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css'

const Header = require('@editorjs/header')
const InlineCode = require('@editorjs/inline-code');
const Embed = require('@editorjs/embed');
const CodeTool = require('@editorjs/code');
const SimpleImage = require('@editorjs/simple-image');
import List from '@editorjs/list';
// const LinkTool = require('@editorjs/link');
export default {
    components: {
        Multiselect,
    },
    data: function () {
        return {
            title: null,
            selected: [],
            hubs: [],
            editor: new EditorJS({
                placeholder: '',
                logLevel: 'ERROR',
                tools: {
                    header: {
                        class: Header,
                        config: {
                            placeholder: 'Enter a header',
                            levels: [1, 2, 3],
                            defaultLevel: 3
                        }
                    },
                    embed: {
                        class: Embed,
                        inlineToolbar: true,
                        caption: false
                    },
                    inlineCode: {
                        class: InlineCode,
                        shortcut: 'CMD+SHIFT+M',
                    },
                    code: CodeTool,
                    image: {
                        class: SimpleImage,
                        captionPlaceholder: false,
                    },
                    list: {
                        class: List,
                        inlineToolbar: true,
                    },
                }
            })
        }
    },
    async mounted() {
        await this.getHubs();
    },
    watch: {
        selectedObjects(newValues) {
            this.selected = newValues.map(obj => obj.id);
        },
    },
    methods: {
        hubsName(option) {
            return `${option.name}`;
        },
        async getHubs() {
            let dataFetchUrl = `/api/hubs/filter/all`
            await axios.get(dataFetchUrl).then(({data}) => {
                if (data.length !== 0) {
                    this.hubs = data
                } else this.hubsEmpty = true
            })
                .catch(error => {
                    this.error = true
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
        async onSubmit() {
            this.loading = true
            axios.post('/api/articles', {
                title: this.title,
                body: JSON.stringify(await this.editor.save()),
                hubs: this.selected
            }).then(response => {
                window.location = '/article/' + response.data;
            })
        }
    }
}
</script>
