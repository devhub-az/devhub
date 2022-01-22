<template>
    <form autocomplete="off" @submit.prevent="login" method="post" class="xs:max-w-xs w-96">
        <a href="/login/github"
           class="btn-outline trans-none border-gray-300 dark:border-gray-300 w-full items-center dark:text-black">
            <div class="mx-auto flex space-x-1">
                <span class="iconify text-base text-gray-700 dark:text-gray-300" data-icon="simple-icons:github" data-inline="true"></span>
            </div>
        </a>
        <div class="my-4 items-center flex">
            <div class="mr-3 flex-grow border-t border-gray-300" aria-hidden="true"></div>
            <div class="text-sm dark:text-gray-300">{{ $t('devhub.or') }}</div>
            <div class="ml-3 flex-grow border-t border-gray-300" aria-hidden="true"></div>
        </div>
        <div class="pb-2 space-y-4">
            <input aria-invalid="true" autocomplete="off" id="email" name="email"
                   placeholder="richard.hendricks@piedpiper.com"
                   type="text" inputmode="text"
                   class="input bg-white dark:bg-dpaper border-gray-200 text-black dark:text-white placeholder-gray-500 caret-white"
                   aria-label="geremy@mailer.io"
                   autocorrect="off" autocapitalize="none"
                   spellcheck="false"
                   value="" v-model="email">
            <div class="relative">
                <input aria-invalid="true" autocomplete="current-password" id="password" name="password"
                       placeholder="••••••••"
                       :type="type" inputmode="password"
                       class="input bg-white dark:bg-dpaper border-gray-200 text-black dark:text-white placeholder-gray-500 caret-white"
                       aria-label="Şifrə"
                       autocapitalize="none"
                       spellcheck="false"
                       v-model="password">
                <div v-if="type === 'password'" @click="typeChange()">
                    <span class="iconify absolute translate-y-1/2 text-gray-400 top-0 my-3 mr-4 cursor-pointer right-0"
                          data-icon="mdi:eye-off"></span>
                </div>
                <div v-else-if="type !== 'password'" @click="typeChange()" class="z-50">
                    <span class="iconify absolute translate-y-1/2 text-gray-400 top-0 my-3 mr-4 cursor-pointer right-0"
                          data-icon="mdi:eye"></span>
                </div>
            </div>
            <div class="w-full">
                <div v-if="loading"
                     class="border-cerulean-600 text-white rounded bg-cerulean-600 hover:opacity-90 mb-2 px-2 py-3">
                    <i class="mdi mdi-spin mdi-loading"/>
                </div>
                <button v-else type="submit"
                        class="btn w-full mx-auto block">
                    {{ $t('devhub.login') }}
                </button>
            </div>
        </div>
        <div class="mt-4">
            <a class="block text-center text-sm text-cerulean-500"
               href="/forgot-password">
                {{ $t('devhub.forgotPassword') }}
            </a>
            <div class="mt-2 bg-white dark:bg-dpaper dark:text-gray-300 dark:border-gray-700 rounded py-4 text-sm border">
                {{ $t('devhub.notRegistered') }}
                <a href="/register"
                   class="text-cerulean-500">
                    {{ $t('devhub.register') }}
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
