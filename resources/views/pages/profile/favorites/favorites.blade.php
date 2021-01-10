@extends('layouts.layout')

@section('main')
    <div class="favorites-wrapper">

    </div>
@endsection


@push('scripts')
    <script type="text/javascript" src="{{ mix('js/home.js') }}"></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/home.js') }}" as="script">
@endsection
