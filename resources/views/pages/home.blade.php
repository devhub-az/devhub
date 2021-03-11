@extends('layouts.layout')

@section('title'){{ __('devhub.homePage') }}@stop

@section('main')
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4" id="app">
        <div class="flex gap-3 xs:block md:gap-4">
            <div class="w-left xs:w-full">
                @guest()
                    <div
                        class="p-5 mb-4 border dark:border-gray-700 rounded flex justify-between xs:block"
                        style="background: linear-gradient(270deg, #356599, #346497, #336192, #315c8c, #2e5885, #2c537f, #2b507a, #2a4f78);">
                        <div class="xs:mb-2">
                            <div class="text-2xl flex items-center space-x-1 mb-1">
                                <p class="text-white">
                                    <span
                                    class="inline-block align-middle text-xs border rounded-3xl border-green-500 px-2 py-0.5 font-medium">{{ __('devhub.beta') }}</span>
                                    {{ __('devhub.welcome') }}
                                </p>
                            </div>
                            <p class="text-white">{{ __('devhub.welcomeText') }}</p>
                        </div>
                        <a id="trans-none" href="{{ route('register') }}"
                           class="btn shadow-lg xs:block px-4 font-medium my-auto xs:py-2 xs:text-center xs:w-full xs:m-0">
                            {{ __('devhub.connect') }}
                        </a>
                    </div>
                @endguest
                <div class="mb-2 flex items-center justify-between dark:border-gray-700">
                    <div class="flex items-center space-x-1 font-medium text-gray-700 dark:text-gray-400 xs:pr-2">
                        <span class="iconify" data-icon="mdi:newspaper-variant-multiple-outline"
                              data-inline="false"></span>
                        <p class="transition-none xs:text-base">{{ __('devhub.articles') }}</p>
                    </div>
                    <select-menu
                        :menu="[
                            {'name': '{{ __('devhub.trends') }}', 'icon': 'bx:bxs-hot', 'url': '/'},
                            {'name': '{{ __('devhub.articlesNew') }}', 'icon': 'ant-design:clock-circle-outlined', 'url': '/all'},
                            {'name': '{{ __('devhub.articlesFollowing') }}', 'icon': 'mdi:book-multiple', 'url': '/favorite'}
                            ]"
                        @if (Request::is('top/*') || Request::is('/'))
                        :selected="{'name': '{{ __('devhub.trends') }}', 'icon': 'bx:bxs-hot'}"
                        @elseif (Request::url() === route('all'))
                        :selected="{'name': '{{ __('devhub.articlesNew') }}', 'icon': 'ant-design:clock-circle-outlined'}"
                        @elseif (Request::url() === route('favorite'))
                        :selected="{'name': '{{ __('devhub.articlesFollowing') }}', 'icon': 'mdi:book-multiple'}"
                        @endif
                    ></select-menu>
                </div>
                @if (Request::is('top/*') || Request::is('/'))
                    <div
                        class="flex pb-2 rounded sm:text-center xs:text-center">
                        <a href="{{ url('/') }}"
                           class="border xs:w-full px-3 rounded-l xs:rounded-l-none hover:border-cerulean-700 dark:hover:border-cerulean-200 {{ Request::url() === url('/') ? 'border-cerulean-700 bg-cerulean-100 text-white dark:text-cerulean-200 dark:bg-cerulean-900 dark:border-cerulean-200' : 'dark:text-gray-300 dark:bg-gray-800 bg-afooter dark:border-gray-700' }}"
                           rel="nofollow" title="Günün ən yaxşı paylaşmaları">
                            {{ __('devhub.day') }}
                        </a>
                        <a href="{{ url('top/week') }}"
                           class="border xs:w-full px-3 xs:rounded-l-none hover:border-cerulean-700 dark:hover:border-cerulean-200 {{ Request::url() === url('top/week')  ? 'border-cerulean-700 bg-cerulean-100 text-white dark:text-cerulean-200 dark:bg-cerulean-900 dark:border-cerulean-200' : 'dark:text-gray-300 dark:bg-gray-800 bg-afooter dark:border-gray-700' }}"
                           rel="nofollow" title="Həftənin ən yaxşı paylaşmaları">
                            {{ __('devhub.week') }}
                        </a>
                        <a href="{{ url('top/month') }}"
                           class="border xs:w-full px-3 rounded-r xs:rounded-l-none hover:border-cerulean-700 dark:hover:border-cerulean-200 {{ Request::url() === url('top/month')  ? 'border-cerulean-700 bg-cerulean-100 text-white dark:text-cerulean-200 dark:bg-cerulean-900 dark:border-cerulean-200' : 'dark:text-gray-300 dark:bg-gray-800 bg-afooter dark:border-gray-700' }}"
                           rel="nofollow" title="Ayın ən yaxşı paylaşmaları">
                            {{ __('devhub.month') }}
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
                    @if ($lastAuthors->count() > 0)
                        <div>
                            <p class="font-medium text-base text-gray-700 mb-1 dark:text-gray-400">
                                {{ __('devhub.connectedToDevHub') }}
                            </p>
                            <div class="mb-5 rounded dark:bg-dpaper border dark:border-gray-700">
                                <div
                                    class="overflow-hidden rounded bg-white dark:bg-transparent text-black p-5 space-y-2">
                                    @foreach ($lastAuthors as $author)
                                        <div class="flex items-start gap-3">
                                            <div class="relative w-12 h-12">
                                                <img
                                                    src="{{ ($author->avatar !== 'default') ? $author->getMedia('avatars')->first()->getFullUrl() : config('devhub.default_avatar') }}"
                                                    alt="hub image" class="w-12 h-12 rounded object-cover">
                                                @if ($author->isOnline())
                                                    <div
                                                        class="absolute -bottom-1 -right-1 h-4 w-4 border-2 border-white dark:border-dpaper rounded-full bg-green-400 z-2"></div>
                                                @endif
                                            </div>
                                            <div class="">
                                                <a href="{{ route('user_info', $author->username) }}"
                                                   class="font-semibold text-sm align-text-top dark:text-gray-300 leading-3">
                                                    {{ $author->name ?? $author->username }}
                                                </a>
                                                <p class="text-xs dark:text-gray-400 leading-3">
                                                    {{ __('devhub.connected') }} {{ \Carbon::createFromTimeStamp(strtotime($author->created_at))->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($top_followed_hubs->count() > 0)
                        <div>
                            <p class="font-medium text-base text-gray-700 mb-1 dark:text-gray-400">
                                {{ __('devhub.watchedHubs') }}
                            </p>
                            <div class="mb-5 rounded dark:bg-dpaper border dark:border-gray-700">
                                <div
                                    class="flex flex-col rounded bg-white dark:bg-transparent text-black p-5 space-y-2">
                                    @foreach ($top_followed_hubs as $hub)
                                        <a href="{{ '/hubs/' . $hub->slug }}">
                                            <div class="flex items-center gap-2">
                                                <img src="{{'/' . strtolower($hub->logo) ?? '/images/empty/code.png' }}"
                                                     alt="hub image" class="w-12 h-12 rounded">
                                                <div>
                                                    <span class="inline-block font-semibold dark:text-gray-300 leading-5">
                                                        {{ $hub->name }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div
                                                class="flex ml-14 space-x-1 items-center text-xs dark:text-gray-300">
                                                <span class="iconify" data-icon="mdi:account-group-outline"
                                                      data-inline="false"></span>
                                                <p>{{ __('devhub.followers') }}: {{ $hub->favorites_count ?? '' }}</p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    <a class="flex justify-between border rounded p-4 mb-4 bg-white dark:bg-transparent dark:border-gray-700 hover:border-cerulean-700 dark:hover:border-cerulean-700"
                       href="https://t.me/devhub_az" target="_blank"
                       rel="noopener">
                        <div class="w-2/3">
                            <div
                                class="text-gray-900 dark:text-gray-300 text-2xl pr-2 xs:border-none font-semibold md:text-2xl m-auto dark:text-gray-300">
                                DevHub
                            </div>
                            <p class="text-sm dark:text-gray-300">{{ __('devhub.followTelegramChannel') }}</p>
                        </div>
                        <span class="iconify w-16 h-16 rounded-full dark:bg-white" style="color: #0088cc;"
                              data-icon="cib:telegram"
                              data-inline="false"></span>
                    </a>
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
