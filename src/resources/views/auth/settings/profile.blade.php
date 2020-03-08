@extends('layouts.layout')

@section('main')
    <div class="layout_body" id="app">
        <div class="layout_content">
            <div class="content_left">
                <profile-settings :auth="{{ $user }}"></profile-settings>
            </div>
            <div class="content_right">
                @include('auth.settings.layout.right')
            </div>
        </div>
    </div>
@endsection
