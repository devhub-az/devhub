<template>

        <form autocomplete="off" @submit.prevent="login" method="post">
            <div class="lg:w-2/6 md:w-1/2 bg-gray-200 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                    <input type="email" id="email" name="email"
                           placeholder="Elektron poçt" v-model="email"
                           class="py-1 px-3 w-full border block">
                </div>
                <div class="relative mb-4">
                    <label for="full-name" class="leading-7 text-sm text-gray-600">Full Name</label>
                    <input type="text" id="full-name" name="full-name"
                           placeholder="Şifrə" v-model="password"
                           class="w-full bg-white rounded border border-gray-300 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button
                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    Button
                </button>
                <p class="text-xs text-gray-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
            </div>
            <div class="error" v-if="error">
                <h6 class="error__text">{{ error_text }}</h6>
            </div>
            <div class="intro-y box px-5 py-8 mt-8">
                <div class="intro-y">
                    <input type="text" class="intro-y auth__input input input--lg w-full border block"
                           placeholder="Elektron poçt" v-model="email">
                    <input type="password" class="intro-y auth__input input input--lg w-full border block mt-4"
                           placeholder="Şifrə" v-model="password">
                </div>
                <div class="intro-y auth__info flex text-xs sm:text-sm mt-4">
                    <div class="flex items-center mr-auto">
                        <input type="checkbox" class="input border mr-2" id="remember-me">
                        <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                    </div>
                    <a href="">Şifrəni sıfırla</a>
                </div>
                <div class="intro-y mt-5 xl:mt-8 text-center xl:text-left">
                    <button class="intro-y button button--lg button--primary w-full xl:mr-3">Daxil ol</button>
                    <button class="intro-y button button--lg button--secondary w-full border mt-3">Qeydiyyatdan keçmək
                    </button>
                </div>
            </div>
        </form>
    <!--            <div class="login__form">-->
    <!--                <input aria-invalid="true" autocomplete="username" id="email" name="email" placeholder="Elektron poçt"-->
    <!--                       type="text" inputmode="text" class="auth__input input input&#45;&#45;lg w-full border block" aria-label="Elektron poçt"-->
    <!--                       autocorrect="off" autocapitalize="none"-->
    <!--                       spellcheck="false"-->
    <!--                       value="" v-model="email">-->
    <!--            </div>-->
    <!--            <div class="login__form">-->
    <!--                <input aria-invalid="true" autocomplete="current-password" id="password" name="password"-->
    <!--                       placeholder="Şifrə"-->
    <!--                       type="password" inputmode="text" class="login__form-input" aria-label="Şifrə"-->
    <!--                       autocorrect="off" autocapitalize="none"-->
    <!--                       spellcheck="false"-->
    <!--                       value="" v-model="password">-->
    <!--            </div>-->
    <!--            <button v-if="loading" class="btn btn-primary login-button"><i class="mdi mdi-spin mdi-loading"/></button>-->
    <!--            <button v-else type="submit" class="btn btn-primary login-button">Daxil ol</button>-->

    <!--            <footer class="login__footer-links">-->
    <!--                <a class="footer__link" data-content-type="requestPasswordForm"-->
    <!--                   href="/">-->
    <!--                    Şifrəni sıfırla-->
    <!--                </a>-->
    <!--                <a href="/" class="footer__link js-change-content"-->
    <!--                   data-content-type="registerForm">-->
    <!--                    Qeydiyyatdan keçmək-->
    <!--                </a>-->
    <!--            </footer>-->

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
                } else if (response.data.success === true) {
                    window.location = '/';
                }
            })
        },
    }
}
</script>
