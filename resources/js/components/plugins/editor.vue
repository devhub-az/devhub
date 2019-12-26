<template>
    <div>
        <trumbowyg v-model="content" :config="config" class="form-control" name="content"></trumbowyg>
    </div>
</template>

<script>
    // Import this component
    import Trumbowyg from 'vue-trumbowyg';

    // Import editor css
    import 'trumbowyg/dist/ui/trumbowyg.css';

    import 'trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js';

    export default {
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
        components: {
            Trumbowyg
        }
    }
</script>
