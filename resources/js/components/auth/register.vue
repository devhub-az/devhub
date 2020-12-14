<template>
    <form autocomplete="off" @submit.prevent="register" method="post" class="xs:max-w-xs w-96 text-left">
        <div class="py-4">
            <div class="relative mb-2">
                <input aria-invalid="true" autocomplete="off" id="email" name="email"
                       placeholder="Elektron poçt"
                       type="text" inputmode="text"
                       class="px-2 py-2 w-full border rounded focus:outline-none focus:border-transparent transition-colors "
                       :class="error || (errors && errors.email) ? 'border-red-500 focus:border-red-500' : (success ? 'border-green-500 focus:border-green-500' : 'border-gray-300 hover:border-blue-light focus:border-blue-light')"
                       aria-label="Elektron poçt"
                       autocorrect="off" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="email">
                <div v-if="!checking"
                     class="absolute bg-blue-light text-white top-2 px-1.5 py-0.5 rounded cursor-pointer right-2 transition-none"
                     @click="email ? checkEmail(email) : null">
                    Yoxlamaq
                </div>
                <div v-else
                     class="absolute bg-gray-500 text-gray-300 top-2 px-1.5 py-0.5 rounded cursor-pointer right-2 transition-none">
                    Yoxlanir
                </div>
                <p class="text-red-700 text-sm">{{ errors && errors.email ? errors.email[0] : null }}</p>
            </div>
            <div class="relative mb-2">
                <input aria-invalid="true" autocomplete="current-password" id="password" name="password"
                       placeholder="Şifrə"
                       :type="type" inputmode="text"
                       class="px-2 py-2 w-full border  rounded focus:outline-none focus:border-transparent transition-colors"
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
                <input aria-invalid="true" autocomplete="current-password" id="password_confirmation" name="password_confirmation"
                       placeholder="Şifrə təsdiqlə"
                       :type="typeConfirm" inputmode="text"
                       class="px-2 py-2 w-full border border-gray-300 rounded hover:border-blue-light focus:outline-none focus:border-blue-light focus:border-transparent transition-colors"
                       aria-label="Şifrəni təsdiqlə" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="password_confirmation">
                <i class="mdi absolute translate-y-1/2 text-gray-400 top-0 p-2 pr-4 cursor-pointer right-0"
                   :class="typeConfirm === 'password' ? 'mdi-eye-off' : 'mdi-eye'"
                   @click="typeConfirmChange()"></i>
            </div>
            <div class="relative mb-2">
                <input aria-invalid="true" autocomplete="off" id="username" name="username"
                       placeholder="İstifadəçi adı"
                       type="text" inputmode="text"
                       class="px-2 py-2 w-full border rounded focus:outline-none focus:border-transparent transition-colors"
                       :class="errors && errors.username ? 'border-red-500 focus:border-red-500' : 'border-gray-300 hover:border-blue-light focus:border-blue-light'"
                       aria-label="Nik" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="username">
                <i class="mdi mdi-information-outline absolute translate-y-1/2 text-gray-400 top-0 p-2 pr-4 cursor-pointer right-0"
                   title="İstifadəçi adı 3-15 simvoldan ibaret olmalidir"></i>
                <p class="text-red-700 text-sm">{{ errors && errors.username ? errors.username[0] : null }}</p>
            </div>
            <div class="mb-2">
                <input aria-invalid="true" autocomplete="off" id="name" name="name"
                       placeholder="Ad Soyad"
                       type="text" inputmode="text"
                       class="px-2 py-2 w-full border rounded  focus:outline-none focus:border-transparent transition-colors "
                       :class="errors && errors.name ? 'border-red-500 focus:border-red-500' : 'border-gray-300 hover:border-blue-light focus:border-blue-light'"
                       aria-label="Nik" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="name">
                <p class="text-red-700 text-sm">{{ errors && errors.name ? errors.name[0] : null }}</p>
            </div>
        </div>
        <div class="w-full">
            <button v-if="loading"
                    class="border border-blue w-full font-medium uppercase text-xs rounded px-2 py-3 text-white bg-blue-light hover:opacity-90 mb-2 focus:outline-none">
                <i class="mdi mdi-spin mdi-loading"/></button>
            <button v-else type="submit"
                    class="border border-blue w-full font-medium uppercase text-xs rounded px-2 py-3 text-white bg-blue-light hover:opacity-90 mb-2 focus:outline-none">
                Qeydiyyatdan keçmək
            </button>
        </div>
        <footer class="mt-2 text-center">
            <p>
                Hesabınız var? <a href="/login" class="text-blue-light">Daxil olmaq</a>
            </p>

        </footer>
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
            axios.post('/api/auth/register', {
                username: this.username,
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
            }).then(response => {
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
