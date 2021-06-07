import React, { useState } from 'react';
import { Link } from 'react-router-dom';

const Login: React.FunctionComponent = () => {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const loading: Boolean = false;
    const [type, setType] = useState("password");

    const handleSubmit = (event: React.FormEvent) => {
        event.preventDefault()
    }

    const changeEmailHandler = (event: React.ChangeEvent<HTMLInputElement>) => {
        setEmail(event.target.value);
    }

    const changePasswordHandler = (event: React.ChangeEvent<HTMLInputElement>) => {
        setPassword(event.target.value);
    }

    return(
        <div className="xs:pt-20 text-center absolute top-1/2 left-1/2 -mr-1/2" style={{transform: "translate(-50%, -50%)"}}>
            <Link to="/" className="text-black font-bold hover:text-gray-200 md:text-2xl m-auto">
                <img
                src="images/DevHub_Monochrome_Full_Logo.svg"
                alt="DevHub Logo"
                width="188"
                height="36"
                className="mb-10 mx-auto" />
            </Link>

            <form autoComplete="off" method="post" className="xs:max-w-xs w-96" onSubmit={handleSubmit}>
                <a
                href="/login/github"
                id="trans-none"
                className="btn-outline border-gray-300 dark:border-gray-300 w-full items-center dark:text-black">
                    <div className="mx-auto flex space-x-1">
                        <span className="iconify text-base text-gray-700" data-icon="simple-icons:github" data-inline="true"></span>
                    </div>
                </a>
                <div className="my-4 items-center flex">
                    <div className="mr-3 flex-grow border-t border-gray-300" aria-hidden="true"></div>
                    <div className="text-sm">{/*{ $t('devhub.or') }*/}və ya</div>
                    <div className="ml-3 flex-grow border-t border-gray-300" aria-hidden="true"></div>
                </div>
                <div className="pb-2 space-y-4">
                    <input
                        aria-invalid="true"
                        autoComplete="off"
                        id="email"
                        name="email"
                        placeholder="richard.hendricks@piedpiper.com"
                        type="text"
                        inputMode="text"
                        className="input"
                        aria-label="geremy@mailer.io"
                        autoCorrect="off"
                        autoCapitalize="none"
                        spellCheck="false"
                        value=""
                        onChange={changeEmailHandler} />
                    <div className="relative">
                        <input aria-invalid="true"
                        autoComplete="current-password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        type="password"
                        className="input"
                        aria-label="Şifrə"
                        autoCapitalize="none"
                        spellCheck="false"
                        onChange={changePasswordHandler} />
                        <div v-if="type === 'password'">
                            <span className="iconify absolute translate-y-1/2 text-gray-400 top-0 my-3 mr-4 cursor-pointer right-0"
                                data-icon="mdi:eye-off"></span>
                        </div>
                        <div v-else-if="type !== 'password'" className="z-50">
                            <span className="iconify absolute translate-y-1/2 text-gray-400 top-0 my-3 mr-4 cursor-pointer right-0"
                                data-icon="mdi:eye"></span>
                        </div>
                    </div>
                    <div className="w-full">
                        {
                            loading
                            ?
                            <div className="border-cerulean-600 text-white rounded bg-cerulean-600 hover:opacity-90 mb-2 px-2 py-3">
                                <i className="mdi mdi-spin mdi-loading"/>
                            </div>
                            :
                            <button type="submit" className="btn w-full mx-auto block">
                            {/* {{ $t('devhub.login') }}     */}
                               Giriş
                            </button>
                        }
                    </div>
                </div>
                <div className="mt-4">
                    <Link className="block text-center text-sm text-cerulean-500" to="/">
                        {/* {{ $t('devhub.forgotPassword') }} */}
                        Şifrəni unutmusuz?
                    </Link>
                    <div className="mt-2 bg-white rounded py-4 text-sm border">
                        {/* {{ $t('devhub.notRegistered') }} */}
                        Hələ hesabınız yoxdur?
                        <Link to="/register" className="text-cerulean-500">
                            {/* {{ $t('devhub.register') }} */}
                            Qeydiyyatdan keçmək
                        </Link>
                    </div>
                </div>
            </form>
        </div>
    );
}

export default Login;
