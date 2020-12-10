<template>
    <form class="mt-8">
        <div class="mx-auto max-w-lg">
            <div class="py-2">
                <span class="px-1 text-sm text-gray-600">Username</span>
                <input placeholder="" type="text"
                       class="text-md block px-3 py-2  rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
            </div>
            <div class="py-2" x-data="{ show: true }">
                <span class="px-1 text-sm text-gray-600">Password</span>
                <div class="relative">
                    <input placeholder="" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                focus:placeholder-gray-500
                focus:bg-white
                focus:border-gray-600
                focus:outline-none">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                             :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                             viewbox="0 0 576 512">
                            <path fill="currentColor"
                                  d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                            </path>
                        </svg>

                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                             :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                             viewbox="0 0 640 512">
                            <path fill="currentColor"
                                  d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                            </path>
                        </svg>

                    </div>
                </div>
            </div>
            <div class="flex justify-between"><label class="block text-gray-500 font-bold my-4"><input type="checkbox"
                                                                                                       class="leading-loose text-pink-600">
                <span class="py-2 text-sm text-gray-600 leading-snug"> Remember
                    Me </span></label> <label class="block text-gray-500 font-bold my-4"><a
                href="#"
                class="cursor-pointer tracking-tighter text-black border-b-2 border-gray-200 hover:border-gray-400"><span>Forgot
                      Password?</span></a></label></div>
            <button class="mt-3 text-lg font-semibold
                bg-gray-800 w-full text-white rounded-lg
                px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                Login
            </button>
        </div>
    </form>
    <!--    <form autocomplete="off" @submit.prevent="login" method="post">-->
    <!--        <div class="lg:w-2/6 md:w-1/2 bg-gray-200 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">-->
    <!--            <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>-->
    <!--            <div class="relative mb-4">-->
    <!--                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>-->
    <!--                <input type="email" id="email" name="email"-->
    <!--                       placeholder="Elektron poçt" v-model="email"-->
    <!--                       class="py-1 px-3 w-full border block">-->
    <!--            </div>-->
    <!--            <div class="relative mb-4">-->
    <!--                <label for="full-name" class="leading-7 text-sm text-gray-600">Full Name</label>-->
    <!--                <input type="text" id="full-name" name="full-name"-->
    <!--                       placeholder="Şifrə" v-model="password"-->
    <!--                       class="w-full bg-white rounded border border-gray-300 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">-->
    <!--            </div>-->
    <!--            <button-->
    <!--                class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">-->
    <!--                Button-->
    <!--            </button>-->
    <!--            <p class="text-xs text-gray-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>-->
    <!--        </div>-->
    <!--        <div class="error" v-if="error">-->
    <!--            <h6 class="error__text">{{ error_text }}</h6>-->
    <!--        </div>-->
    <!--        <div class="intro-y box px-5 py-8 mt-8">-->
    <!--            <div class="intro-y">-->
    <!--                <input type="text" class="intro-y auth__input input input&#45;&#45;lg w-full border block"-->
    <!--                       placeholder="Elektron poçt" v-model="email">-->
    <!--                <input type="password" class="intro-y auth__input input input&#45;&#45;lg w-full border block mt-4"-->
    <!--                       placeholder="Şifrə" v-model="password">-->
    <!--            </div>-->
    <!--            <div class="intro-y auth__info flex text-xs sm:text-sm mt-4">-->
    <!--                <div class="flex items-center mr-auto">-->
    <!--                    <input type="checkbox" class="input border mr-2" id="remember-me">-->
    <!--                    <label class="cursor-pointer select-none" for="remember-me">Remember me</label>-->
    <!--                </div>-->
    <!--                <a href="">Şifrəni sıfırla</a>-->
    <!--            </div>-->
    <!--            <div class="intro-y mt-5 xl:mt-8 text-center xl:text-left">-->
    <!--                <button class="intro-y button button&#45;&#45;lg button&#45;&#45;primary w-full xl:mr-3">Daxil ol</button>-->
    <!--                <button class="intro-y button button&#45;&#45;lg button&#45;&#45;secondary w-full border mt-3">Qeydiyyatdan keçmək-->
    <!--                </button>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </form>-->
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
