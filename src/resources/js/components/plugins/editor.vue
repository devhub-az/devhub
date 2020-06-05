<template>
    <div>
        <div id="editorjs"></div>
        {{ token }}
        <button v-on:click="save()">asd</button>
    </div>
</template>

<script>
    window.EditorJS = require('@editorjs/editorjs')
    const Embed = require('@editorjs/embed');
    import Header from '@editorjs/header';
    import ImageTool from '@editorjs/image';
    const Delimiter = require('@editorjs/delimiter')
    const CodeTool = require('@editorjs/code');

    export default {
        props: ['token'],
        data () {
            return {
                content: null,
                config: {
                    advanced: {
                        autogrow: true,
                        removeformatPasted: true,
                    }
                }
            }
        },
        async created() {
            console.log($("meta[name='csrf-token']").attr("content"))
            window.editor = new window.EditorJS({
                tools: {
                    embed: Embed,
                    header: Header,
                    delimiter: Delimiter,
                    code: {
                        class: CodeTool,
                        config: {
                            placeholder: 'Введи код'
                        }
                    },
                    image: {
                        class: ImageTool,
                        config: {
                            additionalRequestHeaders : {
                                'x-auth-token': $("meta[name='csrf-token']").attr("content"),
                            },
                            // additionalRequestHeaders: {
                            //     'Authorization': 'Bearer ' + this.$store.getters.accessToken_getters
                            // },
                            captionPlaceholder: 'Коммент к фото (не обязательно)',
                            field: 'murr_editor_image',
                            endpoints: {
                                byFile: '/api/post/image/cache',
                            }
                        }
                    },
                    paragraph: {
                        config: {
                            placeholder: 'мурр'
                        }
                    },
                },
            });
        },
        methods: {
            save(){
                window.editor.save().then((outputData)=> {
                    console.log('Article data: ', outputData)
                }).catch((error) => {
                    console.log('Saving failed: ', error)
                });
            }
        },
        components: {
        }
    }
</script>
