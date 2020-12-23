@extends('layouts.login-layout')

@section('title')Şifrəni sıfırlanma səhifəsi @stop

@section('main')
    <div class="flex">
        <div class="xs:pt-20 text-center absolute top-1/2 left-1/2 -mr-1/2" style="transform: translate(-50%, -50%)">
            <a href="{{ route('home') }}"
               class="text-black font-bold hover:text-gray-200 md:text-2xl m-auto">
                <img src="{{ asset('images/DevHub_Monochrome_Full_Logo.svg') }}" alt="DevHub Logo" width="188"
                     height="36" class="mb-4 mx-auto">
            </a>
            <email></email>
        </div>
    </div>
@endsection
