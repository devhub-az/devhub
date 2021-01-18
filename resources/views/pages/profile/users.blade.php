@extends('layouts.layout')

@section('title')Müəlliflər @stop

@section('main')
    <div class="container w-full my-4 mx-auto " id="app">
        <users-list @auth :auth_check="true" @endauth :url="'/api/authors'"
                    :columns="[{'name': 'Ad', 'type': 'name'}, {'name': 'Paylaşma', 'type': 'articles_count'},{'name': 'Karma','type': 'karma'},{'name': 'Reytinq', 'type': 'rating'}]"
        ></users-list>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/users.js') }}"></script>
@endpush

@push('styles')
    <link rel="preload" href="{{ mix('js/users.js') }}" as="script">
@endpush
