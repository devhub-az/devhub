@extends('front.layout')

@section('title')Əsas səhifə@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@stop

@section('main')
    <div class="layout_body">
        <div class="layout_content">
            <div class="content_left" id="app">
                <div class="header">
                    <ul class="nav_posts">
                        <a href="{{ route('home') }}"
                           class="nav-posts__item @if(Request::is('top/*') || Request::is('/')) nav-posts__item-link_current @endif">
                            <span class="nav-posts__item-link">Ən yaxşı</span>
                        </a>
                        <a href="{{ route('all') }}"
                           class="nav-posts__item @if(Request::url() === route('all')) nav-posts__item-link_current @endif">
                            <span class="nav-posts__item-link">Bütün yazılar</span>
                        </a>
                        @auth
                            @if (Auth::user()->getUserIdsAttribute() != null && Auth::user()->getHubsIdsAttribute() != null)
                                <a href="{{ route('favorite') }}"
                                   class="nav-posts__item @if(Request::url() === route('favorite')) nav-posts__item-link_current @endif">
                                    <span class="nav-posts__item-link badge"
                                          @if (Auth::user()->unreadNotifications->where('type', '!=', 'App\Notifications\MessageReceived')->count() > 0)
                                          data-posts-badge="+{{ Auth::user()->unreadNotifications->where('type', '!=', 'App\Notifications\MessageReceived')->count() }}"
                @endif>Abunə ilə</span>
                                </a>
                            @endif
                        @endauth
                    </ul>
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
{{--                <div  class="default-block default-block_sidebar">--}}
{{--                    <div class="default-block__header">--}}
{{--                        <h3 class="default-block__header-title">Title</h3>--}}
{{--                    </div>--}}

{{--                    <div class="default-block__content">--}}
{{--                        Content--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div id="default-block" class="default-block default-block_sidebar">--}}
{{--                    <div class="telegram">--}}
{{--                        <div class="telegram-head">--}}
{{--                            <img src="{{ asset('images/devhublogo.png') }}" alt="" width="52">--}}
{{--                            <h1>Devhub</h1>--}}
{{--                        </div>--}}
{{--                        <div class="body">--}}
{{--                            --}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div id="default-block" class="default-block default-block_sidebar">
                    <div class="default-block__header">
                        <h3 class="default-block__header-title">Ən izləninən hablar</h3>
                    </div>

                    <div class="default-block__content">
                        <ul>
                            @foreach ($top_followed_hubs as $hub)
                                <li style="display: grid;grid-template-columns: 23% 75%;gap: 3%;margin-bottom: 12px;">
                                    <img class="list-hubs__hub-image-block"
                                         src="{{ strtolower($hub['logo']) ?? '/images/empty/code.png' }}" alt="">
                                    <div class="list-hubs__obj-body">
                                        <div class="block-hubs__title-link">
                                            <a href="/hubs/{{ $hub['id'] ?? '' }}">{{ $hub['name'] ?? '' }}</a></div>
                                        <div class="list-hubs__desc">
                                            <span
                                                    style="font-size: 11px; color: #848d95;">{{ $hub->description[\App::getLocale()] }}</span>
                                            <br>
                                            <span style="font-size: 11px; color: #3b4045;">
                                                <i class="icon feather icon-users"></i> İzləyicilər {{ $hub['hub_followers_count'] ?? '' }}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        const stickyblock = stickybits('#default-block', {
            stickyBitStickyOffset: 10
        });
    </script>
@endsection
