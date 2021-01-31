@extends('layouts.layout')

@section('title'){{ $post->attributes->title }} @stop

@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="{{ $post->attributes->title }}">
@stop

@section('main')
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 xs:mt-0 lg:mx-auto xl:mx-auto">
        <div class="grid grid-cols-1 tb:grid-cols-main lg:grid-cols-main gap-3 md:gap-4" id="app">
            <div>
                <article-show :id="'{{ $post->attributes->id }}'" @auth :auth_check="true" @endauth></article-show>
                <div class="flex justify-between items-center border bg-white dark:bg-dpaper dark:border-gray-700 w-full px-3.5 py-3 rounded">
                    <p class="text-xl dark:text-gray-300">
                        Paylaş
                    </p>
                    <div class="text-2xl gap-2 flex">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"
                           onclick="window.open(this.href, 'Опубликовать ссылку в Facebook', 'width=640,height=436,toolbar=0,status=0'); return false;"
                           title="Опубликовать ссылку в Facebook">
                            <span class="iconify" data-icon="ant-design:facebook-filled" style="color: #3B5998" data-inline="false"></span>
                        </a>
                        <a href="https://vk.com/share.php?url={{ URL::current() }}"
                           title="Опубликовать ссылку во ВКонтакте"
                           onclick="window.open(this.href, 'Опубликовать ссылку во ВКонтакте', 'width=800,height=300,toolbar=0,status=0'); return false">
                            <span class="iconify" data-icon="bx:bxl-vk" style="color: #2787F5" data-inline="false"></span>
                        </a>
                        <a href="https://t.me/share/url?url={{ URL::current() }}&amp;title={{ $post->attributes->title }}"
                           title="Поделиться ссылкой в Telegram"
                           onclick="window.open(this.href, 'Поделиться ссылкой в Telegram', 'width=800,height=300,toolbar=0,status=0'); return false">
                            <span class="iconify" data-icon="bx:bxl-telegram" data-inline="false" style="color: #0088cc"></span>
                        </a>
                    </div>
                </div>
                {{--                <comments :id="{{ $post->id }}" @auth :auth_check="true"--}}
                {{--                          :user="{{ Auth::user() }}" @endauth ></comments>--}}
            </div>


            <div>
                <div class="xs:w-full bg-white rounded dark:bg-dpaper border dark:border-gray-700 overflow-hidden sticky top-0">
                    <div class="flex px-4 py-2">
                        <img class="w-16 h-16 rounded object-cover"
                             src="{{ $post->relationships->author->data->attributes->avatar }}" alt="avatar">
                        <div class="ml-2">
                            <p class="text-xl font-medium text-gray-800 dark:text-gray-300">
                                {{ $post->relationships->author->data->attributes->name ?? '' }}
                                {{ $post->relationships->author->data->attributes->surname ?? '' }}
                                {{ '@' . $post->relationships->author->data->attributes->username }}
                            </p>
                            <p class="pt-2 text-sm text-gray-700 dark:text-gray-400">
                                {{ $post->relationships->author->data->attributes->description }}
                            </p>
                        </div>
                    </div>
                    <div class="flex mb-2 mx-4">
                        <a href="#"
                           class="py-1.5 dark:text-gray-400 mr-2 my-1 w-1/2 font-medium text-sm border rounded text-blue-light border-blue-light text-center hover:bg-blue-light hover:text-white">
                            Izləmək
                        </a>
                        <a href="#"
                           class="py-1.5 dark:text-gray-400 ml-2 my-1 w-1/2 font-medium text-sm border rounded text-gray-500 text-center hover:text-gray-600 hover:border-gray-600">
                            Yazmag
                        </a>
                    </div>
                    <div class="flex justify-between px-4 py-2 border-t border-b text-gray-700 dark:border-gray-700 w-full">
                        <div class="w-1/3 flex items-center">
                            <p class="text-xl font-semibold dark:text-gray-300">
                                {{ \Numeric::number_format_short($post->relationships->author->data->attributes->karma) }}
                            </p>
                            <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Karma</p>
                        </div>
                        <div class="w-1/3 flex items-center justify-center">
                            <p class="text-xl font-semibold dark:text-gray-300">
                                {{ \Numeric::number_format_short($post->relationships->author->data->attributes->rating) }}
                            </p>
                            <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Reytinq</p>
                        </div>
                        <div class="w-1/3 flex items-center">
                            <p class="text-xl font-semibold ml-auto dark:text-gray-300">
                                {{ \Numeric::number_format_short($post->relationships->author->data->attributes->user_followers_count) }}
                            </p>
                            <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">İzləyicilər</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap px-4 py-1">
                        @if($post->relationships->author->data->attributes->github_url)
                            <a href="#" class="py-1.5 mr-2 my-1 font-medium text-sm text-blue-light hover:text-blue-dark dark:text-gray-400">
                                Github
                            </a>
                        @endif
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
