<template>
    <form autocomplete="off" @submit.prevent="register" enctype="multipart/form-data" method="post" class="xs:max-w-xs w-full text-left">
        <div class="pt-4 pb-2">
            <a href="/login/github"
               class="btn-outline border-gray-300 dark:border-gray-300 rounded-lg w-full items-center dark:text-black">
                <div class="block mx-auto flex">
                    <span class="iconify mr-2 text-base text-gray-700" data-icon="simple-icons:github" data-inline="false"></span>
                    <p class="text-gray-700">GitHub ilə daxil olmaq</p>
                </div>
            </a>
            <div class="my-4 items-center flex">
                <div class="mr-3 flex-grow border-t border-gray-300" aria-hidden="true"></div>
                <div class="text-sm">və ya</div>
                <div class="ml-3 flex-grow border-t border-gray-300" aria-hidden="true"></div>
            </div>
            <div class="relative mb-2">
                <input aria-invalid="true" autocomplete="off" id="username" name="username"
                       placeholder="İstifadəçi adı"
                       type="text" inputmode="text"
                       class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md rounded-lg hover:border-cerulean-500 focus:outline-none focus:border-cerulean-500 focus:border-transparent transition-colors mb-2"
                       :class="errors && errors.username ? 'border-red-500 focus:border-red-500' : 'border-gray-300 hover:border-blue-light focus:border-blue-light'"
                       autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="username">
                <span class="iconify absolute translate-y-1/2 text-gray-400 top-0 p-2 pr-4 cursor-pointer right-0"
                      data-icon="mdi:information-outline" data-inline="false"
                      title="İstifadəçi adı 3-15 simvoldan ibaret olmalidir"></span>

                <p class="text-red-700 text-sm">{{ errors && errors.username ? errors.username[0] : null }}</p>
            </div>
            <div class="relative mb-2">
                <input aria-invalid="true" autocomplete="off" id="email" name="email"
                       placeholder="Elektron poçt"
                       type="text" inputmode="text"
                       class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md rounded-lg hover:border-cerulean-500 focus:outline-none focus:border-cerulean-500 focus:border-transparent transition-colors mb-2 "
                       :class="error || (errors && errors.email) ? 'border-red-500 focus:border-red-500' : (success ? 'border-green-500 hover:border-green-500 focus:border-green-500' : 'border-gray-300 hover:border-blue-light focus:border-blue-light')"
                       aria-label="Elektron poçt"
                       autocorrect="off" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="email">
                <div v-if="!checking"
                     class="btn absolute right-2 top-2 h-7 shadow-sm text-center border-none"
                     @click="email ? checkEmail(email) : null">
                    Yoxlamaq
                </div>
                <div v-else
                     class="btn absolute right-2 top-2 h-7">
                    Yoxlanır
                </div>
                <p class="text-red-700 text-sm">{{ errors && errors.email ? errors.email[0] : null }}</p>
            </div>
            <div class="relative mb-2">
                <input type="file" name="image" class="form-control" @change="imagePreview($event)">
            </div>
            <div class="relative mb-2">
                <input aria-invalid="true" autocomplete="current-password" id="password" name="password"
                       placeholder="Şifrə"
                       :type="type" inputmode="text"
                       class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md rounded-lg hover:border-cerulean-500 focus:outline-none focus:border-cerulean-500 focus:border-transparent transition-colors mb-2"
                       :class="errors && errors.password ? 'border-red-500 focus:border-red-500' : 'border-gray-300 hover:border-blue-light focus:border-blue-light'"
                       aria-label="Şifrə" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="password">
                <p class="text-red-700 text-sm">{{ errors && errors.password ? errors.password[0] : null }}</p>
                <i class="mdi absolute translate-y-1/2 text-gray-400 top-0 p-2 pr-4 cursor-pointer right-0"
                   :class="type === 'password' ? 'mdi-eye-off' : 'mdi-eye'"
                   @click="typeChange()"></i>
            </div>
            <div class="relative mb-2">
                <input aria-invalid="true" autocomplete="current-password" id="password_confirmation"
                       name="password_confirmation"
                       placeholder="Şifrə təsdiqlə"
                       :type="typeConfirm" inputmode="text"
                       class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md rounded-lg hover:border-cerulean-500 focus:outline-none focus:border-cerulean-500 focus:border-transparent transition-colors mb-2"
                       aria-label="Şifrəni təsdiqlə" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="password_confirmation">
                <i class="mdi absolute translate-y-1/2 text-gray-400 top-0 p-2 pr-4 cursor-pointer right-0"
                   :class="typeConfirm === 'password' ? 'mdi-eye-off' : 'mdi-eye'"
                   @click="typeConfirmChange()"></i>
            </div>
            <div class="mb-2">
                <input aria-invalid="true" autocomplete="off" id="name" name="name"
                       placeholder="Ad Soyad"
                       type="text" inputmode="text"
                       class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md rounded-lg hover:border-cerulean-500 focus:outline-none focus:border-cerulean-500 focus:border-transparent transition-colors mb-2"
                       :class="errors && errors.name ? 'border-red-500 focus:border-red-500' : 'border-gray-300 hover:border-blue-light focus:border-blue-light'"
                       aria-label="Nik" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="name">
                <p class="text-red-700 text-sm">{{ errors && errors.name ? errors.name[0] : null }}</p>
            </div>
        </div>
        <div class="w-full">
            <button v-if="loading"
                    class="btn w-full">
                <span class="animate-spin w-2 h-2 block mx-auto">
                    <span class="iconify" data-icon="mdi-loading"></span>
                </span>
            </button>
            <button v-else type="submit" class="btn w-full shadow-sm rounded-md text-center border-none">
                <span class="block mx-auto">Qeydiyyatdan keçmək</span>
            </button>
        </div>
        <div class="mt-4 bg-white rounded py-4 text-sm text-center border">
            Hesabınız var? <a href="/login" class="text-cerulean-500">Daxil olmaq</a>
        </div>
    </form>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            username: null,
            name: null,
            email: null,
            image: '',
            config: {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            },
            password: null,
            password_confirmation: null,
            type: 'password',
            typeConfirm: 'password',
            error: false,
            checking: false,
            loading: false,
            success: false,
            errors: null
        }
    },
    methods: {
        imagePreview(e) {
            this.image = e.target.files[0];
        },
        checkEmail(email) {
            this.checking = true
            axios.post('api/auth/checkEmail', {
                email: email
            }).then(response => {
                this.checking = false
                this.error = false
                this.success = true
            }).catch(error => {
                this.checking = false
                this.error = true
            })
        },
        typeChange() {
            switch (this.type) {
                case 'password':
                    this.type = 'text'
                    break
                case 'text':
                    this.type = 'password'
                    break
            }
        },
        typeConfirmChange() {
            switch (this.typeConfirm) {
                case 'password':
                    this.typeConfirm = 'text'
                    break
                case 'text':
                    this.typeConfirm = 'password'
                    break
            }
        },
        register() {
            this.loading = true
            const data = new FormData();
            data.append('username', this.username);
            data.append('name', this.name);
            data.append('email', this.email);
            data.append('image', this.image);
            data.append('password', this.password);
            data.append('password_confirmation', this.password_confirmation);

            axios.post('/register', data).then(response => {
                // this.loading = false
                // if (response.data.success === false) {
                //     this.error_text = response.data.error
                //     this.error = true
                // } else if (response.data.success === true) {
                //     window.location = '/';
                // }
            }).catch(error => {
                this.loading = false
                this.errors = error.response.data.errors
            })
        },
    }
}
</script>
