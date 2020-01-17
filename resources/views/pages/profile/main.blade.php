@extends('front.layout')

@section('title'){{ ucfirst($user['username']) }} @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@stop

@section('main')
    <div class="page-profile">
        <div class="profile__left" id="app">
            <div class="profile__info">
                <div class="profile__header">
                    <div class="background">
                        <div class="background__placeholder"
                             style="background-image: url('https://www.elsetge.cat/imagepost/b/77/777342_best-wallpaper-for-facebook.jpg')"></div>
                    </div>
                    <div class="avatar avatar_large image-lazy"><img alt="admin"
                                                                     src="{{ asset('images/profile/deadpool.gif') }}"
                                                                     class="image-loaded"></div>
                </div>
                <div class="profile__user">
                    <div>
                        <h1 class="profile__nick">
                            <span itemprop="additionalName">{{ '@' . $user->username }} {{ $user->name ? ' | ' . $user->name . ' ' . $user->surname : ''}}</span>
                        </h1>
                        <div>
                            {{ $user->about }}
                        </div>
                        <div class="profile__user-information">biznen
                            <time datetime="1977-09-10T13:48:56+03:00"
                                  class="hint">{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</time>
                        </div>
                    </div>
                    <div class="profile__user-button">
                        <button class="btn btn-primary follow">Izlə</button>
                    </div>

                </div>
                <div class="profile__section grid">
                    <span class="profile__digital hint"
                          aria-label="423 760"><b>{{ $user->rating }}</b> <span><span>reyting</span></span></span>
                    <span class="profile__digital hint" aria-label="15 733"><b>{{ $user->followers->count() }}</b> <span>izləyiciler</span></span>
                    <span class="profile__digital"><b>{{ $user->posts->count() }}</b> <span>paylashım</span></span>
                </div>
            </div>

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
            <div id="default-block" class="default-block default-block_sidebar" style="top: 10px; position: sticky;">
                <div class="default-block__header">
                    <h3 class="default-block__header-title">Məlumat</h3>
                </div>

                <div class="default-block__content">
                    Content
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection
