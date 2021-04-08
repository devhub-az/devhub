@extends('layouts.layout')

@section('title'){{ ucfirst($author->attributes->username) }} @stop

@section('main')
    {{--    TODO create js for id="app"--}}
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto" id="app">
        @include('pages.profile.include.header')
        <div class="flex space-x-3 xs:space-x-0 xs:block">
            <div class="w-left xs:w-full">
                @include('pages.profile.include.tabs')
                <articles
                    :url="'{{ '/api/authors/' . $author->id . '/articles' }}'"
                    @auth :auth_check="true" @endauth
                ></articles>
            </div>

            <div class="w-right xs:w-full">
                @include('pages.profile.include.right')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
