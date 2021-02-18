@extends('layouts.layout')

@section('title'){{ $post->attributes->title }} @stop

@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="{{ $post->attributes->title }}">
@stop

@section('main')
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto">
        <div class="grid grid-cols-1 tb:grid-cols-main lg:grid-cols-main gap-3 md:gap-4 xs:px-4" id="app">
            <div>
                <article-show :slug="'{{ $post->attributes->slug }}'" @auth :auth_check="true" @endauth></article-show>
                <div
                    class="flex justify-between items-center border bg-white dark:bg-dpaper dark:border-gray-700 w-full px-3.5 py-3 rounded">
                    <p class="text-xl dark:text-gray-300">
                        Paylaş
                    </p>
                    <div class="text-2xl gap-2 flex">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"
                           onclick="window.open(this.href, 'Опубликовать ссылку в Facebook', 'width=640,height=436,toolbar=0,status=0'); return false;"
                           title="Опубликовать ссылку в Facebook">
                            <span class="iconify" data-icon="ant-design:facebook-filled" style="color: #3B5998"
                                  data-inline="false"></span>
                        </a>
                        <a href="https://vk.com/share.php?url={{ URL::current() }}"
                           title="Опубликовать ссылку во ВКонтакте"
                           onclick="window.open(this.href, 'Опубликовать ссылку во ВКонтакте', 'width=800,height=300,toolbar=0,status=0'); return false">
                            <span class="iconify" data-icon="bx:bxl-vk" style="color: #2787F5"
                                  data-inline="false"></span>
                        </a>
                        <a href="https://t.me/share/url?url={{ URL::current() }}&amp;title={{ $post->attributes->title }}"
                           title="Поделиться ссылкой в Telegram"
                           onclick="window.open(this.href, 'Поделиться ссылкой в Telegram', 'width=800,height=300,toolbar=0,status=0'); return false">
                            <span class="iconify" data-icon="bx:bxl-telegram" data-inline="false"
                                  style="color: #0088cc"></span>
                        </a>
                    </div>
                </div>
                <comments :slug="'{{ $post->attributes->slug }}'" @auth :auth_check="true"
                          :user="{{ Auth::user() }}" @endauth class="mt-10"></comments>
            </div>

            <div>
                <div
                    class="xs:w-full bg-white rounded dark:bg-dpaper border dark:border-gray-700 overflow-hidden sticky top-0">
                    <div class="px-4 py-2">
                        <div class="flex space-x-2">
                            <img class="w-12 h-12 rounded object-cover"
                                 src="{{ $post->relationships->author->data->attributes->avatar }}" alt="avatar">
                            <a href="{{ route('user_info', $post->relationships->author->data->attributes->username) }}">
                                @if ($post->relationships->author->data->attributes->name)
                                    <p class="text-xl font-medium text-gray-800 dark:text-gray-300">
                                        {{ $post->relationships->author->data->attributes->name }}
                                    </p>
                                    <p class="text-gray-800 dark:text-gray-300">
                                        {{ '@' . $post->relationships->author->data->attributes->username }}
                                    </p>
                                @else
                                    <p class="text-xl font-medium text-gray-800 dark:text-gray-300">
                                        {{ '@' . $post->relationships->author->data->attributes->username }}
                                    </p>
                                @endif
                            </a>
                        </div>
                        <p class="pt-1 text-sm text-gray-700 dark:text-gray-400">
                            {{ $post->relationships->author->data->attributes->description }}
                        </p>
                    </div>
                    <div class="flex mb-2 space-x-2 mx-4">
                        <a href="#"
                           class="btn-outline text-center block leading-6 h-7 w-full">
                            Izləmək
                        </a>
                        <a href="#"
                           class="btn-outline text-center block leading-6 h-7 w-full">
                            Yazmag
                        </a>
                    </div>
                    <div
                        class="flex justify-between bg-afooter dark:bg-gray-800 px-4 py-2 border-t border-b text-gray-700 dark:border-gray-700 w-full">
                        <div class="flex items-center space-x-1">
                            <p class="font-semibold dark:text-gray-300">
                                {{ \Numeric::number_format_short($post->relationships->author->data->attributes->karma) }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Karma</p>
                        </div>
                        <div class="flex items-center space-x-1">
                            <p class="font-semibold dark:text-gray-300">
                                {{ \Numeric::number_format_short($post->relationships->author->data->attributes->rating) }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Reytinq</p>
                        </div>
                        <div class="flex items-center space-x-1">
                            <p class="font-semibold ml-auto dark:text-gray-300">
                                {{ \Numeric::number_format_short($post->relationships->author->data->attributes->user_followers_count) }}
                            </p>
                            <span class="text-sm text-gray-500 dark:text-gray-400">İzləyicilər</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap px-4 h-10 items-center">
                        @if($post->relationships->author->data->attributes->github_url)
                            <a href="#"
                               class="py-1.5 mr-2 font-medium text-sm text-blue-light hover:text-blue-dark dark:text-gray-400">
                                Github
                            </a>
                        @endif
                    </div>
                </div>
                <div class="py-2 dark:text-gray-400 text-xs">
                    Если нашли опечатку в посте, выделите ее и нажмите
                    <span
                        class="bg-gray-300 px-1 dark:text-gray-700 rounded">Ctrl+Enter</span>
                    , чтобы сообщить модераторам.
                </div>
            </div>
        </div>
    </div>
    <div id="modal" class="hidden">
        test
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/article-show.js') }}"></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/article-show.js') }}" as="script">
@endsection
