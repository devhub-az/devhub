<template>
    <div class="bg-white dark:bg-dpaper rounded shadow px-4 py-4">
        <p class="pb-2 dark:text-gray-300 text-lg font-medium leading-6 text-gray-900">Профиль</p>
        <form @submit.prevent="submit">
            <fieldset class="space-y-4 mt-4">
                <div class="flex space-x-4">
                    <div class="">
                        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Имя пользователя
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <span
                                class="inline-flex items-center px-3 rounded-l-md border dark:border-gray-700 border-r-0 bg-gray-100 text-gray-600 text-sm dark:bg-gray-700 dark:text-gray-300">
                                devhub.az/authors/@
                            </span>
                            <input type="text" name="username" id="username"
                                   class="input rounded-none rounded-r-md"
                                   placeholder="username" v-model="fields.username">
                        </div>
                        <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                    </div>
                    <div>
                        <label for="avatar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Фото профиля
                        </label>
                        <div class="flex space-x-4 mt-1">
                            <img :src="previewPhoto"
                                 class="w-10 h-10 rounded object-cover lazyload"
                                 alt="Profile image">
                            <div class="flex items-center">
                                <div class="rounded-md">
                                    <input @change="updatePreview($event)"
                                           type="file"
                                           id="avatar"
                                           accept="image/*,capture=camera"
                                           name="photo"
                                           class="custom">
                                    <label
                                        @change="updatePreview($event)"
                                        for="avatar"
                                        class="btn-outline py-2 h-7">
                                        Şəkil yükləmək
                                    </label>
                                </div>
                                <div class="flex items-center text-sm text-gray-500 mx-2">
                                    <button v-if="fileName"
                                            @click="clearPreview($event)"
                                            type="button"
                                            aria-label="Remove image"
                                            class="mx-1 mt-1">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="x-circle w-4 h-4"
                                             aria-hidden="true" focusable="false">
                                            <path fill-rule="evenodd"
                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Настоящее имя
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="text" name="name" id="name"
                               class="input"
                               placeholder="" v-model="fields.name">
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        Вас будут узнавать по этому полю.
                    </p>
                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                </div>
                <div class="">
                    <label for="male" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Пол
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="text" name="name" id="male"
                               class="input"
                               placeholder="" v-model="fields.male">
                    </div>
                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        О себе
                    </label>
                    <div class="mt-1">
                        <textarea id="description" name="description" rows="3" class="textarea"
                                  placeholder="Веб программист, дизайнер..."
                                  v-model="fields.description"></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        Напишите коротко о себе.
                    </p>
                </div>
                <button type="submit" class="btn w-max xs:py-2 h-7 ml-auto block">
                    Yadda saxla
                </button>
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
