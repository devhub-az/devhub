@extends('front.login-layout')

@section('title')Login səhifəsi @stop

@section('main')
    <div class="container">
        <nav class="default-nav -colorless -session -borderless" data-js-nav-shift="session">
            <div class="right">
                <p>
                    Qeydiyyatdan keçmisən?
                    <span>
                <a class="btn btn_navbar_registration btn-reg" href="{{ route('register') }}">Qeydiyyatdan Keç</a>
            </span>
                </p>
            </div>
        </nav>
        <div class="PageColumns">
            <div class="PageColumn PageColumn__left">
                <div class="Art"></div>
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
                            <input id="avatar" type="file" name="avatar" data-empty="false" required>
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
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Daxil ol
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Şifrəni unutmusan?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer>
            Photo by Ilya Pavlov on Unsplash
        </footer>
    </div>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar (optional)') }}</label>
                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="form-control" name="avatar" required>
                                    @if ($errors->has('avatar'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
