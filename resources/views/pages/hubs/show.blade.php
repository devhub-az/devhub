@extends('layouts.layout')

@section('title'){{ $hub->attributes->name }} @stop

@section('main')
    <div id="app">
        <div class="w-full bg-gray-200 pt-6 dark:bg-dpaper">
            <div
                class="lg:container xl:container flex justify-between xs:block mx-4 pb-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4">
                <div class="w-9/12 flex">
                    @if (isset($hub->attributes->logo))
                        <img class="rounded xs:h-16 xs:w-16 w-16 h-16"
                             src="{{ asset(strtolower($hub->attributes->logo)) }}"
                             alt="Hub logo">
                    @else
                        <img class="rounded xs:h-16 xs:w-16 w-16 h-16" src="{{ asset('/images/empty/code.png') }}"
                             alt="">
                    @endif
                    <div class="ml-4">
                        <div class="relative flex space-x-1 text-xl">
                            <p class="dark:text-gray-300">{{ $hub->attributes->name }}</p>
                            <div class="flex items-center text-sm" title="{{ $hub->attributes->rating }} reyting">
                                <span class="iconify text-green-600 dark:text-green-500" data-icon="mdi:trending-up"
                                      data-inline="false"></span>
                                <p class="font-medium text-green-600 dark:text-green-500">
                                    {{ \Numeric::number_format_short($hub->attributes->rating) }}
                                </p>
                            </div>
                        </div>
                        <div
                            class="text-sm text-shadow dark:text-gray-300 xs:text-xs mt-2">
                            Məlumatların qorunması
                        </div>
                    </div>
                </div>
                <hub-follow-button :id="{{ $hub->id }}" :follower_check="'{{ $hub->attributes->follower_check }}'"
                                   @auth :auth_check="true" @endauth
                                   :classes="'h-9 px-7 xs:block xs:text-center xs:py-2 font-medium xs:my-auto'"
                                   class="xs:mt-2"></hub-follow-button>
                {{--                {{dd($hub->attributes->follower_check)}}--}}
                {{--                <div class="hub_follow">--}}
                {{--                    <hub-follow-button :hub="{{ json_encode($hub) }}" @auth :auth_check="true" @endauth></hub-follow-button>--}}
                {{--                </div>--}}
            </div>
            <div
                class="flex items-center space-x-2 lg:container xl:container w-full pb-2 xs:overflow-y-auto sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4">
                <div class="flex space-x-1 items-center">
                    <p class="font-medium dark:text-gray-300">
                        {{ \Numeric::number_format_short($hub->attributes->hub_followers_count) }}
                    </p>
                    <div class="text-sm dark:text-gray-300">İzləyici</div>
                </div>
                <div class="inline-block opacity-70 text-sm xs:hidden dark:text-gray-300">•</div>
                <div class="flex space-x-1 items-center">
                    <p class="font-medium dark:text-gray-300">
                        {{ \Numeric::number_format_short($hub->attributes->articles_count) }}
                    </p>
                    <div class="text-sm dark:text-gray-300">Paylaşım</div>
                </div>
            </div>
        </div>
        <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4">
            <div class="flex space-x-3 xs:block md:space-x-4">
                <div class="w-left xs:w-full">
                    <div class="mb-2 flex items-center justify-between dark:border-gray-700">
                        <div class="flex items-center space-x-1 font-medium text-gray-700 dark:text-gray-400 xs:pr-2">
                            <span class="iconify" data-icon="mdi:newspaper-variant-multiple-outline"
                                  data-inline="false"></span>
                            <p class="transition-none xs:text-base">Paylaşmalar</p>
                        </div>
                        <select-menu
                            :menu="[
                                {'name': 'Trendlər', 'icon': 'bx:bxs-hot', 'url': '/hubs/{{ $hub->attributes->slug }}'},
                                {'name': 'Yeni', 'icon': 'ant-design:clock-circle-outlined', 'url': '/hubs/{{ $hub->attributes->slug }}/all'}
                                ]"
                            @if (Request::is('hubs/*/top/*') || Request::is('hubs/' . $hub->attributes->slug))
                            :selected="{'name': 'Trendlər', 'icon': 'bx:bxs-hot'}"
                            @elseif (Request::url() === route('hubs.all', $hub->attributes->slug))
                            :selected="{'name': 'Yeni', 'icon': 'ant-design:clock-circle-outlined'}"
                            @endif
                        ></select-menu>
                    </div>
                    <articles :url="'{{ $url }}'" @auth :auth_check="true" @endauth></articles>
                </div>

                {{-- Right --}}
                <div class="w-right xs:w-full">
                    <a class="flex justify-between border rounded p-4 mb-4 bg-white dark:bg-transparent dark:border-gray-700 hover:border-cerulean-700 dark:hover:border-cerulean-700"
                       href="https://t.me/devhub_az" target="_blank"
                       rel="noopener">
                        <div>
                            <div
                                class="text-gray-900 dark:text-gray-300 text-2xl pr-2 xs:border-none font-semibold md:text-2xl m-auto dark:text-gray-300">
                                DevHub
                            </div>
                            <p class="text-sm dark:text-gray-300">Telegram kanalı <br> izləmək</p>
                        </div>
                        <span class="iconify w-20 h-20 rounded-full dark:bg-white" style="color: #0088cc;"
                              data-icon="cib:telegram"
                              data-inline="false"></span>
                    </a>
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
