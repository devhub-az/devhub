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
                ></div>
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
                    <h1 class="additionalName">{{ '@' . $user->username }} {{ $user->name ? ' | ' . $user->name . ' ' . $user->surname : ''}}</h1>
                </div>
            </div>
            <div class="profile__user-button">
                <button class="btn btn-primary follow"><i class="mdi mdi-account-plus"></i> Izlə</button>
                <button class="btn btn-outline"><i class="mdi mdi-email"></i> Mesaj</button>
                <button class="btn btn-outline"><i class="mdi mdi-dots-vertical"></i></button>
            </div>
        </div>
        <div class="profile__section grid">
            <span class="profile__digital current"><b>{{ $user->posts->count() }}</b> <span><i
                            class="mdi mdi-file-document-box-multiple-outline"></i> Paylaşım</span></span>
            <span class="profile__digital"><b>{{ $user->rating }}</b> <span><span><i class="mdi mdi-podium-gold"></i> Reyting</span></span></span>
            <span class="profile__digital"><b>{{ $user->karma }}</b> <span><i
                            class="mdi mdi-trending-up"></i> Karma</span></span>
            <span class="profile__digital"><b>12</b> <span><i
                            class="mdi mdi-account-group"></i> Izləyənlər</span></span>
            <span class="profile__digital"><b>12</b> <span><i
                            class="mdi mdi-target-account"></i> Izlənən</span></span>
        </div>
    </div>
    <div class="page-profile">
        <div class="profile__left" id="app">
            <posts
                    :url="'{{ $url }}'"
                    @auth :auth_check="true" @endauth
            ></posts>
        </div>

        <div class="content_right">
            <div class="default-block default-block_sidebar">
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

            <div id="default-block" class="default-block default-block_sidebar">
                <div class="default-block__header">
                    <h3 class="default-block__header-title">Haqqında</h3>
                    <a href="#">ətraflı</a>
                </div>

                <div class="default-block__content">
                    <div class="user-info-blocks">
                        <div class="user-info-block">
                            <div>
                                <i class="mdi mdi-worker"></i> Is yeri:
                            </div>
                            <div class="user-info-answer">
                                DevHub
                            </div>
                        </div>
                        <div class="user-info-block">
                            <div>
                                <i class="mdi mdi-map-marker-radius-outline"></i> Yaşadığı yer:
                            </div>
                            <div class="user-info-answer">
                                Baku, Azerbaijan
                            </div>
                        </div>
                        <div class="user-info-block">
                            <div>
                                <i class="mdi mdi-desk-lamp"></i> Təhsil:
                            </div>
                            <div class="user-info-answer">
                                Baku, Azerbaijan
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
