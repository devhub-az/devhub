<template>
    <form autocomplete="off" @submit.prevent="register" enctype="multipart/form-data" method="post" class="xs:max-w-xs w-96 text-left">
        <div class="pt-4 pb-2">
            <a href="/login/github"
               class="btn-outline border-gray-300 dark:border-gray-300 rounded-lg w-full items-center dark:text-black">
                <div class="mx-auto flex">
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
                       placeholder="richard" title="İstifadəçi adı"
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
                       placeholder="richard.hendricks@piedpiper.com"
                       type="text" inputmode="text" title="Elektron poçt"
                       class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md rounded-lg hover:border-cerulean-500 focus:outline-none focus:border-cerulean-500 focus:border-transparent transition-colors mb-2 "
                       :class="error || (errors && errors.email) ? 'border-red-500 focus:border-red-500' : (success ? 'border-green-500 hover:border-green-500 focus:border-green-500' : 'border-gray-300 hover:border-blue-light focus:border-blue-light')"
                       autocorrect="off" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="email">
                <p class="text-red-700 text-sm">{{ errors && errors.email ? errors.email[0] : null }}</p>
            </div>
            <div class="relative mb-2">
                <input aria-invalid="true" autocomplete="current-password" id="password" name="password"
                       placeholder="••••••••"
                       :type="type" inputmode="text"
                       class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md rounded-lg hover:border-cerulean-500 focus:outline-none focus:border-cerulean-500 focus:border-transparent transition-colors mb-2"
                       :class="errors && errors.password ? 'border-red-500 focus:border-red-500' : 'border-gray-300 hover:border-blue-light focus:border-blue-light'"
                       autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="password">
                <p class="text-red-700 text-sm">{{ errors && errors.password ? errors.password[0] : null }}</p>
                <div v-if="type === 'password'" @click="typeChange()">
                    <span class="iconify absolute translate-y-1/2 text-gray-400 top-0 my-3 mr-4 cursor-pointer right-0"
                          data-icon="mdi:eye-off"></span>
                </div>
                <div v-else-if="type !== 'password'" @click="typeChange()" class="z-50">
                    <span class="iconify absolute translate-y-1/2 text-gray-400 top-0 my-3 mr-4 cursor-pointer right-0"
                          data-icon="mdi:eye"></span>
                </div>
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
            email: null,
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
            data.append('email', this.email);
            data.append('password', this.password);
            data.append('password_confirmation', this.password_confirmation);

            axios.post('/register', data).then(response => {
                this.loading = false
                if (response.data.success === false) {
                    this.error_text = response.data.error
                    this.error = true
                } else if (response.data.success === true) {
                    window.location = '/';
                }
            }).catch(error => {
                this.loading = false
                this.errors = error.response.data.errors
            })
        },
    }
}
</script>
