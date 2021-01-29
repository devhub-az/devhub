<template>
    <div>
        <p class="pb-2 font-medium dark:text-gray-300 text-2xl">Ayarlar</p>
        <div class="border-b mb-4 dark:border-gray-700"></div>
        <form @submit.prevent="submit">
            <fieldset class="space-y-4">
                <div class="grid grid-cols-settings gap-2 px-12 xs:mt-4 xs:block xs:px-0">
                    <img :src="previewPhoto"
                         class="w-12 h-12 flex-none image-fit rounded lazyload ml-auto"
                         alt="Profile image">
                    <div class="flex items-center">
                        <!-- File Input -->
                        <div class="rounded-md">
                            <!-- Replace the file input styles with our own via the label -->
                            <input @change="updatePreview($event)"
                                   type="file"
                                   id="file"
                                   accept="image/*,capture=camera"
                                   name="photo"
                                   class="custom">
                            <label
                                @change="updatePreview($event)"
                                for="file"
                                class="btn-outline py-2">
                                Şəkil yükləmək
                            </label>
                        </div>
                        <div class="flex items-center text-sm text-gray-500 mx-2">
                            <!-- Display the file name when available -->
                            <span> {{ fileName || emptyText }}</span>
                            <!-- Removes the selected file -->
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
                <div class="grid grid-cols-settings gap-2 px-12 xs:mt-4 xs:block xs:px-0">
                    <p class="mb-1 dark:text-gray-300 my-2 text-right xs:text-left xs:text-left xs:text-sm">
                        Əsl adınız {{ name_count }}/40:</p>
                    <input type="text"
                           class="input"
                           name="name" id="name" v-model="fields.name"
                           @keyup="nameCount()" :maxlength="namemaxcharacter" placeholder="Əsl adınızı yazın"
                           @keydown.space.prevent/>
                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                </div>
                <div class="grid grid-cols-settings gap-2 px-12 xs:block xs:px-0">
                    <p class="mb-1 dark:text-gray-300 my-2 text-right xs:text-left xs:text-sm">
                        Nikneym {{ username_count }}/40:</p>
                    <div>
                        <div class="relative">
                            <div class="absolute flex border border-transparent left-0 top-0 h-full w-10">
                                <div
                                    class="flex items-center justify-center rounded-tl rounded-bl z-10 bg-gray-100 text-gray-600 text-lg h-full w-full dark:bg-gray-700 dark:text-gray-300">
                                    @
                                </div>
                            </div>
                            <input type="text"
                                   class="input pl-12"
                                   name="name" id="username" v-model="fields.username"
                                   @keyup="nameCount()" :maxlength="namemaxcharacter" placeholder="Əsl adınızı yazın"
                                   @keydown.space.prevent/>
                        </div>
                        <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                        <p class="mt-1 dark:text-gray-400 text-sm font-light">Paylaşmalarda adınız altında
                            göstərilir</p>
                    </div>
                </div>
                <div class="grid grid-cols-settings gap-2 px-12 xs:block xs:px-0">
                    <p class="mb-1 dark:text-gray-300 my-2 text-right xs:text-left xs:text-sm">Özüvüz haqqında {{
                            description_count
                        }}/160:</p>
                    <div class="settings__right-block">
                        <textarea type="text"
                                  class="block input py-2 w-full h-36"
                                  id="description"
                                  role="textbox"
                                  placeholder="İxtisasınızı yazın. Məsələn: Database Administrator" autocomplete="off"
                                  @keyup="descriptionCount()" :maxlength="160"
                                  v-model="fields.description" contenteditable></textarea>
                        <div v-if="errors && errors.description" class="text-danger">{{ errors.description[0] }}</div>
                    </div>
                </div>
                <!--                <div class="grid grid-cols-settings gap-2 px-12 xs:block xs:px-0">-->
                <!--                    <p class="mb-1 dark:text-gray-300 my-2 text-right xs:text-left xs:text-sm">Dil:</p>-->
                <!--                    <div class="settings__right-block">-->
                <!--                        <label>-->
                <!--                            <select name="user_bday_day" class="rounded py-2 px-2 w-full text-base hover:border-cerulean-100 border dark:border-gray-700 dark:text-gray-300 dark:hover:border-cerulean-500 dark:focus:border-cerulean-500 font-light dark:bg-dpaper focus:border-cerulean-100 focus:outline-none transition-none">-->
                <!--                                <option value="az" selected>Azərbaycan (AZ)</option>-->
                <!--                                <option value="ru">Русский (RU)</option>-->
                <!--                            </select>-->
                <!--                        </label>-->
                <!--                        <p class="mt-2 dark:text-gray-300 xs:text-sm">Saytın interfeysini görmək istədiyiniz dili seçin.</p>-->
                <!--                    </div>-->
                <!--                </div>-->
                <div class="border-b my-4 dark:border-gray-700"></div>
                <div class="grid grid-cols-settings gap-2 px-12 xs:block xs:px-0">
                    <p class="mb-1 dark:text-gray-300 my-2 text-right xs:text-left xs:text-sm">Emailiniz: {{
                            email
                        }}</p>
                    <div class="settings__right-block">
                        <input type="text"
                               class="input"
                               name="email" id="email"
                               placeholder="Email ünvanı dəyişdir.." v-model="fields.email">
                        <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                    </div>
                </div>
                <div class="border-b my-4 dark:border-gray-700"></div>
                <div class="grid grid-cols-settings gap-2 px-12 xs:block xs:px-0">
                    <div></div>
                    <button type="submit" class="btn w-max xs:py-2 text-base">Yadda saxla</button>
                </div>
            </fieldset>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['auth'],
    data() {
        return {
            fields: {},
            errors: {},
            originalUrl: this.auth.avatar !== 'default' ? '/upload/avatars/' + this.auth.avatar : '/upload/avatars/default.png',
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
