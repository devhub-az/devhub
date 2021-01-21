@extends('layouts.layout')

@section('title'){{ $hub['name'] }} @stop

@section('main')
    <div id="app">
        <div class="w-full bg-gray-200 dark:bg-dpaper">
            <div class="lg:container xl:container flex justify-between mx-4 py-8 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4">
                <div class="w-9/12 flex">
                    @if (isset($hub['logo']))
                        <img class="rounded xs:h-16 xs:w-16 w-24 h-24" src="{{ asset(strtolower($hub['logo'])) }}" alt="">
                    @else
                        <img class="rounded xs:h-16 xs:w-16 w-24 h-24" src="{{ asset('/images/empty/code.png') }}" alt="">
                    @endif
                    <div class="ml-2">
                        <div class="text-xl">
                            {{ $hub['name'] }}
                        </div>
{{--                        <div class="text-sm text-shadow dark:text-gray-300 xs:text-xs mt-2">{{ $hub['description'][session()->get('lang')] }}</div>--}}
                    </div>
                </div>
                <div class="flex py-2">
                    <div>
                        <div class="text-center text-xl xs:text-sm font-medium dark:text-gray-300"
                             title="{{ $articles_count }}">
                            {{ \Numeric::number_format_short($articles_count) }}
                        </div>
                        <div class="text-sm text-shadow xs:text-xs font-light dark:text-gray-300">Karma</div>
                    </div>
                    <div class="ml-4">
                        <div class="text-center text-xl xs:text-sm font-medium dark:text-gray-300"
                             title="{{ $hub->rating }}">{{ \Numeric::number_format_short($hub->rating) }}</div>
                        <div class="text-sm text-shadow xs:text-xs font-light dark:text-gray-300">Reytinq</div>
                    </div>
                </div>
{{--                <div class="hub_follow">--}}
{{--                    <hub-follow-button :hub="{{ json_encode($hub) }}" @auth :auth_check="true" @endauth></hub-follow-button>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4">
            <div class="layout_body">
                <div class="layout_content">
                    <select-menu
                        :menu="[
                            {'name': 'Trendlər', 'icon': 'bx:bxs-hot', 'url': '/'},
                            {'name': 'Təzə', 'icon': 'ant-design:clock-circle-outlined', 'url': '/all'},
                            {'name': 'Abunə ilə', 'icon': 'mdi:book-multiple', 'url': '/favorite'}
                        ]"
                        @if (Request::is('top/*') || Request::is('/'))
                        :selected="{'name': 'Trendlər', 'icon': 'bx:bxs-hot'}"
                        @elseif (Request::url() === route('all'))
                        :selected="{'name': 'Təzə', 'icon': 'ant-design:clock-circle-outlined'}"
                        @elseif (Request::url() === route('favorite'))
                        :selected="{'name': 'Abunə ilə', 'icon': 'mdi:book-multiple'}"
                        @endif
                    ></select-menu>

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
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/home.js') }}"></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/home.js') }}" as="script">
@endsection
