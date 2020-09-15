@extends('layouts.layout')

@section('title')Hablar @stop

@section('meta')

@stop

@section('main')
    <div class="layout_body">
        <div class="content_left" id="app">
            <div class="page-header page-header_110">
                <h1 class="page-header__title">Sorgu üçün axtarış nəticələri: {{ $query }}</h1>
            </div>
            <posts
                    :url="'{{ $url }}'"
                    @auth :auth_check="true" @endauth
            ></posts>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
