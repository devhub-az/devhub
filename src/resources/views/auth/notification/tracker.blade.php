@extends('front.layout')

@section('title')Tracker @stop

@section('css')

@stop

@section('main')
    <div class="layout_body">
        <div class="layout_content">
            <div class="content_left" id="app">
                @if (Auth::user()->Notifications->count() > 0)
                    <div style="width: 100%">
                        <h1>Bildirişlər</h1>
                        <a href="{{ route('delete-all-trackers') }}" style="margin-left: auto;">Delete trackers</a>
                    </div>
                    @foreach(Auth::user()->Notifications as $notification)
                        <div class="post-content">
                            <div name="js-notify" class="notification">
                                <span class="notification__image">
                                    <img src="{{ asset('images/profile/deadpool.gif') }}" alt="user avatar" width="40" height="40">
                                </span>
                                <div class="notification__text">
                                    <p name="js-notification-text">
                                        <a href="{{"/users/@" . $notification->data['creator'] }}" class="link-author">{{ $notification->data['creator'] }}</a> yeni paylaşma yazdı:
                                        <a href="/post/{{ $notification->data['id'] }}">{{ $notification->data['title'] }}</a>
                                    </p>
                                    <div class="notification__footer">
                                        {{ Carbon\Carbon::parse($notification->data['created_at'])->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="post-content__item"
                         style="text-align: center; display: grid; grid-gap: 12px;">
                        <span style="font-size: 5rem; opacity: .7;">
                            <img v-lazy="'/images/errors/lazy.png'" alt="" width="250"/>
                        </span>
                        <h3>Bildirişlər yoxdu</h3>
                        Paylaşma
                        <p>Bura belə boş olmasın deyə, paylaşma və şərhlər yazmağa başlayın</p>
                    </div>
                @endif
            </div>
            {{-- Right --}}
            <div class="content_right">
                <div id="default-block" class="default-block default-block_sidebar">
                    <div class="default-block__header">
                        <h3 class="default-block__header-title">Ən sevimli hablar</h3>
                    </div>

                    <div class="default-block__content">
                        <ul>
                            @foreach ($top_hubs as $hub)
                                <a href="/hubs/{{ $hub['id'] ?? '' }}">
                                    <li style="display: grid;grid-template-columns: 23% 75%;gap: 3%;margin-bottom: 12px;">
                                        <img class="list-hubs__hub-image-block"
                                             src="{{ $hub['logo'] ?? '/images/empty/code.png' }}" alt="">
                                        <div class="list-hubs__obj-body">
                                            <div class="block-hubs__title-link">
                                                {{ $hub['name'] }}
                                            </div>
                                            <div class="list-hubs__desc">
                                            <span
                                                    style="font-size: 11px; color: #848d95;">{{ $hub->description[\App::getLocale()] }}</span>
                                                <br>
                                                <span style="font-size: 11px; color: #3b4045;">
                                                <i class="icon feather icon-star"></i> Reyting {{ $hub['rating'] ?? '' }}
                                            </span>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="default-block" class="default-block default-block_sidebar">
                    <div class="default-block__header">
                        <h3 class="default-block__header-title">Ən izləninən hablar</h3>
                    </div>

                    <div class="default-block__content">
                        <ul>
                            @foreach ($top_followed_hubs as $hub)
                                <li style="display: grid;grid-template-columns: 23% 75%;gap: 3%;margin-bottom: 12px;">
                                    <img class="list-hubs__hub-image-block"
                                         src="{{ $hub['logo'] ?? '/images/empty/code.png' }}" alt="">
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
@endsection
