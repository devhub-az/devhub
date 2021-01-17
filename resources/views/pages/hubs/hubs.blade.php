@extends('layouts.layout')

@section('title')Hablar @stop

@section('main')
    <div class="container w-full my-4 mx-auto xs:px-4">
        <div class="grid grid-cols-1 md:grid-cols-main lg:grid-cols-main gap-2 md:gap-4 gap-5">
            <div class="content_left" id="app">
                <hubs-list
                    fetch-url="{{ route('hubs.index') }}"
                    locale="{{ App::getLocale() }}"
                    @auth :auth_check="true" @endauth
                    :columns="[{'name': 'Ad', 'type': 'name'}, {'name': 'Paylaşma', 'type': 'articles_count'},{'name': 'İzləyicilər','type': 'favorites_count'},{'name': 'Reytinq', 'type': 'rating'}]"
                ></hubs-list>
            </div>
            {{-- Right --}}
            <div class="content_right">
                <div>
                    <p class="font-bold text-base text-gray-700 mb-1 dark:text-gray-400">Ən sevimli</p>
                    <div class="mb-5 px-5 py-2 rounded bg-white dark:bg-dpaper border dark:border-gray-700">
                        @foreach ($top_hubs as $hub)
                            <a href="/hubs/{{ $hub['id'] ?? '' }}" class="grid grid-cols-list gap-3 mb-2">
                                <img src="{{ strtolower($hub['logo']) ?? '/images/empty/code.png' }}"
                                     alt="hub image">
                                <div>
                                    <p class="text-lg font-semibold dark:text-gray-300">
                                        {{ $hub['name'] }}
                                    </p>
                                    <span class="text-xs dark:text-gray-300">
                                        <i class="icon feather icon-star"></i>
                                        Reyting {{ $hub['rating'] ?? '' }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div>
                    <p class="font-bold text-base text-gray-700 mb-1 dark:text-gray-400">Ən izləninən</p>

                    <div class="mb-5 px-5 py-2 rounded bg-white dark:bg-dpaper border dark:border-gray-700">
                        @foreach ($top_followed_hubs as $hub)
                            <a href="/hubs/{{ $hub['id'] ?? '' }}" class="grid grid-cols-list gap-3 mb-2">
                                <img src="{{ strtolower($hub['logo']) ?? '/images/empty/code.png' }}"
                                     alt="hub image">
                                <div>
                                    <p class="text-lg font-semibold dark:text-gray-300">
                                        {{ $hub['name'] }}
                                    </p>
                                    <span class="text-xs dark:text-gray-300">
                                        <i class="icon feather icon-users"></i>
                                        İzləyicilər {{ $hub['favorites_count'] ?? '' }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
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
