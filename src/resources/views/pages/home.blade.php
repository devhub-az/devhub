@extends('layouts.layout')

@section('title')Əsas səhifə@stop

@section('main')
    <div class="layout_body">
        <div class="layout_content">
            <div class="content_left" id="app">
                <div class="header">
                    <div class="nav_posts">
                        <a href="{{ route('home') }}"
                           class="nav-posts__item @if(Request::is('top/*') || Request::is('/')) nav-posts__item-link_current @endif">
                            <span class="nav-posts__item-link">Ən yaxşı</span>
                        </a>
                        <a href="{{ route('all') }}"
                           class="nav-posts__item @if(Request::url() === route('all')) nav-posts__item-link_current @endif">
                            <span class="nav-posts__item-link">Bütün</span>
                        </a>
                        @auth
                                <a href="{{ route('favorite') }}"
                                   class="nav-posts__item @if(Request::url() === route('favorite')) nav-posts__item-link_current @endif">
                                    <span class="nav-posts__item-link badge"
                                          @if (Auth::user()->unreadNotifications->where('type', '!=', 'App\Notifications\MessageReceived')->count() > 0)
                                          data-posts-badge="+{{ Auth::user()->unreadNotifications->where('type', '!=', 'App\Notifications\MessageReceived')->count() }}"@endif>
                                        Abunə ilə
                                    </span>
                                </a>
                        @endauth
                    </div>
                </div>
                @if (Request::is('top/*') || Request::is('/'))
                    <div class="tabs__level tabs__level_bottom">
                        <ul class="toggle-menu ">
                            <li class="toggle-menu__item">
                                <a href="{{ url('/') }}"
                                   class="toggle-menu__item-link @if(Request::url() === url('/')) toggle-menu__item-link_active @endif"
                                   rel="nofollow" title="Лучшие публикации за сутки">
                                    Gün
                                </a>
                            </li>
                            <li class="toggle-menu__item">
                                <a href="{{ url('top/week') }}"
                                   class="toggle-menu__item-link @if(Request::url() === url('top/week')) toggle-menu__item-link_active @endif"
                                   rel="nofollow" title="Лучшие публикации за неделю">
                                    Həftə
                                </a>
                            </li>
                            <li class="toggle-menu__item">
                                <a href="{{ url('top/month') }}"
                                   class="toggle-menu__item-link @if(Request::url() === url('top/month')) toggle-menu__item-link_active @endif"
                                   rel="nofollow" title="Лучшие публикации за месяц">
                                    Ay
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
                <posts
                        :url="'{{ $url }}'"
                        @auth :auth_check="true" @endauth
                ></posts>
            </div>

            {{-- Right --}}
            <div class="content_right">
                <div class="default-block custom-new-post">
                    <strong>Yeni məqalə yazmağa başla 💬✨</strong>
                    <p>
                        Təcrübəniz ilcə bölüşün, mükafat alın və ya sadəcə əylənin.
                    </p>
                    <a href="#"
                       class="button--cta button button--icon button--icon--write rippleButton rippleButton">
                            <span class="btn btn-primary btn-a">
                                Paylaşmaq
                            </span>
                        <div class="ripple-container"></div>
                    </a>
                </div>
                <a class="sidebar-banner-telegram" href="https://t.me/devhub_az" target="_blank" rel="noopener">
                    <div class="logo">DevHub</div> <span>Telegram kanalı <br> izləmək</span>
                    <svg width="100px" height="100px" viewBox="0 0 50 50" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <linearGradient x1="66.67%" y1="16.67%" x2="41.67%" y2="75%" id="linearGradient-1">
                                <stop stop-color="#37AEE2" offset="0%"></stop>
                                <stop stop-color="#1E96C8" offset="100%"></stop>
                            </linearGradient>
                            <linearGradient x1="61.2346759%" y1="43.69%" x2="74.7064382%" y2="80.24%"
                                            id="linearGradient-2">
                                <stop stop-color="#EFF7FC" offset="0%"></stop>
                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="banner/normal" transform="translate(-177.000000, -18.000000)" fill-rule="nonzero">
                                <g id="logo/tg" transform="translate(177.000000, 18.000000)">
                                    <circle id="shape" fill="url(#linearGradient-1)" cx="25" cy="25" r="25"></circle>
                                    <path d="M20.4166667,36.4583333 C19.60675,36.4583333 19.744375,36.1525208 19.4650417,35.3813542 L17.0833333,27.5428958 L35.4166667,16.6666667"
                                          id="body-right" fill="#C8DAEA"></path>
                                    <path d="M20.4166667,36.4583333 C21.0416667,36.4583333 21.3178125,36.1725 21.6666667,35.8333333 L25,32.5920833 L20.8420833,30.0847917"
                                          id="body-left" fill="#A9C9DD"></path>
                                    <path d="M20.8416667,30.0854167 L30.9166667,37.5289583 C32.0663542,38.1633125 32.896125,37.834875 33.1825,36.4615625 L37.2835417,17.1359375 C37.7034167,15.4525625 36.6418542,14.6890625 35.542,15.1883958 L11.46075,24.4740208 C9.81697917,25.1333333 9.8265625,26.0503958 11.161125,26.4590208 L17.3409167,28.3878333 L31.6477917,19.3617917 C32.3231875,18.9522292 32.9430625,19.1724187 32.4342917,19.6239583"
                                          id="wings" fill="url(#linearGradient-2)"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
                {{--                <div class="default-block custom-new-post">--}}
                {{--                    <strong>Yeni məqalə yazmağa başla 💬✨</strong>--}}
                {{--                    <p>--}}
                {{--                        Təcrübəniz ilcə bölüşün, mükafat alın və ya sadəcə əylənin.--}}
                {{--                    </p>--}}
                {{--                    <a href="/forums/-/create-thread"--}}
                {{--                       class="button--cta button button--icon button--icon--write rippleButton rippleButton">--}}
                {{--                        <span class="btn btn-primary btn-a">--}}
                {{--                            Paylaşmaq--}}
                {{--                        </span>--}}
                {{--                        <div class="ripple-container"></div>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                <div id="default-block" class="default-block default-block_sidebar">--}}
                {{--                    <div class="default-block__header">--}}
                {{--                        <h3 class="default-block__header-title">Ən izləninən hablar</h3>--}}
                {{--                    </div>--}}

                {{--                    <div class="default-block__content">--}}
                {{--                        <ul>--}}
                {{--                            @foreach ($top_followed_hubs as $hub)--}}
                {{--                                <li class="hubs-list">--}}
                {{--                                    <img class="list-hubs__hub-image-block"--}}
                {{--                                         src="{{ strtolower($hub['logo']) ?? '/images/empty/code.png' }}" alt="">--}}
                {{--                                    <div class="list-hubs__obj-body">--}}
                {{--                                        <div class="block-hubs__title-link">--}}
                {{--                                            <a href="/hubs/{{ $hub['id'] ?? '' }}">{{ $hub['name'] ?? '' }}</a></div>--}}
                {{--                                        <div class="list-hubs__desc">--}}
                {{--                                            <div class="hubs-desc">--}}
                {{--                                                {{ $hub->description[\App::getLocale()] }}--}}
                {{--                                            </div>--}}
                {{--                                            <div class="hubs-stats">--}}
                {{--                                                <i class="icon feather icon-users"></i>--}}
                {{--                                                İzləyicilər {{ $hub['hub_followers_count'] ?? '' }}--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </li>--}}
                {{--                            @endforeach--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
{{--    <script src="{{ asset('js/stickybits.min.js') }}"></script>--}}
{{--    <script src="{{asset('js/stickybitsettings.js') }}"></script>--}}
@endsection
