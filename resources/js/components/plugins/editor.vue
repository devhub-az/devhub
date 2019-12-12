<template>
    <div>
<!--        -->
    </div>
</template>

<script>
    import Vuetify from 'vuetify'
    // import plugin
    import { TiptapVuetifyPlugin } from 'tiptap-vuetify'
    // don't forget to import CSS styles
    import 'tiptap-vuetify/dist/main.css'
    // Vuetify's CSS styles
    import 'vuetify/dist/vuetify.min.css'


    // Vuetify Object (as described in the Vuetify 2 documentation)
    const vuetify = new Vuetify()

    // use Vuetify's plugin
    Vue.use(Vuetify)
    // use this package's plugin
    Vue.use(TiptapVuetifyPlugin, {
        // the next line is important! You need to provide the Vuetify Object to this place.
        vuetify, // same as "vuetify: vuetify"
        // optional, default to 'md' (default vuetify icons before v2.0.0)
        iconsGroup: 'md'
    })

    // import the component and the necessary extensions
    import { TiptapVuetify, Heading, Bold, Italic, Strike, Underline, Code, Paragraph, BulletList, OrderedList, ListItem, Link, Blockquote, HardBreak, HorizontalRule, History } from 'tiptap-vuetify'

    export default {
        // specify TiptapVuetify component in "components"
        components: { TiptapVuetify },
        data: () => ({
            // declare extensions you want to use
            extensions: [
                History,
                Blockquote,
                Link,
                Underline,
                Strike,
                Italic,
                ListItem,
                BulletList,
                OrderedList,
                [Heading, {
                    options: {
                        levels: [1, 2, 3]
                    }
                }],
                Bold,
                Code,
                HorizontalRule,
                Paragraph,
                HardBreak
            ],
            // starting editor's content
            content: `
      <h1>Yay Headlines!</h1>
      <p>All these <strong>cool tags</strong> are working now.</p>
    `
        })
    }
</script>
// import Trumbowyg from 'vue-trumbowyg'

