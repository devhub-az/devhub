@extends('front.login-layout')

@section('title')Login səhifəsi @stop

@section('main')
    <div class="container">
        <div class="PageColumns">
            <div class="PageColumn PageColumn__left">
                <div class="Art">
                    <!-- particles.js container -->
                    <div id="particles-js">
                        <div class="login__registration">
                            <div class="login__registration-block">
                                <h1 class="title title--large">Are you ready to own
                                    a masterpiece?</h1>
                                <p>Discover the only independent cloud based platform by collectors for collectors.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PageColumn PageColumn__right">
                <div class="ColumnContainer mode-auth">
                    <a href="{{ route('home') }}" class="logo_login">DevHub</a>
                    <p class="desc">Xoş gəldiniz! Xahiş edirik məlumatlarınızı daxil edin və ya hesabınıza sosial şəbəkə
                        hesabı ilə daxil olun.</p>
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
                {{-- <footer>
                    <p>test</p>
                </footer> --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js -->
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!-- stats.js lib -->
    {{-- <script src="http://threejs.org/examples/js/libs/stats.min.js"></script> --}}

    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {"value": 80, "density": {"enable": true, "value_area": 800}},
                "color": {"value": "#ffffff"},
                "shape": {
                    "type": "circle",
                    "stroke": {"width": 0, "color": "#000000"},
                    "polygon": {"nb_sides": 5},
                    "image": {"src": "img/github.svg", "width": 100, "height": 100}
                },
                "opacity": {
                    "value": 0.12025590456491421,
                    "random": false,
                    "anim": {
                        "enable": true,
                        "speed": 0.9744926547616141,
                        "opacity_min": 0.09744926547616141,
                        "sync": true
                    }
                },
                "size": {
                    "value": 4.008530152163807,
                    "random": false,
                    "anim": {"enable": true, "speed": 17.053621458328248, "size_min": 0.1, "sync": false}
                },
                "line_linked": {"enable": true, "distance": 150, "color": "#ffffff", "opacity": 1, "width": 1},
                "move": {
                    "enable": true,
                    "speed": 1.5,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "bounce",
                    "bounce": false,
                    "attract": {"enable": false, "rotateX": 600, "rotateY": 1200}
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {"enable": false, "mode": "repulse"},
                    "onclick": {"enable": true, "mode": "push"},
                    "resize": true
                },
                "modes": {
                    "grab": {"distance": 400, "line_linked": {"opacity": 1}},
                    "bubble": {"distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3},
                    "repulse": {"distance": 200, "duration": 0.4},
                    "push": {"particles_nb": 4},
                    "remove": {"particles_nb": 2}
                }
            },
            "retina_detect": true
        });
        var count_particles, stats, update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function () {
            stats.begin();
            stats.end();
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
            }
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
        ;
    </script>
@endsection
