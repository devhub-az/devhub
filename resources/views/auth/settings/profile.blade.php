@extends('layouts.layout')

@section('main')
    <div class="lg:container gap-3 xl:container flex my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4 xs:block" id="app">
        <profile-settings :auth="{{ $user }}" class="w-left xs:w-full xs:mb-4"></profile-settings>
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
