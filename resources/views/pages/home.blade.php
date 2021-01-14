@extends('layouts.layout')

@section('title')Əsas səhifə@stop

@section('main')
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto" id="app">
        <div class="flex gap-3 tb:grid-cols-main lg:grid-cols-main xs:block gap-3 md:gap-4">
            <div class="w-left xs:w-full">
                @guest()
                <div class="p-5 mb-4 bg-white border dark:bg-dpaper dark:border-gray-700 rounded flex justify-between xs:block">
                    <div class="xs:mb-2">
                        <div class="text-2xl flex items-center space-x-1 mb-1">
                            <span class="text-xs border rounded-3xl border-green-500 px-2 py-0.5 font-medium dark:text-green-500">Beta</span>
                            <p class="dark:text-gray-300">DevHub'a xoş gəlmisiniz 👋</p>
                        </div>
                        <p class="dark:text-gray-400">Uğur və təcrübələrinizi öz həmkarları ilə bölüşün</p>
                    </div>
                    <a href="{{ route('register') }}" class="btn py-2 my-auto block xs:text-center xs:w-full xs:m-0">Qosulmag</a>
                </div>
                @endguest
                <div class="overflow-hidden mb-2 flex items-center justify-between dark:border-gray-700 xs:px-3.5">
                    <div class="flex items-center space-x-2 font-medium text-gray-700 dark:text-gray-400">
                        <span class="iconify" data-icon="mdi:newspaper-variant-multiple-outline"
                              data-inline="false"></span>
                        <p>Paylaşmalar</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('home') }}"
                           class="flex group items-center space-x-0.5 text-sm py-1 border-b-2 border-solid {{ (Request::is('top/*') || Request::is('/')) ? 'font-medium bottom-0 border-cerulean-500 text-cerulean-500 dark:border-cerulean-200 dark:text-cerulean-200' : 'text-gray-500 dark:text-gray-400 border-gray-300 dark:border-gray-700 dark:hover:border-cerulean-200 dark:hover:text-cerulean-200 hover:text-cerulean-500 hover:border-cerulean-500' }}">
                            <span class="iconify text-red-400 transition-none group-hover:text-red-500"
                                  data-icon="bx:bxs-hot" data-inline="false"></span>
                            <p class="transition-none">Trendlər</p>
                        </a>
                        <a href="{{ route('all') }}"
                           class="flex group items-center space-x-0.5 text-sm py-1 border-b-2 border-solid {{ Request::url() === route('all') ? 'font-medium bottom-0 border-cerulean-500 text-cerulean-500 dark:border-cerulean-200 dark:text-cerulean-200' : 'text-gray-500 dark:text-gray-400 border-gray-300 dark:border-gray-700 dark:hover:border-cerulean-200 dark:hover:text-cerulean-200 hover:text-cerulean-500 hover:border-cerulean-500' }}">
                            <span class="iconify transition-none dark:group-hover:text-cerulean-200" data-icon="ant-design:clock-circle-outlined" data-inline="false"></span>
                            <p class="transition-none">Təzə</p>
                        </a>
                        @auth
                            <a href="{{ route('favorite') }}"
                               class="text-sm py-1 border-b-2 border-solid {{ Request::url() === route('favorite') ? 'font-medium bottom-0 border-cerulean-500 text-cerulean-500 dark:border-cerulean-200 dark:text-cerulean-200' : 'text-gray-500 dark:text-gray-400 border-gray-300 dark:border-gray-700 dark:hover:border-cerulean-200 dark:hover:text-cerulean-200 hover:text-cerulean-500 hover:border-cerulean-500' }}">
                                <span class="relative transition-none">
                                    <div class="flex group items-center space-x-0.5 transition-none">
                                        <span class="iconify transition-none dark:group-hover:text-cerulean-200" data-icon="mdi:book-multiple" data-inline="false"></span>
                                        <p class="transition-none">Abunə ilə</p>
                                    </div>
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
                    <div>
                        <p class="font-bold text-base text-gray-700 mb-1 dark:text-gray-400">Devhub-a qoşulanlar</p>
                        <div class="mb-5 rounded dark:bg-dpaper border dark:border-gray-700">
                            <div
                                class="overflow-hidden rounded bg-white dark:bg-transparent text-black px-5 py-4 space-y-4">
                                @foreach ($lastAuthors as $author)
                                    <div class="flex items-start gap-3 mb-2">
                                        <img
                                            src="{{ ($author->avatar !== 'default') ? '/upload/avatars/' . $author->avatar : config('devhub.default_avatar') }}"
                                            alt="hub image" class="w-12 h-12 rounded-lg">
                                        <div>
                                            <a href="{{ route('user_info', $author->username) }}"
                                               class="font-semibold text-sm align-text-top dark:text-gray-300">
                                                {{ $author->name }}
                                            </a>
                                            <p class="text-xs dark:text-gray-400">
                                                Qoşulub {{ \Carbon::createFromTimeStamp(strtotime($author->created_at))->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="font-bold text-base text-gray-700 mb-1 dark:text-gray-400">Ən izləninən hablar</p>
                        <div class="mb-5 rounded dark:bg-dpaper border dark:border-gray-700">
                            <div class="overflow-hidden rounded bg-white dark:bg-transparent text-black px-5 py-2">
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
                    <a class="grid grid-flow-col border rounded p-4 mb-4 bg-white dark:bg-transparent dark:border-gray-700 hover:border-cerulean-700 dark:hover:border-cerulean-700"
                       href="https://t.me/devhub_az" target="_blank"
                       rel="noopener">
                        <div>
                            <div
                                class="text-gray-900 dark:text-gray-300 text-2xl pr-2 xs:border-none font-semibold md:text-2xl m-auto dark:text-gray-300">
                                DevHub
                            </div>
                            <p class="text-sm dark:text-gray-300">Telegram kanalı <br> izləmək</p>
                        </div>
                        <span class="iconify w-full h-full" style="color: #0088cc;" data-icon="cib:telegram"
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
