<template>
    <form autocomplete="off" @submit.prevent="login" method="post" class="xs:max-w-xs w-96">
        <div class="py-4">
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
                <span v-else-if="type !== 'password'" @click="typeChange()" class="z-50">
                    <span class="iconify absolute translate-y-1/2 text-gray-400 top-0 my-3 mr-4 cursor-pointer right-0"
                        data-icon="mdi:eye"></span>
                </span>
            </div>

        </div>
        <div class="w-full">
            <div v-if="loading" class="border-cerulean-500 text-white rounded bg-cerulean-500 hover:opacity-90 mb-2 px-2 py-3">
                <div class="animate-spin">
                    <span class="iconify mx-auto" data-icon="mdi-loading"></span>
                </div>
            </div>
            <button v-else type="submit"
                    class="border border-cerulean-500 w-full font-medium uppercase text-xs rounded px-2 py-3 text-white bg-cerulean-500 hover:opacity-90 mb-2">
                Daxil ol
            </button>
            <a href="/register"
               class="inline-block border border-cerulean-500 w-full font-medium uppercase text-xs rounded px-2 py-3 text-cerulean-500"
               data-content-type="registerForm">
                Qeydiyyatdan keçmək
            </a>
        </div>
        <footer class="mt-2">
            <a class="footer__link" data-content-type="requestPasswordForm"
               href="/">
                Şifrəni sıfırla
            </a>
        </footer>
    </form>
</template>

<script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
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
            axios.post('/api/auth/login', {
                email: this.email,
                password: this.password
            }).then(response => {
                this.loading = false
                if (response.data.success === false) {
                    this.error_text = response.data.error
                    this.error = true
                } else if (response.data.success === true) {
                    window.location = '/';
                }
            })
        },
    }
}
</script>
