@extends('front.login-layout')

@section('title')Login səhifəsi @stop

@section('css')
    {{--    <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">--}}
@stop

@section('main')
    <div class="container">
        <div class="PageColumns">
            <div class="PageColumn PageColumn__left">
                <div class="login__registration">
                    <div class="login__registration-block">
                        <h1 class="title"><span class="logo_login">DevHub</span> cəmiyyətinə qoşulun</h1>
                        <div class="login__registration-block-info">
                            <span class="mdi mdi-thumbs-up-down"></span>
                            <div class="login__registration-info-text">Səs vermək və şərh yazmaq kimi imkanların
                                kilidini aç
                            </div>
                        </div>
                        <div class="login__registration-block-info">
                            <i class="icon feather icon-bookmark"></i>
                            <div class="login__registration-info-text">Ən sevdiyiniz paylaşmaları qeyd edin</div>
                        </div>
                        <div class="login__registration-block-info">
                            <i class="icon feather icon-award"></i>
                            <div class="login__registration-info-text">Şöhrət və döş nişanları qazanın</div>
                        </div>
                    </div>
                </div>
                <!-- particles.js container -->
                <div id="particles-js"></div>
            </div>
            <div class="PageColumn PageColumn__right">
                <div class="ColumnContainer mode-auth">
                    <a href="{{ route('home') }}" class="logo_login">DevHub</a>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <fieldset class="AnimatedForm__field m-required login hideable m-valid">
                            <input id="email" type="email"
                                   class="AnimatedForm__textInput {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   data-empty="false" name="email" value="{{ old('email') }}" required
                                   autocomplete="email" autofocus>
                            <label class="AnimatedForm__textInputLabel"
                                   for="loginUsername">{{ __('validation.attributes.email') }}</label>
                            <div class="AnimatedForm__errorMessage"></div>
                        </fieldset>
                        <fieldset class="AnimatedForm__field m-required password hideable">
                            <input id="password" type="password"
                                   class="AnimatedForm__textInput {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" data-empty="false" required autocomplete="current-password">
                            <label class="AnimatedForm__textInputLabel"
                                   for="loginPassword">{{ __('validation.attributes.password') }}</label>
                            <div class="AnimatedForm__errorMessage"></div>
                        </fieldset>
                        <div class="AnimatedForm__field form-group row mb-0">
                            <button type="submit" class="btn btn-primary login-button">
                                Daxil ol
                            </button>

                            @if (Route::has('password.request'))
                                <footer class="login__footer-links">
                                    <a class="footer__link" data-content-type="requestPasswordForm"
                                       href="{{ route('password.request') }}">
                                        Şifrəni sıfırla
                                    </a>
                                    <a class="footer__link js-change-content" data-content-type="registerForm">
                                        Qeydiyyatdan keçmək
                                    </a>
                                </footer>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="login__footer">
                    © 2020 DevHub
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('js/scripts/particles.min.js') }}"></script>
    <script src="{{ mix('js/scripts/particles.settings.js') }}"></script>
@endsection
