@extends('layouts.layout')

@section('title'){{ ucfirst($user['username']) }} @stop

@section('main')
    {{--    TODO create js for id="app"--}}
    <div id="app">
        @include('pages.profile.include.header')
        <div class="page-profile">
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
