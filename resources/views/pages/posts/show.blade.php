@extends('layouts.layout')

@section('title'){{ $post->title }} @stop

@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="{{ $post->title }}">
@stop

@section('main')
    <div class="layout_body">
        {{--        <header>--}}
        {{--            <div class="page-header__banner">--}}
        {{--                <a href="https://hh.ru/employer/1212374" target="_blank">--}}
        {{--                    <div class="company_banner" style="background-image: url({{ asset('images/wallpaper/baku.jpg') }})"--}}
        {{--                         alt="company_banner"></div>--}}
        {{--                </a>--}}
        {{--            </div>--}}
        {{--            <div class="page-header page-header_small page-header_bordered" id="company_2198">--}}
        {{--                <div class="page-header_wrapper">--}}
        {{--                    <div class="media-obj media-obj_company">--}}
        {{--                        <a href="/company/funcorp/" class="media-obj__image page-header__image">--}}
        {{--                            <img src="{{ asset('images/profile/new_user/1.svg') }}" width="48" height="48"--}}
        {{--                                 class="company-info__image-pic">--}}
        {{--                        </a>--}}
        {{--                        <div class="media-obj__body media-obj__body_page-header media-obj__body_page-header_branding">--}}
        {{--                            <div class="page-header__info">--}}
        {{--                                <div class="page-header__info-title">FunCorp</div>--}}
        {{--                                <sup class="page-header__stats-value page-header__stats-value_branding"--}}
        {{--                                     title="Рейтинг компании">399,64</sup>--}}
        {{--                                <div class="page-header__info-desc">--}}
        {{--                                    Разработка развлекательных сервисов--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="page-header__buttons">--}}
        {{--                        <button type="button" class="page-header__button btn" data-id="2198" data-state="follow">--}}
        {{--                                    <span class="btn__value"><i--}}
        {{--                                                class="icon feather icon-user-plus"></i> Abunə olun <span--}}
        {{--                                                class="folowers">{{ \Numeric::number_format_short(123) }}</span></span>--}}
        {{--                        </button>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </header>--}}
        <div class="layout_content" id="app">
            <div class="post_left">
                <post-show :id="{{ $post->id }}" @auth :auth_check="true" @endauth></post-show>
                <div class="post-share">
                    <span class="post-share__title"><i class="icon feather icon-share"></i> Paylaş</span>
                    <ul class="post-share__buttons social-icons">
                        <li class="social-icons__item social-icons__item_post">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"
                               class="social-icons__item-link social-icons__item-link_normal social-icons__item-link_facebook"
                               title="Опубликовать ссылку в Facebook"
                               onclick="window.open(this.href, 'Опубликовать ссылку в Facebook', 'width=640,height=436,toolbar=0,status=0'); return false">
                                <svg class="icon-svg" aria-hidden="true" aria-labelledby="title" version="1.1"
                                     role="img" width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                            d="M14.889 8.608h-1.65c-.195 0-.413.257-.413.6v1.192h2.063v1.698h-2.063v5.102h-1.948v-5.102h-1.766v-1.698h1.766v-1c0-1.434.995-2.6 2.361-2.6h1.65v1.808z"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="social-icons__item social-icons__item_post">
                            <a href="https://vk.com/share.php?url={{ URL::current() }}"
                               class="social-icons__item-link social-icons__item-link_normal social-icons__item-link_vkontakte"
                               title="Опубликовать ссылку во ВКонтакте"
                               onclick="window.open(this.href, 'Опубликовать ссылку во ВКонтакте', 'width=800,height=300,toolbar=0,status=0'); return false">
                                <svg class="icon-svg" aria-hidden="true" aria-labelledby="title" version="1.1"
                                     role="img" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M16.066 11.93s1.62-2.286 1.782-3.037c.054-.268-.064-.418-.343-.418h-1.406c-.322 0-.44.139-.537.343 0 0-.76 1.619-1.685 2.64-.297.33-.448.429-.612.429-.132 0-.193-.11-.193-.408v-2.607c0-.365-.043-.472-.343-.472h-2.254c-.172 0-.279.1-.279.236 0 .343.526.421.526 1.352v1.921c0 .386-.022.537-.204.537-.483 0-1.631-1.663-2.274-3.552-.129-.386-.268-.494-.633-.494h-1.406c-.204 0-.354.139-.354.343 0 .375.44 2.114 2.167 4.442 1.159 1.566 2.683 2.414 4.056 2.414.838 0 1.041-.139 1.041-.494v-1.202c0-.301.118-.429.29-.429.193 0 .534.062 1.33.848.945.901 1.01 1.276 1.525 1.276h1.578c.161 0 .311-.075.311-.343 0-.354-.462-.987-1.17-1.738-.29-.386-.762-.805-.912-.998-.215-.226-.151-.354-.001-.59z"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="social-icons__item social-icons__item_post">
                            <a href="https://t.me/share/url?url={{ URL::current() }}&amp;title={{ $post->title }}"
                               class="social-icons__item-link social-icons__item-link_normal social-icons__item-link_telegram"
                               title="Поделиться ссылкой в Telegram"
                               onclick="window.open(this.href, 'Поделиться ссылкой в Telegram', 'width=800,height=300,toolbar=0,status=0'); return false">
                                <svg class="icon-svg" aria-hidden="true" aria-labelledby="title" version="1.1"
                                     role="img" width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                            d="M17.17 7.621l-10.498 3.699c-.169.059-.206.205-.006.286l2.257.904 1.338.536 6.531-4.796s.189.057.125.126l-4.68 5.062-.27.299.356.192 2.962 1.594c.173.093.397.016.447-.199.058-.254 1.691-7.29 1.728-7.447.047-.204-.087-.328-.291-.256zm-6.922 8.637c0 .147.082.188.197.084l1.694-1.522-1.891-.978v2.416z"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
{{--                <comments :id="{{ $post->id }}" @auth :auth_check="true"--}}
{{--                          :user="{{ Auth::user() }}" @endauth ></comments>--}}
            </div>

            <div id="sticky-block" class="content_right">
                <div class="card">
                    <div class="card-header border-0 p-2 pb-0">
                        <div class="cover-img-block">
                            <img src="https://unsplash.imgix.net/45/ZLSw0SXxThSrkXRIiCdT_DSC_0345.jpg?q=75&w=1080&h=1080&fit=max&fm=jpg&auto=form"
                                 alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="user-about-block">
                            <div class="row align-items-end">
                                <div class="col col-left">
                                    {{--                                    <user-follow-button :user="{!! $post->creator !!}"--}}
                                    {{--                                                        :id="{{ $post->creator->id }}"--}}
                                    {{--                                                        @auth :auth_check="true" @endauth></user-follow-button>--}}
                                    <span class="btn btn-primary">
                                        <i class="mdi mdi-account-plus"></i> İzləmək
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="position-relative d-inline-block">
                                        <img class="img-radius img-fluid wid-80"
                                             src="{{ asset('images/profile/deadpool.gif') }}" alt="User image">
                                    </div>
                                </div>
                                <div class="col col-right"></div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h6 class="mb-1 mt-3">Josephin Doe</h6>
                            <p class="mb-3 text-muted">UI/UX Designer</p>
                            <p class="mb-1">Lorem Ipsum is simply dummy text</p>
                            <p class="mb-0">been the industry's standard</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row text-center">
                            <div class="col">
                                <h6 class="mb-1">{{ $post->creator->karma }}</h6>
                                <p class="mb-0">Karma</p>
                            </div>
                            <div class="col">
                                <h6 class="mb-1">{{ $post->creator->rating }}</h6>
                                <p class="mb-0">Reytinq</p>
                            </div>
                            <div class="col">
                                <h6 class="mb-1">{{ $post->creator->user_followers_count }}</h6>
                                <p class="mb-0">İzləyicilər</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
