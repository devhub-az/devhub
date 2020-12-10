@extends('layouts.layout')

@section('title'){{ $post->attributes->title }} @stop

@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="{{ $post->attributes->title }}">
@stop

@section('main')
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 xs:mt-0 lg:mx-auto xl:mx-auto">
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
        <div class="grid grid-cols-1 tb:grid-cols-main lg:grid-cols-main gap-3 md:gap-4" id="app">
            <div>
                <article-show :id="{{ $post->attributes->id }}" @auth :auth_check="true" @endauth></article-show>
                <div class="flex justify-between items-center border bg-white w-full px-3.5 py-3 rounded">
                    <p class="text-xl">
                        Paylaşmaq
                    </p>
                    <div class="text-4xl">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"
                           onclick="window.open(this.href, 'Опубликовать ссылку в Facebook', 'width=640,height=436,toolbar=0,status=0'); return false;"
                           title="Опубликовать ссылку в Facebook">
                            <i class=" mdi mdi-facebook" style="color: #3B5998"></i>
                        </a>
                        <a href="https://vk.com/share.php?url={{ URL::current() }}"
                           title="Опубликовать ссылку во ВКонтакте"
                           onclick="window.open(this.href, 'Опубликовать ссылку во ВКонтакте', 'width=800,height=300,toolbar=0,status=0'); return false">
                            <i class="mdi mdi-vk" style="color: #2787F5"></i>
                        </a>
                        <a href="https://t.me/share/url?url={{ URL::current() }}&amp;title={{ $post->attributes->title }}"
                           title="Поделиться ссылкой в Telegram"
                           onclick="window.open(this.href, 'Поделиться ссылкой в Telegram', 'width=800,height=300,toolbar=0,status=0'); return false">
                            <i class="mdi mdi-telegram" style="color: #0088cc"></i>
                        </a>
                    </div>
                </div>
                {{--                <comments :id="{{ $post->id }}" @auth :auth_check="true"--}}
                {{--                          :user="{{ Auth::user() }}" @endauth ></comments>--}}
            </div>

            <div>
                <div class="bg-white border rounded-lg">
                    <div class="bg-cover bg-center p-8 rounded-t h-20"
                         style="background: url('https://unsplash.imgix.net/45/ZLSw0SXxThSrkXRIiCdT_DSC_0345.jpg?q=75&w=1080&h=1080&fit=max&fm=jpg&auto=form')"></div>
                    <div class="px-8 py-6 relative">
                        <div
                            class="absolute top-0 left-1/2 transform -translate-y-1/2 -translate-x-1/2 h-20 w-20 bg-cover rounded border-2 bg-white border-white"
                            style="background-image: url({{ $post->relationships->author->data->attributes->avatar }});"></div>
                        <div class="mt-10 text-sm"><span class="text-gray-500 font-semibold">From</span> Feb 08
                            <span
                                class="text-gray-500 font-semibold">To</span> Feb 14
                        </div>
                        <div class="mt-6">
                            <div class="uppercase font-bold text-gray-600">Your Coupon Code</div>
                            <div class="uppercase mt-2 text-indigo-500 font-black text-2xl leading-none">
                                TailwindCSS2020
                            </div>
                        </div>
                        <div class="mt-6 text-gray-500 text-sm">Coupon only valid on select UI Components &amp; once
                            per
                            user
                        </div>
                    </div>
                    <div>
                        <button
                            class="w-full border border-transparent rounded-b-lg font-semibold tracking-wide px-5 py-4 focus:outline-none focus:shadow-outline bg-indigo-500 text-gray-100 hover:bg-indigo-600 hover:text-gray-200">
                            Use Coupon Code
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{--            <div id="sticky-block" class="content_right">--}}
        {{--                <div class="card">--}}
        {{--                    <div class="card-header border-0 p-2 pb-0">--}}
        {{--                        <div class="cover-img-block">--}}
        {{--                            <img--}}
        {{--                                src="https://unsplash.imgix.net/45/ZLSw0SXxThSrkXRIiCdT_DSC_0345.jpg?q=75&w=1080&h=1080&fit=max&fm=jpg&auto=form"--}}
        {{--                                alt="" class="img-fluid">--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="card-body pt-0">--}}
        {{--                        <div class="user-about-block">--}}
        {{--                            <div class="row align-items-end">--}}
        {{--                                <div class="col col-left">--}}
        {{--                                    --}}{{--                                    <user-follow-button :user="{!! $post->creator !!}"--}}
        {{--                                    --}}{{--                                                        :id="{{ $post->creator->id }}"--}}
        {{--                                    --}}{{--                                                        @auth :auth_check="true" @endauth></user-follow-button>--}}
        {{--                                    <span class="btn btn-primary">--}}
        {{--                                        <i class="mdi mdi-account-plus"></i> İzləmək--}}
        {{--                                    </span>--}}
        {{--                                </div>--}}
        {{--                                <div class="col">--}}
        {{--                                    <div class="position-relative d-inline-block">--}}
        {{--                                        <img class="img-radius img-fluid wid-80"--}}
        {{--                                             src="{{ asset('images/profile/deadpool.gif') }}" alt="User image">--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="col col-right"></div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="text-center">--}}
        {{--                            <h6 class="mb-1 mt-3">Josephin Doe</h6>--}}
        {{--                            <p class="mb-3 text-muted">UI/UX Designer</p>--}}
        {{--                            <p class="mb-1">Lorem Ipsum is simply dummy text</p>--}}
        {{--                            <p class="mb-0">been the industry's standard</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="card-footer">--}}
        {{--                        <div class="row text-center">--}}
        {{--                            <div class="col">--}}
        {{--                                <h6 class="mb-1">{{ $post->relationships->author->data->attributes->karma }}</h6>--}}
        {{--                                <p class="mb-0">Karma</p>--}}
        {{--                            </div>--}}
        {{--                            <div class="col">--}}
        {{--                                <h6 class="mb-1">{{ $post->relationships->author->data->attributes->rating }}</h6>--}}
        {{--                                <p class="mb-0">Reytinq</p>--}}
        {{--                            </div>--}}
        {{--                            <div class="col">--}}
        {{--                                <h6 class="mb-1">{{ $post->relationships->author->data->attributes->user_followers_count }}</h6>--}}
        {{--                                <p class="mb-0">İzləyicilər</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/article-show.js') }}"></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/article-show.js') }}" as="script">
@endsection
