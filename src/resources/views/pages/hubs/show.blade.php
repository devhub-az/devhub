@extends('front.layout')

@section('title'){{ $hub['name'] }} @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@stop

@section('main')
    <div id="app">
        <div class="hub-block">
            <div class="hub-page__header">
                @if (isset($hub['logo']))
                    <img class="list-hubs__hub-image" src="{{ asset($hub['logo']) }}" alt="">
                @else
                    <img class="list-hubs__hub-image" src="{{ asset('/images/empty/code.png') }}" alt="">
                @endif
                <div class="list-hubs__obj-body">
                    <div class="list-hubs__title-link">
                        {{ $hub['name'] }}
                    </div>
                    <div class="list-hubs__desc">{{ $hub['description'][session()->get('lang')] }}</div>
                </div>
                <div class="list-hubs__stats">
                    <div class="list-hubs__stats-value">{{ $posts_count }}</div>
                    <small>Paylaşım</small>
                </div>
                <div class="list-hubs__stats">
                    <div class="list-hubs__stats-value">
                        {{ $hub['rating'] }}
                    </div>
                    <small>REYTINQ</small>
                </div>
                <div class="hub_follow">
                    <hub-follow-button :hub="{{ json_encode($hub) }}" @auth :auth_check="true" @endauth></hub-follow-button>
                </div>
            </div>
        </div>
        <div class="layout_body">
            <div class="layout_content">
                <div class="content-left">
                    <div class="header">
                        <ul class="nav_posts">
                            <a href="{{ url('hubs/'. $hub->id) }}"
                               class="nav-posts__item @if(Request::is('hubs/'. $hub->id)) nav-posts__item-link_current @endif">
                                <span class="nav-posts__item-link">Ən yaxşı</span>
                            </a>
                            <a href="{{ url('hubs/'. $hub->id .'/all') }}"
                               class="nav-posts__item @if(Request::is('hubs/'. $hub->id .'/all')) nav-posts__item-link_current @endif">
                                <span class="nav-posts__item-link">Bütün yazılar</span>
                            </a>
                        </ul>
                    </div>
                    @if (Request::is('hubs/'. $hub->id .'/top/*') || Request::is('hubs/'. $hub->id))
                        <div class="tabs__level tabs__level_bottom">
                            <ul class="toggle-menu ">
                                <li class="toggle-menu__item">
                                    <a href="{{ url('hubs/'. $hub->id) }}"
                                       class="toggle-menu__item-link @if(Request::is('hubs/'. $hub->id)) toggle-menu__item-link_active @endif"
                                       rel="nofollow" title="Лучшие публикации за сутки">
                                        Gün
                                    </a>
                                </li>
                                <li class="toggle-menu__item">
                                    <a href="{{ url('hubs/'. $hub->id  .'/top/week') }}"
                                       class="toggle-menu__item-link @if(Request::url() === url('hubs/'. $hub->id  .'/top/week')) toggle-menu__item-link_active @endif"
                                       rel="nofollow" title="Лучшие публикации за неделю">
                                        Həftə
                                    </a>
                                </li>
                                <li class="toggle-menu__item">
                                    <a href="{{ url('hubs/'. $hub->id  .    '/top/month') }}"
                                       class="toggle-menu__item-link @if(Request::url() === url('hubs/'. $hub->id  .'/top/month')) toggle-menu__item-link_active @endif"
                                       rel="nofollow" title="Лучшие публикации за месяц">
                                        Ay
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                    <posts :url="'{{ $url }}'" @auth :auth_check="true" @endauth></posts>
                </div>

                {{-- Right --}}
                <div class="content_right">
                    <div id="default-block" class="default-block default-block_sidebar">
                        <div class="default-block__header">
                            <h3 class="default-block__header-title">Title</h3>
                        </div>

                        <div class="default-block__content">
                            Content
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
