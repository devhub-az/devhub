@extends('front.layout')

@section('main')
    <div class="layout_body" id="app">
        <div class="header">
            @include('auth.settings.layout.tabs')
        </div>
        <div class="post-content">
            <profile-settings :auth="{{ Auth::User() }}"></profile-settings>
        </div>
    </div>
@endsection
