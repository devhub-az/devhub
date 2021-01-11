@extends('layouts.layout')

@section('title')Əsas səhifə@stop

@section('main')
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto" id="app">
        <div class="flex gap-3 tb:grid-cols-main lg:grid-cols-main xs:block gap-3 md:gap-4">
            <div class="w-left xs:w-full">
                <div class="mb-4 overflow-hidden">
                    <div class="grid grid-cols-auto-fit font-semibold text-sm">
                        <a href="{{ route('home') }}"
                           class="text-center w-full py-2 px-0 border-b-2 border-solid mx-auto {{ (Request::is('top/*') || Request::is('/')) ? 'bottom-0 border-cerulean-500 text-cerulean-500 dark:border-cerulean-200 dark:text-cerulean-200' : 'text-gray-500 dark:text-gray-400 border-gray-300 dark:border-gray-700 dark:hover:border-gray-600 dark:hover:text-gray-300 hover:text-cerulean-500 hover:border-cerulean-500' }}">
                            Ən yaxşı
                        </a>
                        <a href="{{ route('all') }}"
                           class="text-center w-full py-2 px-0 border-b-2 border-solid  mx-auto {{ Request::url() === route('all') ? 'bottom-0 border-cerulean-500 text-cerulean-500 dark:border-cerulean-200 dark:text-cerulean-200' : 'text-gray-500 dark:text-gray-400 border-gray-300 dark:border-gray-700 dark:hover:border-gray-600 dark:hover:text-gray-300 hover:text-cerulean-500 hover:border-cerulean-500' }}">
                            Bütün
                        </a>
                        @auth
                            <a href="{{ route('favorite') }}"
                               class="text-center w-full py-2 px-0 border-b-2 border-solid mx-auto {{ Request::url() === route('favorite') ? 'bottom-0 border-cerulean-500 text-cerulean-500 dark:border-cerulean-200 dark:text-cerulean-200' : 'text-gray-500 dark:text-gray-400 border-gray-300 dark:border-gray-700 dark:hover:border-gray-600 dark:hover:text-gray-300 hover:text-cerulean-500 hover:border-cerulean-500' }}">
                                <span class="relative">
                                    Abunə ilə
                                    @if (Auth::user()->unreadNotifications->where('type', '!=', App\Notifications\MessageReceived::class)->count() > 0)
                                        <span class="flex h-2 w-2 absolute -top-1 -right-1">
                                            <span
                                                class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-cerulean-400 opacity-75"></span>
                                            <span
                                                class="relative inline-flex rounded-full h-2 w-2 bg-cerulean-500"></span>
                                        </span>
                                    @endif
                                </span>
                            </a>
                        @endauth
                    </div>
                </div>
                @if (Request::is('top/*') || Request::is('/'))
                    <div
                        class="flex pb-2 xs:grid md:grid md:grid-flow-col md:text-center sm:grid sm:grid-flow-col sm:text-center xs:grid-flow-col xs:text-center">
                        <a href="{{ url('/') }}"
                           class="border py-1 px-3 rounded-l xs:rounded-l-none dark:text-gray-300 hover:border-cerulean-700 {{ Request::url() === url('/') ? 'border-cerulean-700 dark:border-cerulean-200' : 'dark:border-gray-700' }}"
                           rel="nofollow" title="Günün ən yaxşı paylaşmaları">
                            Gün
                        </a>
                        <a href="{{ url('top/week') }}"
                           class="border py-1 px-3 hover:border-cerulean-700 dark:text-gray-300 {{ Request::url() === url('top/week')  ? 'border-cerulean-700 dark:border-cerulean-200' : 'dark:border-gray-700' }}"
                           rel="nofollow" title="Həftənin ən yaxşı paylaşmaları">
                            Həftə
                        </a>
                        <a href="{{ url('top/month') }}"
                           class="border py-1 px-3 rounded-r xs:rounded-r-none hover:border-cerulean-700 dark:text-gray-300 {{ Request::url() === url('top/month')  ? 'border-cerulean-700 dark:border-cerulean-200' : 'dark:border-gray-700' }}"
                           rel="nofollow" title="Ayın ən yaxşı paylaşmaları">
                            Ay
                        </a>
                    </div>
                @endif
                <posts
                    :url="'{{ $url }}'"
                    @auth :auth_check="true" @endauth
                ></posts>
            </div>

            {{-- Right --}}
            <div class="w-right xs:w-full">
                <div class="sticky top-2">
                    <a href="{{ route('create_article') }}"
                       class="border leading-10 text-sm flex justify-center block items-center xs:hidden border-cerulean-200 w-full dark:bg-cerulean-700 dark:border-cerulean-700 xs:block xs:text-center xs:py-2 xs:w-full uppercase text-xs rounded text-gray-100 bg-cerulean-200 hover:opacity-90">
                        <i class="iconify text-lg" data-icon="mdi-plus"></i> <p class="ml-1">Paylaşmaq</p>
                    </a>
                    <a class="grid grid-flow-col border rounded p-4 my-2 bg-white dark:bg-transparent dark:border-gray-700 hover:border-cerulean-700 dark:hover:border-cerulean-700"
                       href="https://t.me/devhub_az" target="_blank"
                       rel="noopener">
                        <div>
                            <div
                                class="text-gray-900 dark:text-gray-300 text-2xl pr-2 xs:border-none font-semibold md:text-2xl m-auto dark:text-gray-300">
                                DevHub
                            </div>
                            <p class="text-sm dark:text-gray-300">Telegram kanalı <br> izləmək</p>
                        </div>
                        <svg class="ml-auto" width="100px" height="100px" viewBox="0 0 50 50" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <linearGradient x1="66.67%" y1="16.67%" x2="41.67%" y2="75%" id="linearGradient-1">
                                    <stop stop-color="#37AEE2" offset="0%"></stop>
                                    <stop stop-color="#1E96C8" offset="100%"></stop>
                                </linearGradient>
                                <linearGradient x1="61.2346759%" y1="43.69%" x2="74.7064382%" y2="80.24%"
                                                id="linearGradient-2">
                                    <stop stop-color="#EFF7FC" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </linearGradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="banner/normal" transform="translate(-177.000000, -18.000000)" fill-rule="nonzero">
                                    <g id="logo/tg" transform="translate(177.000000, 18.000000)">
                                        <circle id="shape" fill="url(#linearGradient-1)" cx="25" cy="25" r="25"></circle>
                                        <path
                                            d="M20.4166667,36.4583333 C19.60675,36.4583333 19.744375,36.1525208 19.4650417,35.3813542 L17.0833333,27.5428958 L35.4166667,16.6666667"
                                            id="body-right" fill="#C8DAEA"></path>
                                        <path
                                            d="M20.4166667,36.4583333 C21.0416667,36.4583333 21.3178125,36.1725 21.6666667,35.8333333 L25,32.5920833 L20.8420833,30.0847917"
                                            id="body-left" fill="#A9C9DD"></path>
                                        <path
                                            d="M20.8416667,30.0854167 L30.9166667,37.5289583 C32.0663542,38.1633125 32.896125,37.834875 33.1825,36.4615625 L37.2835417,17.1359375 C37.7034167,15.4525625 36.6418542,14.6890625 35.542,15.1883958 L11.46075,24.4740208 C9.81697917,25.1333333 9.8265625,26.0503958 11.161125,26.4590208 L17.3409167,28.3878333 L31.6477917,19.3617917 C32.3231875,18.9522292 32.9430625,19.1724187 32.4342917,19.6239583"
                                            id="wings" fill="url(#linearGradient-2)"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <div class="mb-5 rounded border dark:border-gray-700 sticky top-2">
                        <div
                            class="px-5 h-10 border-b rounded-t items-center flex dark:border-gray-700 dark:bg-gray-800">
                            <p class="m-0 text-sm items-center dark:text-gray-300">Ən izləninən hablar</p>
                        </div>

                        <div class="overflow-hidden bg-white dark:bg-transparent text-black px-5 py-2">
                            @foreach ($top_followed_hubs as $hub)
                                <div class="flex gap-3 mb-2">
                                    <img src="{{'/' . strtolower($hub['logo']) ?? '/images/empty/code.png' }}"
                                         alt="hub image" class="w-12 h-12">
                                    <div>
                                        <p class="font-semibold dark:text-gray-300">
                                            {{ $hub['name'] }}
                                        </p>
                                        <span class="text-xs dark:text-gray-300">
                                            <i class="icon feather icon-users"></i>
                                            İzləyicilər {{ $hub['rating'] ?? '' }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
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
