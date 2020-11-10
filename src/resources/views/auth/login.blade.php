@extends('layouts.login-layout')

@section('title')Login səhifəsi @stop

@section('main')
    <div class="container">
        <div class="login">
            <div class="login__left">
                @include('auth.import.left_side')
                <div id="particles-js"></div>
            </div>
            <div class="login__right" id="app">
                <div class="ColumnContainer mode-auth">
                    <a href="{{ route('home') }}" class="logo_login">DevHub</a>
{{--                    <login></login>--}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <fieldset class="login__form">
                            <input id="email" type="email"
                                   class="login__form-input {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   name="email" value="{{ old('email') }}" required
                                   autocomplete="email">
                            <label class="login__form-label"
                                   for="email">{{ __('validation.attributes.email') }}</label>
                            <div class="AnimatedForm__errorMessage"></div>
                        </fieldset>
                        <fieldset class="login__form">
                            <input id="password" type="password"
                                   class="login__form-input {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required autocomplete="current-password">
                            <label class="login__form-label"
                                   for="password">{{ __('validation.attributes.password') }}</label>
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
                                    <a href="{{ route('register') }}" class="footer__link js-change-content"
                                       data-content-type="registerForm">
                                        Qeydiyyatdan keçmək
                                    </a>
                                </footer>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="login__footer">
                    © 2019 - {{ date('Y') }} DevHub
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/scripts/particles.min.js') }}"></script>
    <script src="{{ asset('js/scripts/particles.settings.js') }}"></script>
@endsection
