<template>
    <div>
        <trumbowyg v-model="form.body"
                   name="body"
                   :config="configs.advanced"
                   placeholder="Enter your content here"
                   class="form-control"
                   @tbw-blur="listenToBlurEvent"
                   @tbw-init="listenToInitEvent"></trumbowyg>
    </div>
</template>

<script>
    // Import this component
    import Trumbowyg from 'vue-trumbowyg'

    // Import editor css
    import 'trumbowyg/dist/plugins/colors/trumbowyg.colors.js'
    import 'trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css'
    import 'trumbowyg/dist/plugins/insertaudio/trumbowyg.insertaudio.min.js'
    import 'trumbowyg/dist/plugins/preformatted/trumbowyg.preformatted.min.js'
    import 'trumbowyg/dist/plugins/table/trumbowyg.table.min.js'
    import 'trumbowyg/dist/plugins/table/ui/trumbowyg.table.min.css'
    import 'trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js'
    import 'trumbowyg/dist/ui/trumbowyg.css'

    export default {
        data() {
            return {
                form: {
                    content: '<h1>Default text</h1>',
                    body: null,
                },
                configs: {
                    basic: {
                        autogrow: false
                    },
                    advanced: {
                        autogrow: true,
                        removeformatPasted: false,
                        tagsToRemove: ['script', 'link'],
                        resetCss: true,
                        // Adding color plugin button
                        btns: ['foreColor', 'backColor', 'insertaudio', 'table', 'preformatted'],
                        // Limit toolbar buttons
                    },
                },
            }
        },
        components: {
            Trumbowyg
        },
        methods: {
            submit() {
                console.log('Form submit event', this.form);
            },
            setNewValue() {
                console.log('Set new value');
                this.form.content = '<h3 class="bg-success">New content inserted</h3>';
            },
            listenToBlurEvent(event) {
                console.log("listen to blur event")
            },
            listenToInitEvent(event) {
                console.log("listen to init event")
            }
        },
    }
</script>

<style scoped>

</style>
