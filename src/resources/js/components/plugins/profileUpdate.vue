<template>
    <div style="margin: 22px 12px;">
        <file-pond
                name="logo"
                label-idle="Faylları bura atın və ya <span class='filepond--label-action'>Basın</span>"
                allow-multiple="false"
                allow-revert="false"
                accepted-file-types="image/jpeg, image/png, image/gif"
                v-bind:files="files"
                v-on:init="handleFilePondInit"
                :imagePreviewMaxHeight="1"
                max-files="1"
                label-file-processing-error="Yükləmə zamanı səhv"
                label-file-processing="Yükləmə"
                :allowFilePoster="true"
                labe-file-size-not-available="Ölçü mövcud deyil"
                label-file-processing-complete="Yükləmə tamamlandı"
        />
    </div>
</template>

<script>
    // Import Vue FilePond
    import vueFilePond, { setOptions } from 'vue-filepond';

    // Import FilePond styles
    import 'filepond/dist/filepond.min.css'

    // Import FilePond plugins
    // Please note that you need to install these plugins separately

    // Import image preview plugin styles
    import 'filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css';
    import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'

    // Import image preview and file type validation plugins
    import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type'
    import FilePondPluginImagePreview from 'filepond-plugin-image-preview'
    import FilePondPluginFilePoster from 'filepond-plugin-file-poster';

    setOptions({
        files: [
            {
                // the server file reference
                source: '12345',

                // set type to local to indicate an already uploaded file
                options: {
                    type: 'local',

                    // pass poster property
                    metadata: {
                        poster: '/images/devhublogo.png'
                    }
                }
            }
        ],
        server: {
            url: '/api/users/1/profile_update',
            process: {
                headers: {
                    "X-CSRF-Token": document.querySelector('input[name=_token]').value,
                },
            },
        },
    });

    // Create component
    const FilePond = vueFilePond(
        FilePondPluginFileValidateType,
        FilePondPluginImagePreview,
        FilePondPluginFilePoster
    );

    export default {
        props: ['avatar'],
        data: function() {
            return {
                myFiles: [],
                files: [
                    {
                        // the server file reference
                        source: '12345',

                        // set type to local to indicate an already uploaded file
                        options: {
                            type: 'local',

                            // stub file information
                            file: {
                                name: 'png.png',
                                size: 3001025,
                                type: 'image/png'
                            },

                            // pass poster property
                            metadata: {
                                poster: '/images/devhublogo.png'
                            }
                        }
                    }
                ],
            }
        },
        methods: {
            handleFilePondInit: function() {
            },
        },
        components: {
            FilePond
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
