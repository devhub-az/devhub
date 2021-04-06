@extends('layouts.layout')

@section('title')Müəlliflər @stop

@section('main')
    <div class="container w-full my-4 mx-auto " id="app">
        <users-list @auth :auth_check="true" @endauth :url="'/api/authors'"
                    :columns="[{'name': '' + $t('devhub.name') + '', 'type': 'name'},{'name': '' + $t('devhub.followers') + '','type': 'favorites_count'},{'name': '' + $t('devhub.karma') + '','type': 'karma'},{'name': '' + $t('devhub.rating') + '', 'type': 'rating'}]"
        ></users-list>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/users.js') }}"></script>
@endpush

@push('styles')
    <link rel="preload" href="{{ mix('js/users.js') }}" as="script">
@endpush
