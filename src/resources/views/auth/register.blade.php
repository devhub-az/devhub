@extends('layouts.login-layout')

@section('title')Registration səhifəsi @stop

@section('main')
    <div class="container">
        <div class="PageColumns">
            <div class="PageColumn PageColumn__left">
                @include('auth.import.left_side')
                <div id="particles-js"></div>
            </div>
            <div class="PageColumn PageColumn__right">
                <div class="ColumnContainer mode-auth">
                    <a href="{{ route('home') }}" class="logo_login" style="margin-top: 0;">DevHub</a>
                    <p class="desc">Xoş gəldiniz! Xahiş edirik məlumatlarınızı daxil edin və ya hesabınıza sosial şəbəkə
                        hesabı ilə daxil olun.</p>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="AnimatedForm__field m-required login hideable m-valid">
                            <input id="name" type="text"
                                   class="AnimatedForm__textInput {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   data-empty="false" name="name" value="{{ old('name') }}" required autofocus>
                            <label class="AnimatedForm__textInputLabel" for="loginUsername">İstifadəçi adı</label>
                            <div class="AnimatedForm__errorMessage">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </fieldset>
                        <fieldset class="AnimatedForm__field m-required login hideable">
                            <input id="email" type="email"
                                   class="AnimatedForm__textInput {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   name="email" value="{{ old('email') }}" data-empty="false" required>
                            <label class="AnimatedForm__textInputLabel" for="loginUsername">İstifadəçi emailı</label>
                            <div class="AnimatedForm__errorMessage">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </fieldset>
                        <fieldset class="AnimatedForm__field m-required login hideable">
                            <input id="avatar" type="file" name="avatar" data-empty="false">
                            <div class="AnimatedForm__errorMessage">
                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </fieldset>
                        <fieldset class="AnimatedForm__field m-required password hideable">
                            <input id="password" type="password"
                                   class="AnimatedForm__textInput {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" data-empty="false" required>
                            <label class="AnimatedForm__textInputLabel" for="loginPassword">Şifrə</label>
                            <div class="AnimatedForm__errorMessage">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </fieldset>
                        <fieldset class="AnimatedForm__field m-required password hideable">
                            <input id="password-confirm" type="password"
                                   class="AnimatedForm__textInput {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password_confirmation" data-empty="false" required>
                            <label class="AnimatedForm__textInputLabel" for="loginPassword">Şifrə 2</label>
                            <div class="AnimatedForm__errorMessage">
                            </div>
                        </fieldset>
                        <div class="AnimatedForm__field form-group row mb-0">
                            <button type="submit" class="btn btn-primary login-button">
                                Qoşulmaq
                            </button>

                            <footer class="login__footer-links register">
                                <div class="footer__link">
                                    Qeydiyyatdan keçmisiniz?
                                    <a data-content-type="requestPasswordForm"
                                       href="{{ route('login') }}">
                                        Daxil olun
                                    </a>
                                </div>
                            </footer>
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
