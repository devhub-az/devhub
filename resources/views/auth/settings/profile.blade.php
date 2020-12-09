@extends('layouts.layout')

@section('main')
    <div class="settings" id="app">
        <div class="settings__content">
            <profile-settings :auth="{{ $user }}"></profile-settings>
            <div class="settings__right">
                @include('auth.settings.layout.right')
            </div>
        </div>
    </div>
@endsection
