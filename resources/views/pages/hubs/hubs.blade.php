@extends('layouts.layout')

@section('title')Hablar @stop

@section('main')
    <div class="container w-full my-4 mx-auto xs:px-4">
        <div class="grid grid-cols-1 md:grid-cols-main lg:grid-cols-main gap-2 md:gap-4 gap-5">
            <div id="app">
                <hubs-list
                    fetch-url="{{ route('hubs.index') }}"
                    locale="{{ App::getLocale() }}"
                    @auth :auth_check="true" @endauth
{{--                     {'name': 'Paylaşma', 'type': 'articles_count'}--}}
                    :columns="[{'name': 'Ad', 'type': 'name'},{'name': 'İzləyicilər','type': 'favorites_count'},{'name': 'Reytinq', 'type': 'rating'}]"
                ></hubs-list>
            </div>
            {{-- Right --}}
            <div>
                <div class="sticky top-2">
                    <div>
                        <div class="flex items-center space-x-1 font-medium text-base mb-1">
                            <span class="iconify dark:text-gray-300" data-icon="mdi:trending-up" data-inline="false"></span>
                            <p class="text-gray-700 dark:text-gray-400">Ən sevimli</p>
                        </div>
                        <div class="mb-5 p-5 space-y-2 rounded bg-white dark:bg-dpaper border dark:border-gray-700 space-y-2">
                            @foreach ($top_hubs as $hub)
                                <a href="/hubs/{{ $hub['id'] ?? '' }}" class="flex gap-3">
                                    <img src="{{ strtolower($hub['logo']) ?? '/images/empty/code.png' }}"
                                          class="w-12 h-12 rounded dark:bg-dwall" alt="hub image">
                                    <div>
                                        <p class="font-semibold dark:text-gray-300">
                                            {{ $hub['name'] }}
                                        </p>
                                        <span class="flex space-x-1 mt-2 items-center text-xs dark:text-gray-300">
                                            <span class="iconify text-green-600 dark:text-green-500" data-icon="mdi:trending-up"
                                                  data-inline="false"></span>
                                            <p>Reyting {{ $hub['rating'] ?? '' }}</p>
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center space-x-1 font-medium text-base text-gray-700 mb-1">
                            <span class="iconify dark:text-gray-300" data-icon="mdi:account-multiple-plus-outline" data-inline="false"></span>
                            <p class="text-gray-700 dark:text-gray-400">Ən izləninən</p>
                        </div>
                        <div class="mb-5 p-5 space-y-2 rounded bg-white dark:bg-dpaper border dark:border-gray-700 space-y-2">
                            @foreach ($top_followed_hubs as $hub)
                                <a href="/hubs/{{ $hub['id'] ?? '' }}" class="flex gap-3">
                                    <img src="{{ strtolower($hub['logo']) ?? '/images/empty/code.png' }}"
                                         class="w-12 h-12 rounded dark:bg-dwall" alt="hub image">
                                    <div>
                                        <p class="font-semibold dark:text-gray-300 leading-5">
                                            {{ $hub['name'] }}
                                        </p>
                                        <span class="flex space-x-1 mt-2 items-center text-xs dark:text-gray-300">
                                            <span class="iconify" data-icon="mdi:account-group-outline" data-inline="false"></span>
                                            <p>İzləyicilər {{ $hub['favorites_count'] ?? '' }}</p>
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/hubs.js') }}"></script>
@endpush

@push('styles')
    <link rel="preload" href="{{ mix('js/hubs.js') }}" as="script">
@endpush
