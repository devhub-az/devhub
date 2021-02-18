@extends('layouts.layout')

@section('title'){{ ucfirst($author->attributes->username) }} @stop

@section('main')
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:my-0" id="app">
        @include('pages.profile.include.header')
        <div class="grid grid-cols-1 tb:grid-cols-main lg:grid-cols-main gap-3 md:gap-4">
            <div>
                @include('pages.profile.include.tabs')
                <div class="border p-4 bg-white dark:border-gray-700 dark:bg-dpaper">
                    <div class="mb-4 border-b-0">
                        <p class="text-2xl mb-5 dark:text-gray-300">
                            İş təcrübəsi
                        </p>
                        <div class="mb-2">
                            <p class="text-xl font-medium dark:text-gray-400">
                                Founder
                            </p>
                            <p class="dark:text-gray-400">
                                DevHub · Полный рабочий день
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Dec 1999 - Nov 2010 · {{ 2010-1999 . ' il' }}</p>
                        </div>
                        <div class="mb-2">
                            <p class="text-xl font-medium dark:text-gray-400">
                                Веб-специалист
                            </p>
                            <p class="dark:text-gray-400">
                                AAEmu · Полный рабочий день
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Dec 1999 - Nov 2010 · {{ 2010-1999 . ' il' }}</p>
                        </div>
                    </div>
                </div>
                <div class="border border-t-0 p-4 bg-white dark:border-gray-700 dark:bg-dpaper">
                    <div class="mb-4">
                        <p class="text-2xl mb-5 dark:text-gray-300">
                            Təhsil
                        </p>
                        <div class="mb-2">
                            <p class="text-xl font-medium dark:text-gray-400">
                                Московский Государственный Университет им. М.В. Ломоносова (МГУ)
                            </p>
                            <p class="dark:text-gray-400">
                                Бакалавр, Математика и компьютерные науки
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Dec 1999 - Nov 2010 · {{ 2010-1999 . ' il' }}</p>
                        </div>
                        <div class="mb-2">
                            <p class="text-xl font-medium dark:text-gray-400">
                                Московский Государственный Университет им. М.В. Ломоносова (МГУ)
                            </p>
                            <p class="dark:text-gray-400">
                                Бакалавр, Математика и компьютерные науки
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Dec 1999 - Nov 2010 · {{ 2010-1999 . ' il' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content_right">
                @include('pages.profile.include.right')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
