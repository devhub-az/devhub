<template>
    <form class="col-sm-9 offset-sm-1" @submit.prevent="onSubmit">
        <input type="text" v-model="title">
        <div id="editorjs" class="border"></div>
        <button type="submit" class="btn btn-info">PRESS</button>
    </form>
</template>

<script>
import EditorJS from '@editorjs/editorjs';
import axios from 'axios'
const Header = require('@editorjs/header')
const InlineCode = require('@editorjs/inline-code');
const CodeTool = require('@editorjs/code');
const SimpleImage = require('@editorjs/simple-image');
import List from '@editorjs/list';
// const LinkTool = require('@editorjs/link');
export default {
    data() {
        return {
            title: null,
            editor: new EditorJS({
                placeholder: 'Let`s write an awesome story!',
                tools: {
                    header: {
                        class: Header,
                        config: {
                            placeholder: 'Enter a header',
                            levels: [1, 2, 3],
                            defaultLevel: 3
                        }
                    },
                    inlineCode: {
                        class: InlineCode,
                        shortcut: 'CMD+SHIFT+M',
                    },
                    code: CodeTool,
                    image: SimpleImage,
                    list: {
                        class: List,
                        inlineToolbar: true,
                    },
                }
            })
        }
    },
    methods:{
        async onSubmit () {
            axios.post('/api/articles',{
                title: this.title,
                body: JSON.stringify(await this.editor.save()),
            }).then((outputData) =>{
                console.log('Article data: ', outputData)
            })
        }
    }
}
</script>
