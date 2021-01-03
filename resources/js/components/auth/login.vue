<template>
    <form autocomplete="off" @submit.prevent="login" method="post" class="xs:max-w-xs w-96">
        <div class="pt-4 pb-2">
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
                <div class="animate-spin">
                    <span class="iconify mx-auto" data-icon="mdi-loading"></span>
                </div>
            </div>
            <button v-else type="submit"
                    class="border border-cerulean-600 w-full font-medium uppercase text-xs rounded px-2 py-3 text-white bg-cerulean-600 hover:opacity-90 mb-2">
                Daxil olmaq
            </button>
        </div>
        <div class="mt-2 text-left text-sm">
            <a class="text-cerulean-500"
               href="/#">
                Şifrəni</a> unutmusuz?
        </div>
        <div class="mt-4 bg-white rounded py-4 text-sm border">
            Hələ hesabınız yoxdur?
            <a href="/register"
               class="text-cerulean-500">
                Qeydiyyatdan keçmək
            </a>
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
