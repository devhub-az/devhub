@extends('layouts.layout')

@section('title')Axtarış @stop

@section('main')
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4" id="app">
        <div class="flex space-x-3 xs:space-x-0 xs:block">
            <div class="w-left xs:w-full">
                <form action="{{ route('search.' . $type) }}" class="relative w-full items-center mb-2"
                      accept-charset="UTF-8" method="GET">
                    @csrf
                    <div class="w-full">
                        <input id="search_input" type="text"
                               class="relative input w-full rounded border pl-4"
                               autocomplete="off"
                               name="search"
                               value="{{ $query }}"
                               maxlength="48"
                               minlength="3" placeholder="{{ __('devhub.searchAll') }}" required="required">
                        <button value="Submit" class="absolute right-4 translate-y-1/2 top-0 h-10 focus:outline-none focus:ring-0">
                            <i class="iconify text-gray-600 dark:text-gray-300 text-lg" data-icon="tabler:search"></i>
                        </button>
                    </div>
                </form>
                @if ($type === 'articles')
                    <articles
                        :url="'{{ $url }}'"
                        @auth :auth_check="true" @endauth
                    ></articles>
                @endif
            </div>
            <div class="w-right xs:w-full">
                @include('pages.search.sidebar')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/home.js') }}" defer></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/home.js') }}" as="script">
@endsection
