<template>
    <form autocomplete="off" @submit.prevent="login" method="post" class="xs:max-w-xs w-96">
        <a href="/login/github"
           class="font-button mt-4 px-3 h-9 text-sm text-black border border-gray-800 relative inline-flex leading-4 justify-center font-medium items-center bg-white hover:bg-gray-100 w-full text-center rounded focus:outline-none">
            <span class="iconify mr-2 text-base" data-icon="simple-icons:github" data-inline="false"></span>
            GitHub ilə daxil olmaq
        </a>
        <div class="my-4 items-center flex">
            <div class="mr-3 flex-grow border-t border-gray-300" aria-hidden="true"></div>
            <div class="text-sm">və ya, e-poçtunuzla daxil olun</div>
            <div class="ml-3 flex-grow border-t border-gray-300" aria-hidden="true"></div>
        </div>
        <div class="pb-2">
            <input aria-invalid="true" autocomplete="off" id="email" name="email"
                   placeholder="Elektron poçt"
                   type="text" inputmode="text"
                   class="px-2 py-2 w-full border border-gray-300 rounded hover:border-cerulean-500 focus:outline-none focus:border-cerulean-500 focus:border-transparent transition-colors mb-2"
                   aria-label="Elektron poçt"
                   autocorrect="off" autocapitalize="none"
                   spellcheck="false"
                   value="" v-model="email">
            <div class="relative">
                <input aria-invalid="true" autocomplete="current-password" id="password" name="password"
                       placeholder="Şifrə"
                       :type="type" inputmode="text"
                       class="px-2 py-2 w-full border border-gray-300 rounded hover:border-cerulean-500 focus:outline-none focus:border-cerulean-500 focus:border-transparent transition-colors"
                       aria-label="Şifrə"
                       autocorrect="off" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="password">
                <div v-if="type === 'password'" @click="typeChange()">
                    <span class="iconify absolute translate-y-1/2 text-gray-400 top-0 my-3 mr-4 cursor-pointer right-0"
                          data-icon="mdi:eye-off"></span>
                </div>
                <div v-else-if="type !== 'password'" @click="typeChange()" class="z-50">
                    <span class="iconify absolute translate-y-1/2 text-gray-400 top-0 my-3 mr-4 cursor-pointer right-0"
                          data-icon="mdi:eye"></span>
                </div>
            </div>

        </div>
        <div class="w-full">
            <div v-if="loading"
                 class="border-cerulean-600 text-white rounded bg-cerulean-600 hover:opacity-90 mb-2 px-2 py-3">
                <i class="mdi mdi-spin mdi-loading"/>
            </div>
            <button v-else type="submit"
                    class="btn w-full mx-auto block">
                Daxil olmaq
            </button>
        </div>
        <div class="mt-8">
            <a class="block text-center text-sm text-cerulean-500"
               href="/#">
                Şifrəni unutmusuz?
            </a>
            <div class="mt-2 bg-white rounded py-4 text-sm border">
                Hələ hesabınız yoxdur?
                <a href="/register"
                   class="text-cerulean-500">
                    Qeydiyyatdan keçmək
                </a>
            </div>
        </div>
    </form>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            email: null,
            password: null,
            type: 'password',
            error: false,
            loading: false,
            error_text: ''
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
        login() {
            this.loading = true
            axios.post('/login', {
                email: this.email,
                password: this.password
            }).then(response => {
                this.loading = false
                window.location = '/';
            }).catch(response => {
                this.error_text = response.data.error
                this.error = true
            })
        },
    }
}
</script>
