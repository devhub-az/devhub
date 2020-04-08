@extends('layouts.layout')

@section('title'){{ ucfirst($user['username']) }} followers @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
@stop

@section('main')
    <div id="app">
        @include('pages.profile.include.header')
        <div class="page-profile">
            <div class="profile__left">
                @include('pages.profile.include.tabs')
                <users-list :url="'{{'/api/users/' . $user->id . '/followings'}}'"
                            @auth :auth_check="true" @endauth></users-list>
                {{--                @if($followings)--}}
                {{--                    @foreach($followings as $following)--}}
                {{--                        <img src="{{ asset('images/profile'). '/' . $following->avatar }}" alt="">--}}
                {{--                        {{'@' . $following->username }}--}}
                {{--                        <user-follow-button :user="{{ $user }}" :id="{{ $user->id }}"--}}
                {{--                                            :url="'{{'/api/users/' . $user->id . '/followings'}}'"--}}
                {{--                                            @auth :auth_check="true" @endauth></user-follow-button>--}}
                {{--                    @endforeach--}}
                {{--                @else--}}
                {{--                    asd--}}
                {{--                @endif--}}
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
