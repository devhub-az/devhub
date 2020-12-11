@extends('layouts.layout')

@section('title'){{ ucfirst($user->attributes->username) }} @stop

@section('main')
    {{--    TODO create js for id="app"--}}
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto" id="app">
        @include('pages.profile.include.header')
        <div class="grid grid-cols-1 tb:grid-cols-main lg:grid-cols-main gap-3 md:gap-4">
            <div class="profile__left">
                @include('pages.profile.include.tabs')
                <div class="markdown-body">
                    <posts
                            :url="'{{ $url }}'"
                            @auth :auth_check="true" @endauth
                    ></posts>
                </div>
            </div>

            <div class="content_right">
                @include('pages.profile.include.right')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        const stickyblock = stickybits('#default-block', {
            stickyBitStickyOffset: 10,
        });
    </script>
@endsection
