<template>
    <div class="bg-white dark:bg-dpaper rounded shadow px-4 py-4">
        <p class="dark:text-gray-300 text-lg font-semibold leading-6 text-red-500">Опасная зона</p>
        <p class="pb-4 text-sm">Заметка: Вы не сможете восстановить свой аккаунт</p>
        <form @submit.prevent="submit">
            <fieldset class="mt-4">
                <p class="block font-semibold text-red-500 dark:text-gray-300">
                    Удалить аккаунт
                </p>
                <p class="text-sm text-gray-700 mb-2">
                    Ваш аккаунт будет удален навсегда. Все ваши данные будут немедленно удалены, и вы не сможете их вернуть.
                </p>
                <div class="mt-1">
                    <button class="btn bg-red-600 border-red-600 hover:bg-red-700 hover:border-red-700">Удалить</button>
                </div>
            </fieldset>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['auth', 'avatar_url'],
    data() {
        return {
            fields: {},
            errors: {},
            originalUrl: this.avatar_url,
            previewPhoto: '',
            fileName: null,
            emptyText: this.originalUrl ? 'Yeni bir şəkil seçilmədi' : 'Heç bir şəkil seçilməyib',
            avatar: '',
            email: "",
            success: false,
            loaded: true,
            namemaxcharacter: 40,
            name_count: 0,
            username_count: 0,
            description_count: 0,
            isChanged: false,
        }
    },
    created: function () {
        this.previewPhoto = this.originalUrl
        this.fields.name = this.auth.name
        this.fields.username = this.auth.username
        this.email = this.auth.email
        this.fields.description = this.auth.description
        this.description_count = this.auth.description.length
        this.name_count = this.auth.name.length
        this.username_count = this.auth.username.length
    },
    methods: {
        submit() {
            if (this.loaded) {
                this.loaded = false;
                this.success = false;
                this.errors = {}
                axios.post('/settings/profile', this.fields).then(response => {
                    this.loaded = true;
                    this.success = true;
                    if ("email" in this.fields) {
                        this.email = this.fields.email
                        delete this.fields.email
                    }
                }).catch(error => {
                    this.loaded = true;
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};

                    }
                });
            }
        },
        nameCount: function () {
            if (this.fields.name.length > this.namemaxcharacter) {
                this.name_count = this.namemaxcharacter;
            } else {
                this.name_count = this.fields.name.length;
            }
        },
        surnameCount: function () {
            if (this.fields.surname.length > this.namemaxcharacter) {
                this.surname_count = this.namemaxcharacter;
            } else {
                this.surname_count = this.fields.surname.length;
            }
        },
        descriptionCount: function () {
            if (this.fields.description.length >= 160) {
                this.description_count = 160;
            } else {
                this.description_count = this.fields.description.length;
            }
        },
        updatePreview(event) {
            let reader,
                files = event.target.files;
            reader = new FileReader();
            reader.onload = (e) => {
                this.previewPhoto = e.target.result;
                this.fileName = files[0].name;
            };
            reader.readAsDataURL(files[0]);
        },
        clearPreview(event) {
            event.target.value = null;
            this.previewPhoto = this.originalUrl;
            this.fileName = false;
        }
    },
}
</script>

<style scoped>
input[type="file"].custom {
    border: 0;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    overflow: hidden;
    padding: 0;
    position: absolute !important;
    white-space: nowrap;
    width: 1px;
}
</style>
