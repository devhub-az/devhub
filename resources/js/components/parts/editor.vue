<template>
    <form @submit.prevent="onSubmit" class="space-y-4">
        <div>
            <div class="flex space-x-1">
                <p class="text-red-500">*</p>
                <p class="font-medium dark:text-gray-300">Basliq</p>
            </div>
            <input placeholder="Başlıq yazin" v-model="title"
                   class="input"
                   data-processed="true" contenteditable/>
            <p class="text-red-700 text-sm">{{ errors && errors.title ? errors.title[0] : null }}</p>
        </div>
        <div>
            <div class="flex space-x-1">
                <p class="text-red-500">*</p>
                <p class="font-medium dark:text-gray-300">Mətn</p>
            </div>
            <div id="editorjs" class="textarea prose"></div>
            <p class="text-red-700 text-sm">{{ errors && errors.body ? errors.body[0] : null }}</p>
        </div>
        <div class="space-y-1">
            <div class="flex space-x-1">
                <p class="text-red-500">*</p>
                <p class="font-medium dark:text-gray-300">Hablar</p>
            </div>
            <v-selectize :options="hubs" class="textarea" @search="text = $event" v-model="selected" placeholder="Выберите от 1 до 5 хабов по теме публикации" keyBy="id"
                         label="name"
                         :keys="['name', 'id']" multiple>
                <template slot="item" slot-scope="{item}">{{item.name}}</template>
                <template slot="option" slot-scope="{option}">
                    <label class="dark:text-gray-300">{{ option.name }}</label>
                </template>
            </v-selectize>
<!--            <v-selectize :options="hubs" v-model="selected" key-by="id" label="name" :keys="['name', 'id']" multiple/>-->
            <p class="text-red-700 text-sm">{{ errors && errors.hubs ? errors.hubs[0] : null }}</p>
        </div>

        <button type="submit" class="btn h-7 ml-auto block">
            Paylaşmaq
        </button>
    </form>
</template>

<script>
import EditorJS from '@editorjs/editorjs';
import axios from 'axios'
import './../plugins/assets/selectize.css'
import VSelectize from '@isneezy/vue-selectize'

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
        VSelectize,
    },
    data: function () {
        return {
            title: null,
            selected: [],
            selectedIDs: [],
            hubs: [],
            errors: null,
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
            this.selected.forEach(element => {
                this.selectedIDs.push(element.id)
            })
            axios.post('/api/articles', {
                title: this.title,
                body: JSON.stringify(await this.editor.save()),
                hubs: this.selectedIDs
            }).then(response => {
                window.location = '/article/' + response.data;
            }).catch(error => {
                this.loading = false
                this.errors = error.response.data.errors
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

.ce-block__content {
    margin: 0 0.5rem;
}

.ce-toolbar__actions {
    right: -15px;
    top: 10px;
}

.ce-toolbar__plus {
    left: -60px;
}
</style>
