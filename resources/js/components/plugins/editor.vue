<template>
    <div>
        <editor
                :value="editorText"
                :options="editorOptions"
                height="500px"
                name="body"
                v-model="data"
        />
        <textarea v-model="data" name="body" style="display:none">
        </textarea>
    </div>
</template>
<script>
    import 'tui-editor/dist/tui-editor.css';
    import 'codemirror/lib/codemirror.css';
    import "tui-editor/dist/tui-editor-extTable.js";
    import "tui-editor/dist/tui-editor-extColorSyntax.js";
    import "tui-editor/dist/tui-editor-extScrollSync.js";
    import "tui-color-picker/dist/tui-color-picker.css";

    import {Editor} from '@toast-ui/vue-editor'

    export default {
        name: 'Editor',
        components: {
            'editor': Editor
        },
        data() {
            return {
                editorText: 'This is initialValue.',
                data: '',
                editorOptions: {
                    minHeight: "500px",
                    language: 'en_US',
                    useCommandShortcut: false,
                    useDefaultHTMLSanitizer: true,
                    usageStatistics: true,
                    hideModeSwitch: false,
                    exts: [
                        "table", "colorSyntax", "scrollSync"
                    ]
                },
            };
        },
    }
</script>

