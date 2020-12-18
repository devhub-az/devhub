@extends('layouts.login-layout')

@section('title')Login səhifəsi @stop

@section('main')
    <div class="flex h-screen">
        <div class="w-1/2 relative">
            <div id="particles-js" class="absolute h-full w-full z-10"></div>
            <div class="absolute bg-white rounded p-4 top-1/2 left-1/2 -mr-1/2"
                 style="transform: translate(-50%, -50%)">
                <p class="text-3xl mb-4 font-light">
                    <span class="font-medium">Dev<span class="text-cerulean-500">Hub</span></span> cəmiyyətinə qoşulun
                </p>
                <div class="w-5/6">
                    <div class="flex items-center">
                        <i class="iconify inline-block m-auto w-10 h-10 p-2 bg-gray-700 rounded-lg text-white"
                           data-icon="mdi-thumbs-up-down"></i>
                        <div class=" font-light ml-2">Səs vermək və şərh yazmaq kimi imkanların
                            kilidini aç
                        </div>
                    </div>
                    <div class="login__registration-block-info">
                        <i class="mdi mdi-bookmark-multiple-outline"></i>
                        <div class="login__registration-info-text">Ən sevdiyiniz paylaşmaları qeyd edin</div>
                    </div>
                    <div class="login__registration-block-info">
                        <i class="mdi mdi-trophy-award"></i>
                        <div class="login__registration-info-text">Şöhrət və döş nişanları qazanın</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="relative w-1/2">
            <div class="xs:pt-20 text-center absolute top-1/2 left-1/2 -mr-1/2"
                 style="transform: translate(-50%, -50%)">
                <a href="{{ route('home') }}"
                   class="text-black font-bold hover:text-gray-200 md:text-2xl m-auto">
                    <img src="{{ asset('images/DevHub_Monochrome_Full_Logo.svg') }}" alt="DevHub Logo" width="188"
                         height="36" class="mb-4 mx-auto">
                </a>
                <login></login>

                <div class="w-full border-t border-gray-300 my-4"></div>
                <div class="flex justify-between">
                    <div class="flex items-center">
                        <i class="iconify inline-block m-auto w-10 h-10 p-2 bg-gray-700 rounded-lg text-white"
                           data-icon="mdi-thumbs-up-down"></i>
                        <div class="text-left text-sm ml-2">
                            <p>Ses</p>
                            <p>ver</p>
                        </div>
                    </div>
                    <div class="flex">
                        <i class="iconify inline-block m-auto w-10 h-10 p-2 bg-gray-700 rounded-lg text-xl text-white"
                           data-icon="mdi-layers-outline"></i>
                        <div class="text-left text-sm ml-2">
                            <p>Paylaşmalar</p>
                            <p>yaz</p>
                        </div>
                    </div>
                    <div class="flex">
                        <i class="iconify inline-block m-auto w-10 h-10 p-2 bg-gray-700 rounded-lg text-xl text-white"
                           data-icon="mdi-bookmark-multiple-outline"></i>
                        <div class="text-left text-sm ml-2">
                            <p>Izləici</p>
                            <p>ol</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/particles.min.js') }}"></script>
    <script src="{{ asset('js/particles.settings.js') }}"></script>
@endsection
