<template>
    <div>
        <div class="error" v-if="error">
            <h6 class="error__text">{{ error_text }}</h6>
        </div>
        <form autocomplete="off" @submit.prevent="login" method="post">
            <div class="login__form">
                <input aria-invalid="true" autocomplete="username" id="email" name="email" placeholder="Elektron poçt"
                       type="text" inputmode="text" class="login__form-input" aria-label="Elektron poçt"
                       autocorrect="off" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="email">
            </div>
            <div class="login__form">
                <input aria-invalid="true" autocomplete="current-password" id="password" name="password"
                       placeholder="Şifrə"
                       type="password" inputmode="text" class="login__form-input" aria-label="Şifrə"
                       autocorrect="off" autocapitalize="none"
                       spellcheck="false"
                       value="" v-model="password">
            </div>
            <button v-if="loading" class="btn btn-primary login-button"><i class="mdi mdi-spin mdi-loading"/></button>
            <button v-else type="submit" class="btn btn-primary login-button">Daxil ol</button>

            <footer class="login__footer-links">
                <a class="footer__link" data-content-type="requestPasswordForm"
                   href="/">
                    Şifrəni sıfırla
                </a>
                <a href="/" class="footer__link js-change-content"
                   data-content-type="registerForm">
                    Qeydiyyatdan keçmək
                </a>
            </footer>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            email: null,
            password: null,
            error: false,
            loading: false,
            error_text: ''
        }
    },
    methods: {
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
                } else if (response.data.success === true){
                    window.location = '/';
                }
            })
        },
    }
}
</script>
