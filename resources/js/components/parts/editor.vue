<template>
    <form class="border bg-white border-t-0 dark:bg-transparent dark:border-gray-800 dark:text-gray-300 text-black" @submit.prevent="onSubmit">
        <div class="border-b dark:border-gray-800 bg-white dark:bg-gray-900 py-2 px-8 sticky top-0 z-10">
            <button type="submit"
                    class="ml-auto block border border-cerulean-700 font-normal uppercase text-xs rounded px-4 py-1.5 text-white bg-cerulean-700 dark:bg-cerulean-800 dark:border-cerulean-800 hover:bg-cerulean-800 hover:border-cerulean-800 xs:hidden sm:hidden">
                Paylaşmaq
            </button>
        </div>
        <div class="p-6 px-8">
            <textarea placeholder="Başlıq" v-model="title"
                      class="text-3xl h-10 w-full dark:bg-transparent border-none overflow-y-hidden focus:outline-none transition-none mb-4 resize-none"
                      data-processed="true" autofocus/>
            <div id="editorjs" class="cursor-text"></div>
        </div>
        <div>
            <multiselect v-model="selected" @input="updateHubs" :options="hubs" tag-position="bottom" :custom-label='hubsName'
                         :multiple="true" label="name" :placeholder="$t('form.select_category')"
                         track-by="name" class="transition-none"></multiselect>
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
            selectedIDs: [],
            hubs: [],
            editor: new EditorJS({
                placeholder: 'Menyu açmaq üçün "Tab" düyməsini basın',
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
                },
                i18n: {
                    messages: {
                        /**
                         * Other below: translation of different UI components of the editor.js core
                         */
                        ui: {
                            "blockTunes": {
                                "toggler": {
                                    "Click to tune": "Нажмите, чтобы настроить",
                                    "or drag to move": "или перетащите"
                                },
                            },
                            "inlineToolbar": {
                                "converter": {
                                    "Convert to": "Конвертировать в"
                                }
                            },
                            "toolbar": {
                                "toolbox": {
                                    "Add": "Добавить"
                                }
                            }
                        },

                        /**
                         * Section for translation Tool Names: both block and inline tools $t('form.select_category')"
                         */
                        toolNames: {
                            "Text": this.$t('form.Text'),
                            "Heading": this.$t('form.Heading'),
                            "List": this.$t('form.List'),
                            "Warning": this.$t('form.Warning'),
                            "Checklist": this.$t('form.Checklist'),
                            "Quote": this.$t('form.Quote'),
                            "Code": this.$t('form.Code'),
                            "Delimiter": this.$t('form.Delimiter'),
                            "Raw HTML": this.$t('form.Raw'),
                            "Table": this.$t('form.Table'),
                            "Link": this.$t('form.Link'),
                            "Marker": this.$t('form.Marker'),
                            "Bold": this.$t('form.Bold'),
                            "Italic": this.$t('form.Italic'),
                            "InlineCode": this.$t('form.InlineCode'),
                        },

                        tools: {
                            "warning": { // <-- 'Warning' tool will accept this dictionary section
                                "Title": "Название",
                                "Message": "Сообщение",
                            },

                            /**
                             * Link is the internal Inline Tool
                             */
                            "link": {
                                "Add a link": "Вставьте ссылку"
                            },
                            /**
                             * The "stub" is an internal block tool, used to fit blocks that does not have the corresponded plugin
                             */
                            "stub": {
                                'The block can not be displayed correctly.': 'Блок не может быть отображен'
                            }
                        },

                        /**
                         * Section allows to translate Block Tunes
                         */
                        blockTunes: {
                            /**
                             * Each subsection is the i18n dictionary that will be passed to the corresponded Block Tune plugin
                             * The name of a plugin should be equal the name you specify in the 'tunes' section for that plugin
                             *
                             * Also, there are few internal block tunes: "delete", "moveUp" and "moveDown"
                             */
                            "delete": {
                                "Delete": this.$t('form.Delete')
                            },
                            "moveUp": {
                                "Move up": this.$t('form.Up')
                            },
                            "moveDown": {
                                "Move down": this.$t('form.Down')
                            }
                        },
                    }
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
