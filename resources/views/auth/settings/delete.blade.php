@extends('layouts.layout')

@section('main')
    <div class="lg:container space-x-3 xl:container flex my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4 xs:block" id="app">
        <delete-settings :auth="{{ $user }}" :avatar_url="'{{ Auth::user()->getMedia('avatars')->first()->getFullUrl() }}'" class="w-left xs:w-full xs:mb-4"></delete-settings>
        <div class="w-right xs:w-full">
            @include('auth.settings.layout.right')
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/settings.js') }}" async></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/settings.js') }}" as="script">
@endsection
