@extends('layouts.layout')

@section('title'){{ ucfirst($user->attributes->username) }} @stop

@section('main')
    {{--    TODO create js for id="app"--}}
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:my-0" id="app">
        @include('pages.profile.include.header')
        <div class="grid grid-cols-1 tb:grid-cols-main lg:grid-cols-main gap-3 md:gap-4">
            <div class="profile__left">
                @include('pages.profile.include.tabs')
                <div class="border p-4">
                    <div class="mb-4 border-b-0">
                        <p class="text-2xl mb-5">
                            İş təcrübəsi
                        </p>
                        <div class="mb-2">
                            <p class="text-xl font-medium">
                                Founder
                            </p>
                            <p>
                                DevHub · Полный рабочий день
                            </p>
                            <p class="text-sm text-gray-500">Dec 1999 - Nov 2010 · {{ 2010-1999 . ' il' }}</p>
                        </div>
                        <div class="mb-2">
                            <p class="text-xl font-medium">
                                Веб-специалист
                            </p>
                            <p>
                                AAEmu · Полный рабочий день
                            </p>
                            <p class="text-sm text-gray-500">Dec 1999 - Nov 2010 · {{ 2010-1999 . ' il' }}</p>
                        </div>
                    </div>
                </div>
                <div class="border p-4">
                    <div class="mb-4">
                        <p class="text-2xl mb-5">
                            Təhsil
                        </p>
                        <div class="mb-2">
                            <p class="text-xl font-medium">
                                Московский Государственный Университет им. М.В. Ломоносова (МГУ)
                            </p>
                            <p>
                                Бакалавр, Математика и компьютерные науки
                            </p>
                            <p class="text-sm text-gray-500">Dec 1999 - Nov 2010 · {{ 2010-1999 . ' il' }}</p>
                        </div>
                        <div class="mb-2">
                            <p class="text-xl font-medium">
                                Московский Государственный Университет им. М.В. Ломоносова (МГУ)
                            </p>
                            <p>
                                Бакалавр, Математика и компьютерные науки
                            </p>
                            <p class="text-sm text-gray-500">Dec 1999 - Nov 2010 · {{ 2010-1999 . ' il' }}</p>
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
