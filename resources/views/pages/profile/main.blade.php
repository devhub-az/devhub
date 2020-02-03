@extends('front.layout')

@section('title'){{ ucfirst($user['username']) }} @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@stop

@section('main')
    <div class="profile__info">
        <div class="profile__header">
            <div class="background">
                <div class="background__placeholder"
                     style="background-image: url('https://www.elsetge.cat/imagepost/b/77/777342_best-wallpaper-for-facebook.jpg')"></div>
            </div>
        </div>
        <div class="profile__user">
            <div class="avatar avatar_large image-lazy">
                <img alt="admin"
                     src="{{ asset('images/profile/deadpool.gif') }}"
                     class="image-loaded">
            </div>
            <div class="profile__info-name">
                <div class="profile__nick">
                    <h2 class="profile__user-about-content">{{ $user->about }}</h2>
                    <h1 class="additionalName">{{ $user->username }} {{ $user->name ? ' | ' . $user->name . ' ' . $user->surname : ''}}</h1>
                </div>
            </div>
            <div class="profile__user-button">
                <button class="btn"><span class="mdi mdi-email"></span> Mesaj</button>
                <button class="btn btn-primary follow"><span class="mdi mdi-account-plus"></span> Izlə</button>
                <button class="btn"><span class="mdi mdi-dots-vertical"></span> </button>
            </div>
        </div>
        <div class="profile__section grid">
            <span class="profile__digital hint"><b>{{ $user->rating }}</b> <span><span>reyting</span></span></span>
            <span class="profile__digital hint"><b>{{ $user->karma }}</b> <span>Karma</span></span>
            <span class="profile__digital hint"><b>{{ $user->followers->count() }}</b> <span>Izləyənlər</span></span>
            <span class="profile__digital hint"><b>{{ $user->followings->count() }}</b> <span>Izlənən</span></span>
            <span class="profile__digital"><b>{{ $user->posts->count() }}</b> <span>paylashım</span></span>
        </div>
    </div>
    <div class="page-profile">
        <div class="profile__left" id="app">

            <ul class="nav_posts">
                <a href="{{ route('all') }}"
                   class="nav-posts__item @if(Request::url() === route('all')) nav-posts__item-link_current @endif">
                    <span class="nav-posts__item-link">Vaxta görə</span>
                </a>
                <a href="{{ route('home') }}"
                   class="nav-posts__item @if(Request::is('top/*') || Request::is('/')) nav-posts__item-link_current @endif">
                    <span class="nav-posts__item-link">Ən yaxşı</span>
                </a>
            </ul>
            <posts
                    :url="'http://127.0.0.1:8000/api/posts/all'"
                    @auth :auth_check="true" @endauth
            ></posts>
        </div>

        <div class="content_right">
            <div id="default-block" class="default-block default-block_sidebar">
                <div class="default-block__header">
                    <h3 class="default-block__header-title">Mükafatlar (2)</h3>
                </div>

                <div class="default-block__content">
                    <div class="trophy-list">
                        <div class="trophy-list__element">
                            <img src="{{ asset('images\trophies\nomination.svg') }}" alt="">
                            <div class="trophy-info">
                                <div class="trophy-name">
                                    Məşhur
                                </div>
                                <div class="trophy-description">
                                    1000-dən çox baxış yığan
                                </div>
                            </div>
                        </div>
                        <div class="trophy-list__element">
                            <img src="{{ asset('images\trophies\win.svg') }}" alt="" width="40">
                            <div class="trophy-info">
                                <div class="trophy-name">
                                    Bir ill Klub
                                </div>
                                <div class="trophy-description">
                                    Bir ildir ki, DevHub-da.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        const stickyblock = stickybits('#default-block', {
            stickyBitStickyOffset: 10,
        });
    </script>
@endsection
