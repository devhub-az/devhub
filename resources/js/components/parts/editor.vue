<template>
    <form @submit.prevent="onSubmit" class="space-y-4">
        <div>
            <div class="flex space-x-1">
                <p class="text-red-500">*</p>
                <p class="font-medium dark:text-gray-300">Basliq</p>
            </div>
            <div class="border bg-white dark:bg-dpaper dark:border-gray-700 dark:text-gray-300 text-black">
                <input placeholder="Başlıq yazin" v-model="title"
                   class="px-2 py-1 relative w-full block dark:text-gray-400 focus:outline-none transition-none"
                   data-processed="true" contenteditable/>
            </div>
        </div>
        <div>
            <div class="flex space-x-1">
                <p class="text-red-500">*</p>
                <p class="font-medium dark:text-gray-300">Mətn</p>
            </div>
            <div class="border bg-white dark:bg-dpaper dark:border-gray-700 dark:text-gray-300 text-black">
                <div id="editorjs" class="cursor-text py-1 px-2"></div>
            </div>
        </div>
        <div class="space-y-1">
            <div class="flex space-x-1">
                <p class="text-red-500">*</p>
                <p class="font-medium dark:text-gray-300">Hablar</p>
            </div>
            <multiselect v-model="selected" @input="updateHubs" :options="hubs" tag-position="bottom" :custom-label='hubsName'
                         :multiple="true" label="name" :placeholder="this.trans('devhub.selectHub')"
                         track-by="name" class="transition-none">
                <template slot="option" slot-scope="props" class="transition-none">
                    <div class="flex items-center space-x-1 transition-none">
                        <img class="w-8 h-8 rounded" :src="'/' + props.option.logo" :alt="props.option.name">
                        <span class="transition-none">{{ props.option.name }}</span>
                    </div>
                </template>
            </multiselect>
            <p class="text-xs dark:text-gray-400">Выберите от 1 до 5 хабов по теме публикации</p>
        </div>

        <button type="submit" class="btn h-7 ml-auto block">
            Paylaşmaq
        </button>
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
const LinkTool = require('@editorjs/link');
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
            selectedIDs: [],
            hubs: [],
            editor: new EditorJS({
                placeholder: 'Menyu açmaq üçün "Tab" düyməsini basın',
                logLevel: 'ERROR',
                tools: {
                    linkTool: {
                        class: LinkTool,
                    },
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
                },
            })
        }
    },
    async mounted() {
        await this.getHubs();
    },
    methods: {
        updateHubs(hub) {
            let hubs = [];

            hub.forEach((hub) => {
                hubs.push(hub.id);
            });

            this.selectedIDs = hubs;
        },
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
                hubs: this.selectedIDs
            }).then(response => {
                window.location = '/article/' + response.data;
            })
        }
    }
}
</script>

<style>
.multiselect__select {
    display: none !important;
}

[type='text']:focus {
    box-shadow: unset;
}
</style>
