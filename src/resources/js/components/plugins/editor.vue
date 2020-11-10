<template>
    <div>
        <div id="editorjs"></div>
        {{ token }}
        <button v-on:click="save()"></button>
    </div>
</template>

<script>
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
