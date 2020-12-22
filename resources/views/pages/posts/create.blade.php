@extends('layouts.layout')

@section('title')Paylaşma yazmag @stop

@section('main')
    <div class="lg:container xl:container mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto" id="app">
        <div class="w-full">
            <editor></editor>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/article-create.js') }}"></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/article-create.js') }}" as="script">
@endsection
