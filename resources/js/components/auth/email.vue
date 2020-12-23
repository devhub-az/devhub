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
        </div>
        <div class="w-full">
            <div v-if="loading"
                 class="border-cerulean-500 text-white rounded bg-cerulean-500 hover:opacity-90 mb-2 px-2 py-3">
                <div class="animate-spin">
                    <span class="iconify mx-auto" data-icon="mdi-loading"></span>
                </div>
            </div>
            <button v-else type="submit"
                    class="border border-cerulean-500 w-full font-medium uppercase text-xs rounded px-2 py-3 text-white bg-cerulean-500 hover:opacity-90 mb-2">
                Send Password Reset Link
            </button>
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
            axios.post('/password/email ', {
                email: this.email,
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
