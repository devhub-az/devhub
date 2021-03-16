@extends('layouts.layout')

@section('title'){{ __('devhub.hubs') }} @stop

@section('main')
    <div class="container w-full my-4 mx-auto xs:px-4">
        <div class="grid grid-cols-1 md:grid-cols-main lg:grid-cols-main gap-2 md:gap-4 gap-5">
            <div id="app">
                <hubs-list
                    fetch-url="{{ route('hubs.api.index') }}"
                    locale="{{ App::getLocale() }}"
                    @auth :auth_check="true" @endauth
                    {{--                     {'name': 'Paylaşma', 'type': 'articles_count'}--}}
                    :columns="[{'name': 'Ad', 'type': 'name'},{'name': 'İzləyicilər','type': 'favorites_count'},{'name': 'Reytinq', 'type': 'rating'}]"
                ></hubs-list>
            </div>

            <div>
                <div class="sticky top-2">
                    <div>
                        <p class="font-medium text-base text-gray-700 mb-1 dark:text-gray-400">
                            {{ __('devhub.ratedHubs') }}
                        </p>
                        <div class="mb-5 rounded dark:bg-dpaper border dark:border-gray-700">
                            <div
                                class="flex flex-col rounded bg-white dark:bg-transparent text-black p-5 space-y-2">
                                @foreach ($top_hubs as $hub)
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
                                            <span class="iconify text-green-600 dark:text-green-500"
                                                  data-icon="mdi:trending-up"
                                                  data-inline="false"></span>
                                            <p>{{ __('devhub.rating') }}: {{ $hub->rating ?? '' }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
