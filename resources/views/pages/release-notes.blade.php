@extends('layouts.layout')

@section('title')Release Notes @stop

@section('main')
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto">
        <div class="border-b pb-4 mb-2 border-gray-700">
            <p class="text-2xl text-gray-200 font-light">Release Notes for DevHub</p>
        </div>
        <section class="release-note relative container-new py-6 px-3 text-left">
            <header class="timeline-decorator flex items-center mb-3">
                <div class="w-16 text-sm bg-cerulean-300 inline-block bg-purple py-1 rounded mr-2 text-center font-medium text-gray-300">
                    0.3.5
                </div>
                <a href="https://github.com/hose1021/DevHub/releases/tag/v0.3.5" class="font-light text-xl text-gray-300">
                    January 29th 2020
                </a>
            </header>
            <ul class="ml-20">
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fix
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Dockerfile - <a href="https://github.com/hose1021/DevHub/pull/201" class="font-medium text-cerulean-100">#201</a>
                    </div>
                </li>
            </ul>
        </section>
        <section class="release-note relative container-new py-6 px-3 text-left">
            <header class="timeline-decorator flex items-center mb-3">
                <div class="w-16 text-sm bg-cerulean-300 inline-block bg-purple py-1 rounded mr-2 text-center font-medium text-gray-300">
                    0.3.4
                </div>
                <a href="https://github.com/hose1021/DevHub/releases/tag/v0.3.4" class="font-light text-xl text-gray-300">
                    January 29th 2020
                </a>
            </header>
            <ul class="ml-20">
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-red-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Removed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Resolve url loader
                    </div>
                </li>
            </ul>
        </section>
        <section class="release-note relative container-new py-6 px-3 text-left">
            <header class="timeline-decorator flex items-center mb-3">
                <div class="w-16 text-sm bg-cerulean-300 inline-block bg-purple py-1 rounded mr-2 text-center font-medium text-gray-300">
                    0.3.3
                </div>
                <a href="https://github.com/hose1021/DevHub/releases/tag/v0.3.3" class="font-light text-xl text-gray-300">
                    January 29th 2020
                </a>
            </header>
            <ul class="ml-20">
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-green-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Added
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Tests
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-green-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Added
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Github authorization
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        API routes
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Hub page
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Ordering Hubs and Authors
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Another small changes...
                    </div>
                </li>
            </ul>
        </section>
        <section class="release-note relative container-new py-6 px-3 text-left">
            <header class="timeline-decorator flex items-center mb-3">
                <div class="w-16 text-sm bg-cerulean-300 inline-block bg-purple py-1 rounded mr-2 text-center font-medium text-gray-300">
                    0.3.2
                </div>
                <a href="https://github.com/hose1021/DevHub/releases/tag/v0.3.2" class="font-light text-xl text-gray-300">
                    December 23th 2020
                </a>
            </header>
            <ul class="ml-20">
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Bugs
                    </div>
                </li>
            </ul>
        </section>
        <section class="release-note relative container-new py-6 px-3 text-left">
            <header class="timeline-decorator flex items-center mb-3">
                <div class="w-16 text-sm bg-cerulean-300 inline-block bg-purple py-1 rounded mr-2 text-center font-medium text-gray-300">
                    0.3.1
                </div>
                <a href="https://github.com/hose1021/DevHub/releases/tag/v0.3.1" class="font-light text-xl text-gray-300">
                    December 23th 2020
                </a>
            </header>
            <ul class="ml-20">
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-green-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Added
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Some design
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Create Article
                    </div>
                </li>
            </ul>
        </section>
        <section class="release-note relative container-new py-6 px-3 text-left">
            <header class="timeline-decorator flex items-center mb-3">
                <div class="w-16 text-sm bg-cerulean-300 inline-block bg-purple py-1 rounded mr-2 text-center font-medium text-gray-300">
                    0.3.0
                </div>
                <a href="https://github.com/hose1021/DevHub/releases/tag/v0.3.0" class="font-light text-xl text-gray-300">
                    🎉December 18th 2020
                </a>
            </header>
            <ul class="ml-20">
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-green-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Added
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Notifications
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-green-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Added
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        🌑 Darkmode
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-yellow-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Changed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Removed session from api
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-yellow-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Changed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Oauth2 / laravel passport
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Small bugs with backend
                    </div>
                </li>
            </ul>
        </section>
        <section class="release-note relative container-new py-6 px-3 text-left">
            <header class="timeline-decorator flex items-center mb-3">
                <div class="w-16 text-sm bg-cerulean-300 inline-block bg-purple py-1 rounded mr-2 text-center font-medium text-gray-300">
                    0.2.5
                </div>
                <a href="https://github.com/hose1021/DevHub/releases/tag/v0.2.5" class="font-light text-xl text-gray-300">
                    December 15th 2020
                </a>
            </header>
            <ul class="ml-20">
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Bugs with design
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Small bugs with backend
                    </div>
                </li>
            </ul>
        </section>
        <section class="release-note relative container-new py-6 px-3 text-left">
            <header class="timeline-decorator flex items-center mb-3">
                <div class="w-16 text-sm bg-cerulean-300 inline-block bg-purple py-1 rounded mr-2 text-center font-medium text-gray-300">
                    0.2.4
                </div>
                <a href="https://github.com/hose1021/DevHub/releases/tag/v0.2.4" class="font-light text-xl text-gray-300">
                    December 12th 2020
                </a>
            </header>
            <ul class="ml-20">
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-green-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Added
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Viewers
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-yellow-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Changed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Database structure
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-yellow-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Changed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        UUID
                    </div>
                </li>
            </ul>
        </section>
        <section class="release-note relative container-new py-6 px-3 text-left">
            <header class="timeline-decorator flex items-center mb-3">
                <div class="w-16 text-sm bg-cerulean-300 inline-block bg-purple py-1 rounded mr-2 text-center font-medium text-gray-300">
                    0.2.3
                </div>
                <a href="https://github.com/hose1021/DevHub/releases/tag/v0.2.3" class="font-light text-xl text-gray-300">
                    December 11th 2020
                </a>
            </header>
            <ul class="ml-20">
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Bug with hubs routes
                    </div>
                </li>
            </ul>
        </section>
        <section class="release-note relative container-new py-6 px-3 text-left">
            <header class="timeline-decorator flex items-center mb-3">
                <div class="w-16 text-sm bg-cerulean-300 inline-block bg-purple py-1 rounded mr-2 text-center font-medium text-gray-300">
                    0.2.2
                </div>
                <a href="https://github.com/hose1021/DevHub/releases/tag/v0.2.2" class="font-light text-xl text-gray-300">
                    December 11th 2020
                </a>
            </header>
            <ul class="ml-20">
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-green-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Added
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        New design for author page
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Hubs page
                    </div>
                </li>
                <li class="flex items-center mb-2 space-x-2">
                    <div class="bg-cerulean-900 text-xs inline-block text-center py-0.5 w-20 rounded shadow uppercase text-gray-300">
                        Fixed
                    </div>
                    <div class="text-sm font-light text-gray-300">
                        Authors page (Will be modified)
                    </div>
                </li>
            </ul>
        </section>
    </div>
@endsection

@section('styles')
    <style>
        .release-note:last-of-type .timeline-decorator::before {
            background-image: linear-gradient(to bottom, rgba(255,255,255,0.1), rgba(255,255,255,0));
        }

        .release-note:first-of-type .timeline-decorator::before {
            background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.1) 50px);
        }

        .timeline-decorator::before {
            content: "";
            background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.1));
            width: 3px;
            position: absolute;
            top: 0;
            bottom: 0;
            left: calc((4rem / 2) + 12px);
            z-index: -1;
        }
    </style>
@endsection
